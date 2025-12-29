

//  hls.js via CDN
  

const streamUrl = "https://cbcradiolive.akamaized.net/hls/live/2041055/ES_R2AHF/master.m3u8";
const video = document.getElementById("cbcPlayer");

if (Hls.isSupported()) {
  const hls = new Hls({
    // Optional: some sane defaults
    enableWorker: true,
    lowLatencyMode: true
  });
  hls.loadSource(streamUrl);
  hls.attachMedia(video);
  hls.on(Hls.Events.MANIFEST_PARSED, function () {
    video.play().catch(err => {
      console.warn("Autoplay blocked by browser:", err);
    });
  });
  hls.on(Hls.Events.ERROR, function (event, data) {
    console.error("HLS.js error:", data);
  });
} else if (video.canPlayType("application/vnd.apple.mpegurl")) {
  // Native HLS support (Safari, some smart TVs)
  video.src = streamUrl;
  video.addEventListener("loadedmetadata", () => {
    video.play().catch(err => {
      console.warn("Autoplay blocked by browser:", err);
    });
  });
} else {
  console.error("HLS is not supported in this browser.");
}

