// Initial load and periodic refresh every 5 minutes (no video-playing check)
document.addEventListener('DOMContentLoaded', () => {
  // initial build
  console.log('Console inital load and build');
  loadFiles();

  // schedule rebuild every 5 minutes (5 * 60 * 1000 ms)
  setInterval(() => {
    console.log('Rebuilding slides from server');
    loadFiles();
  }, 5 * 60 * 1000);
});

// Utility: attach video handlers (prevents double-attach)
function attachVideoHandlers(video, carousel) {
  if (video._handlersAttached) return;
  video._handlersAttached = true;

  video.addEventListener('play', () => {
    console.debug('carousel paused');
    carousel.pause();
  });

  video.addEventListener('ended', () => {
    console.debug('carousel next slide');
    carousel.next();
    console.debug('carousel next restart');
    carousel.cycle();
  });
}

// Rebuild the carousel slides from the server
function loadFiles() {
  return fetch('list-files.php?t=' + Date.now())
    .then(res => res.json())
    .then(data => {
      // list all the files to the console
      console.log(data);
      // Dispose existing carousel instance if present
      const carouselEl = document.getElementById('carousel');
      const oldCarouselInstance = bootstrap.Carousel.getInstance(carouselEl);
      if (oldCarouselInstance) {
        oldCarouselInstance.dispose();
      }

      // Replace the slide container to remove old listeners and state
      const oldSlide = document.getElementById('slide');
      const newSlide = oldSlide.cloneNode(false); // shallow clone (no children)
      oldSlide.parentNode.replaceChild(newSlide, oldSlide);

      // Build new slides
      data.images.forEach((file, index) => {
        const div = document.createElement('div');
        div.classList.add('carousel-item');
        if (index === 0) div.classList.add('active');
        else div.classList.add('kenburns');

        const ext = file.split('.').pop().toLowerCase();

        if (['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(ext)) {
          const imgHolder = document.createElement('div');
          imgHolder.classList.add('imgHolder');

          const img = document.createElement('img');
          img.src = 'assets/slides/' + file;
          img.alt = file;
          img.classList.add('d-block');

          imgHolder.appendChild(img);
          div.appendChild(imgHolder);
        } else if (['mp4', 'webm', 'ogg'].includes(ext)) {
          const video = document.createElement('video');
          video.src = 'assets/slides/' + file;
          video.classList.add('d-block', 'w-100');
          video.controls = false;
          video.autoplay = false;
          video.muted = true;
          video.loop = false;
          div.appendChild(video);
          div.classList.add('videoSlide');
        }


        // add file name as attribute
        div.setAttribute('filename', file);
        newSlide.appendChild(div);
      });

      // Recreate carousel instance on the same element
      const carousel = new bootstrap.Carousel(carouselEl, {});

      // Add slide event to handle video playback when a slide becomes active
      carouselEl.addEventListener('slid.bs.carousel', function (event) {
        const activeItem = event.relatedTarget;
        const video = activeItem.querySelector('video');

        if (video) {
          carousel.pause();
          video.currentTime = 0; // we need to enusre the video plays from the begging 
          video.play();
          attachVideoHandlers(video, carousel);
        }
      });

      // Attach handlers to any videos already present (in case first slide is a video)
      document.querySelectorAll('#slide video').forEach(v => attachVideoHandlers(v, carousel));
    })
    .catch(err => console.error("Error loading files:", err));
}