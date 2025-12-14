<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Mader's General Store TV Billboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <!-- Weather icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.10/css/weather-icons.min.css">
  <style>
    :root{
        --footer-height: 10vh;
        --footer-brandWidth: 9vw;
        --footerRow-height: 50%;
        --bg-gradient: rgba(0, 0, 0, 0.5);
        --font-size: 140%;
    }

    body{
        margin: 0;
        padding: 0;
        overflow: hidden;
        font-family: "Roboto", sans-serif;
        font-optical-sizing: auto;
        font-style: normal;                
        font-size: var(--font-size);
        /* cursor: none; */

    }
    #carousel{
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;

    }
    #footer{
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: var(--footer-height);
        background: var(--bg-gradient);
        z-index: 5;
    }
    #footer .footerRow{
        height: var(--footerRow-height)
    }

    #footer .footer-brand{
      position: absolute;
      top: 0;
      background:#fff;
      height: 100%;
      width: var(--footer-brandWidth);
    }

    #footer #news{
        position: relative;
        width: 100%;
        border-bottom: 1px solid #fff;
    }


    #footer #news #news-feed{
        color: #fff;
        white-space: nowrap;
        height: 100%;
        width: calc(100% - (2 *  var(--footer-brandWidth)))
        position: absolute;
        top: 0;
        left: calc( var(--footer-brandWidth) +1)
    }

      #footer #news #news-feed .carousel-item {
          text-align: center;
      }

      #footer #time{
        right: 0;
    
      }

      #footer #weather{
        position: relative;
        width: 100%;
      }

      #footer  #weather #forecastCarousel{
          color: #fff;
          white-space: nowrap;
          height: 100%;
      }


      #forecastCarousel .carousel-item {
        text-align: center;
        
      }
      .forecast-text.date::after,
      .forecast-text.summary::after,
      .forecast-text.pop::before{
        content: " | ";
        display: inline-block;
        margin: 0 20px;
        color: red;
        font-weight: 700;
      }

      /* forecast icons */
      .wi {
        color: #4fc3f7; /* light blue */
        margin: 0 10px 0 0;
      }
      .wi-rain { 
        color: #a4d1fcff; 
      }
      .wi-snow { color: #e8e8e8ff; }
      .wi-snow-wind{
        color: #c7c7c7c7;
      }
      .wi-day-sunny { color: #ffe600ff; }
      .wi-cloudy { color: #c7c7c7c7; }
      .wi-thunderstorm { color: #c7c7c7c7; }
  </style>
</head>
<body>
  <!-- Billboard Images -->
  <div 
      id="carousel" 
      class="carousel slide carousel-fade" 
      data-bs-ride="carousel"
      data-bs-internal="10000" 
      data-bs-pause="false">
      <div 
        id="slide" 
        class="carousel-inner"></div>
  </div>
  <!-- Footer -->
  <div id="footer" class="d-flex flex-column">

    <div id="news" class="footerRow d-flex flex-row ">
      <div id="news-logo" class="footer-brand d-flex align-items-center justify-content-center">
          <svg  width="71px" height="18px" viewBox="0 0 71 18" focusable="false" aria-hidden="true"><path d="M12.2646923,8.95707692 C12.2646923,10.719 10.8364615,12.1472308 9.07476923,12.1472308 C7.31307692,12.1472308 5.88484615,10.719 5.88484615,8.95707692 C5.88484615,7.19538462 7.31307692,5.76738462 9.07476923,5.76738462 C10.8364615,5.76738462 12.2646923,7.19538462 12.2646923,8.95707692" id="Fill-1" fill="#D8232A"></path><path d="M5.39307692,12.147 C3.63,12.147 2.20130769,10.719 2.20130769,8.95753846 C2.20130769,7.19561538 3.63,5.766 5.39284615,5.766 L5.39307692,12.147" id="Fill-2" fill="#D8232A"></path><path d="M12.7596923,15.6664615 L12.7603846,12.6394615 L15.7887692,12.6408462 C15.7887692,14.3141538 14.4323077,15.6664615 12.7596923,15.6664615" id="Fill-3" fill="#D8232A"></path><path d="M5.39284615,2.24469231 L5.39284615,5.27538462 L2.36053846,5.27584615 C2.36053846,3.60207692 3.71861538,2.24469231 5.39284615,2.24469231" id="Fill-4" fill="#D8232A"></path><path d="M5.39307692,15.6683077 L5.39307692,12.6394615 L2.36123077,12.6408462 C2.36123077,14.3139231 3.71792308,15.6683077 5.39307692,15.6683077" id="Fill-5" fill="#D8232A"></path><path d="M16.4455385,11.6986154 L16.4439231,6.21623077 C17.3778462,6.77238462 18.0034615,7.79169231 18.0034615,8.95753846 C18.0034615,10.1229231 17.3778462,11.1413077 16.4455385,11.6986154" id="Fill-6" fill="#D8232A"></path><path d="M6.33484615,1.58861538 L11.8174615,1.58953846 C11.2610769,0.655615385 10.2429231,0.0311538462 9.07684615,0.0311538462 C7.911,0.0311538462 6.89123077,0.655615385 6.33484615,1.58861538" id="Fill-7" fill="#D8232A"></path><path d="M11.7770769,16.3255385 L6.29353846,16.3248462 C6.85015385,17.2583077 7.869,17.8841538 9.03530769,17.8841538 C10.2011538,17.8841538 11.22,17.259 11.7770769,16.3255385" id="Fill-8" fill="#D8232A"></path><path d="M12.2658462,12.6408462 C12.2658462,14.4032308 10.8380769,15.831 9.07661538,15.831 C7.31423077,15.831 5.88484615,14.4032308 5.88484615,12.6408462 L12.2658462,12.6408462" id="Fill-9" fill="#D8232A"></path><path d="M12.7603846,12.147 C14.5220769,12.147 15.9514615,10.719 15.9514615,8.95753846 C15.9514615,7.19561538 14.5220769,5.766 12.7603846,5.766 L12.7603846,12.147" id="Fill-10" fill="#D8232A"></path><path d="M12.2658462,5.27907692 C12.2658462,3.51738462 10.8380769,2.08938462 9.07661538,2.08938462 C7.31423077,2.08938462 5.88484615,3.51738462 5.88484615,5.27907692 L12.2658462,5.27907692" id="Fill-11" fill="#D8232A"></path><path d="M1.70769231,11.6986154 L1.70907692,6.21623077 C0.774923077,6.77238462 0.150461538,7.79169231 0.150461538,8.95753846 C0.150461538,10.1229231 0.774923077,11.1413077 1.70769231,11.6986154" id="Fill-12" fill="#D8232A"></path><path d="M15.789,5.277 L12.7603846,5.27538462 L12.7596923,2.24746154 C14.4325385,2.24746154 15.789,3.60323077 15.789,5.277" id="Fill-13" fill="#D8232A"></path><path d="M29.9725385,17.8790769 C24.8926154,17.8790769 21.1197692,13.9583077 21.1197692,9.00184615 L21.1197692,8.95246154 C21.1197692,4.04538462 24.8187692,0.0258461538 30.1204615,0.0258461538 C33.3752308,0.0258461538 35.3233846,1.11092308 36.9263077,2.68915385 L34.5096923,5.47546154 C33.1781538,4.26738462 31.8219231,3.52753846 30.0957692,3.52753846 C27.186,3.52753846 25.0899231,5.94415385 25.0899231,8.90330769 L25.0899231,8.95246154 C25.0899231,11.9116154 27.1366154,14.3776154 30.0957692,14.3776154 C32.0683846,14.3776154 33.2769231,13.5883846 34.6331538,12.3553846 L37.0495385,14.7966923 C35.2742308,16.6954615 33.3013846,17.8790769 29.9725385,17.8790769" id="Fill-14" fill="#1A1919"></path><path d="M49.5923077,12.4465385 C49.5923077,11.2479231 48.6999231,10.5083077 46.6848462,10.5083077 L42.1451538,10.5083077 L42.1451538,14.436 L46.8124615,14.436 C48.5469231,14.436 49.5923077,13.8237692 49.5923077,12.4977692 L49.5923077,12.4465385 Z M48.5976923,5.30538462 C48.5976923,4.13215385 47.6796923,3.46915385 46.0218462,3.46915385 L42.1451538,3.46915385 L42.1451538,7.24361538 L45.7668462,7.24361538 C47.5010769,7.24361538 48.5976923,6.68261538 48.5976923,5.35638462 L48.5976923,5.30538462 Z M46.8124615,17.8790769 L38.3194615,17.8790769 L38.3194615,0.0258461538 L46.6084615,0.0258461538 C50.2555385,0.0258461538 52.5,1.83669231 52.5,4.64238462 L52.5,4.69338462 C52.5,6.70823077 51.4287692,7.83023077 50.1535385,8.54446154 C52.2193846,9.33507692 53.4946154,10.5336923 53.4946154,12.9313846 L53.4946154,12.9823846 C53.4946154,16.2468462 50.8421538,17.8790769 46.8124615,17.8790769 L46.8124615,17.8790769 Z" id="Fill-15" fill="#1A1919"></path><path d="M63.4393846,17.8790769 C58.3596923,17.8790769 54.5868462,13.9583077 54.5868462,9.00184615 L54.5868462,8.95246154 C54.5868462,4.04538462 58.2856154,0.0258461538 63.5875385,0.0258461538 C66.8423077,0.0258461538 68.7904615,1.11092308 70.3933846,2.68915385 L67.9767692,5.47546154 C66.645,4.26738462 65.2887692,3.52753846 63.5626154,3.52753846 C60.6530769,3.52753846 58.557,5.94415385 58.557,8.90330769 L58.557,8.95246154 C58.557,11.9116154 60.6036923,14.3776154 63.5626154,14.3776154 C65.5354615,14.3776154 66.7437692,13.5883846 68.1,12.3553846 L70.5166154,14.7966923 C68.7413077,16.6954615 66.7682308,17.8790769 63.4393846,17.8790769" id="Fill-16" fill="#1A1919"></path></svg>
      </div>
      <div id="news-feed" class="carousel slide d-flex align-items-center flex-grow-1" data-bs-ride="carousel" data-bs-pause="false" data-bs-interval="10000">
          <div id="news-articles" class="carousel-inner"></div>
      </div>
      <!-- Clock -->
      <div id="time" class="footer-brand d-flex align-items-center justify-content-center"></div>
    </div>
    <div id="weather" class="footerRow d-flex flex-row ">
      <div id="forecastCarousel" class="carousel slide d-flex align-items-center flex-grow-1" data-bs-ride="carousel" data-bs-pause="false" data-bs-interval="20000">
        <div id="forecast-slides" class="carousel-inner" ></div>
      </div>
    </div>



  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
  <script>
    // We need to hard refresh the page in case new assets need to be loaded.
    const rt = 10; // refresh time, in minutes
    setInterval(function () {
        location.reload(true);
    }, rt * 60 * 1000); // 
  </script>
  <script>
      // Fetch and update the list
    function loadFiles() {
        fetch('list-files.php')
        .then(res => res.json())
        .then(data => {
            const list = document.getElementById('slide');
            list.innerHTML = '';

            data.images.forEach((file, index) => {
                const div = document.createElement('div');
                div.classList.add('carousel-item');
                if (index === 0) div.classList.add('active');

                const ext = file.split('.').pop().toLowerCase();

                if (['jpg','jpeg','png','gif','webp'].includes(ext)) {
                    const img = document.createElement('img');
                    img.src = 'assets/slides/' + file;
                    img.classList.add('d-block','w-100');
                    div.appendChild(img);
                } 
                else if (['mp4','webm','ogg'].includes(ext)) {
                    const video = document.createElement('video');
                    video.src = 'assets/slides/' + file;
                    video.classList.add('d-block','w-100');
                    video.controls = false;
                    video.autoplay = false;
                    video.muted = true;
                    video.loop = false;
                    div.appendChild(video);
                }

                list.appendChild(div);
            });

            
            const carouselEl = document.getElementById('carousel');
            const carousel = bootstrap.Carousel.getOrCreateInstance(carouselEl);

            carouselEl.addEventListener('slid.bs.carousel', function (event) {
                const activeItem = event.relatedTarget;
                const video = activeItem.querySelector('video');
                

                if (video) {
                  // we pause the slider, then start the video from the beginning
                  console.log('Carousel Paused');
                  carousel.pause();
                  video.currentTime = 0;
                  console.log('Video Start');
                  video.play();

                  // once the video has ended, we move to the next slide and restart the carousel
                  video.onended = () => {
                    video.currentTime = 0; // reset the video the begining
                    console.log('Video End');
                    console.log('Carousel Next');
                    carousel.next(); // we move to the next slide
                    console.log('Carousel Restart');
                    carousel.cycle(); // we restart the carousel
                  };
                }
            });
        })
        .catch(err => console.error("Error loading files:", err));
    }

    // date time
    function updateClock() {
        const now = new Date();

        // Time with 2‑digit hour/minute/second
        const time = now.toLocaleTimeString("en-US", {
            hour: '2-digit',
            minute: '2-digit'
        });

        document.getElementById('time').textContent = time;
    }

    // news RSS
    async function loadRSS() {
        try {
            const response = await fetch("rss-proxy.php");
            const text = await response.text();

            const parser = new DOMParser();
            const xml = parser.parseFromString(text, "application/xml");

            const items = xml.querySelectorAll("item");
            const container = document.getElementById("news-feed");
            container.innerHTML = "";

            items.forEach((item, index) => {
                const title = item.querySelector("title")?.textContent;
                if (title) {
                    const span = document.createElement("news-item");
                    // console.log(title, index)
                    span.classList.add('carousel-item');
                    if (index === 0) span.classList.add('active'); // first item
                    span.textContent = title ;
                    container.appendChild(span);
                }
            });
            
        } catch (err) {
            console.error("Error loading RSS:", err);
        }
    }

    // forcast from Enviroment Canada
    async function loadForecastCarousel() {
      const url = "weather-proxy.php?t=" + Date.now();

      try {
          const res = await fetch(url);
          const data = await res.json();

          const location = data[0];
          const daily = location.dailyFcst.daily; // 7-day array

          const container = document.getElementById("forecast-slides");
          container.innerHTML = ""; // clear old slides

          daily.forEach((day, index) => {
              const date = day.date;                       // "Thu, 11 Dec"
              const summary = day.summary;                 // "Chance of showers"
              const high = day.temperature.periodHigh;     // high temp
              const low = day.temperature.periodLow ?? ""; // may not exist
              const pop = day.precip || "";                // POP %
              const iconClass = getWeatherIcon(summary);

              // Build slide
              const div = document.createElement("forecast-slide");
              div.classList.add("carousel-item");
              // the first slide needs the 'active' class to enable the slids
              if (index === 0) div.classList.add("active");

              div.innerHTML = `
                  <div class="d-flex flex-row align-items-center justify-content-center">
                      <div class="forecast-text date">${date}</div>
                      
                      <div class="forecast-text summary"><i class="wi ${iconClass}"></i> ${summary}</div>
                      <div class="forecast-text temps">
                          ${high !== undefined ? `High ${high} °C` : ""}
                          ${low !== "" ? `Low ${low} °C` : ""}
                      </div>
                      ${pop !== "" ? `<div class="forecast-text pop">POP ${pop}%</div>` : ""}
                  </div>
              `;

              container.appendChild(div);
          });

      } catch (err) {
          console.error("Forecast carousel error:", err);
      }
    }
    
    // get the approriate weather icon
    function getWeatherIcon(cond) {
        const c = (cond || "").toLowerCase();

        if (c.includes("rain")) return "wi-rain";
        if (c.includes("shower")) return "wi-showers";
        if (c.includes("snow")) return "wi-snow";
        if (c.includes("flurries")) return "wi-snow-wind";
        if (c.includes("cloud") || c.includes("overcast")) return "wi-cloudy";
        if (c.includes("sun") || c.includes("clear")) return "wi-day-sunny";
        if (c.includes("fog") || c.includes("mist")) return "wi-fog";
        if (c.includes("thunder") || c.includes("storm")) return "wi-thunderstorm";
        if (c.includes("drizzle")) return "wi-sprinkle";
        if (c.includes("hail")) return "wi-hail";

        return "wi-na";
    }

    //load the news rss feed
    loadRSS();
    // clock update onload
    updateClock();
    // clock update interval
    setInterval(updateClock, 1000);
    // Initial load
    loadFiles();
    // Refresh every 5 minutes (300,000 ms)
    setInterval(loadFiles, 300000);
    // load the carousel
    loadForecastCarousel();
    // set a reload time to ensure the forecast is as updated as possible
    setInterval(loadForecastCarousel, 300000);
  </script>
  <!-- this is a hack -->
   <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Get carousel instance
      const carouselElement = document.querySelector('#carousel');
      const carousel = new bootstrap.Carousel(carouselElement, {
        // interval: false, // Disable built-in auto-slide
        // ride: false
      });

      // Trigger slide every 60 seconds
      setInterval(() => {
        carousel.cycle();
      }, 60000 * 5); // 60,000 ms = 60 seconds
    });
  </script>
</body>
</html>
