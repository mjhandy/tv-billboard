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
      --brandWidth: 9vw;
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
      align-items:flex-start;
      padding: 10px;
      /* cursor: none; */
    }

    #header{
      position: absolute;
      top: 0;
      right: 0;
      left: 0;
      height: 50px;
      z-index: 5;
      background: var(--bg-gradient);
      display: flex;
      gap: 12px;
      color: #fff;
    }

    #fuel-list{
      display: flex;
      flex-flow: row;
    }

    .fuel-item{
      display: flex;
      flex-flow: row;
    }

    .fuel-item:after{
      content: "|";
      display: inline-block;
      margin: 0 10px;
      color: red;
      font-weight: 700;
    }

    .fuel-item:last-child:after{
      content: '';
      display: none;
    }

    .fuel-name:after{
      content: ':';
      display: inline-block;
      margin: 0 5px;
    }

    .fuel-item:last-child{
      margin: 0;
    }
    
    .change-icon{
      margin-right: 5px;
    }

    .fuel-item .down{
      color: green;
    }

    .fuel-item .up{
      color: red;
    }

    .fuel-price{
      margin: 0 5px;
    }

    #fuel-date{
      margin-right: 20px;
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
    #footer .footerRow,
    #header .headerRow{
      height: var(--footerRow-height)
    }

    #footer .brand,
    #header .brand{
      position: absolute;
      top: 0;
      background:#fff;
      height: 100%;
      width: var(--brandWidth);
      z-index: 5;
    }

    #footer #news{
      position: relative;
      width: 100%;
      border-bottom: 1px solid #fff;
    }


    #footer #news #news-feed,
    #header #fuelPrices{
      color: #fff;
      white-space: nowrap;
      height: 100%;
      width: calc(100% - (2 *  var(--brandWidth)));
      position: absolute;
      top: 0;
      left: var(--brandWidth);
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
  <div id="header" class="footerRow d-flex flex-row">
      <div id="fuelLogo" class="brand d-flex align-items-center justify-content-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="35px" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 175.7276 122.469">
          <defs>
            <style type="text/css">
            <![CDATA[
              .fil1 {fill:#E41D2C}
              .fil0 {fill:#1264AD}
            ]]>
            </style>
          </defs>
          <g id="Layer_x0020_1">
            <metadata />
            <g id="_1067825216">
            <path class="fil0" d="M-0 61.2366c0,33.8102 39.3932,61.2324 87.9241,61.2324 48.5311,-0.1628 87.8493,-27.6015 87.8034,-61.4118 0,-33.7978 -39.389,-61.0572 -87.9243,-61.0572 -48.5267,0 -87.8032,27.4221 -87.8032,61.2366zm160.8356 -0.1794l0 0c0,26.2912 -32.6086,47.6172 -72.9115,47.6172 -40.3194,0 -72.9655,-21.2217 -73.0239,-47.4378 0,-26.0995 32.6504,-47.4296 72.903,-47.4296 40.3071,-0.1752 72.9699,21.1508 73.0324,47.2502z"/>
            <path class="fil1" d="M114.0236 46.8663c-4.1391,-2.5286 -9.48,-3.7344 -14.483,-2.8207 -1.4437,0.2921 -2.7079,0.7469 -3.9722,1.498 -1.5481,0.8512 -2.7581,2.0612 -3.8013,3.3839 -0.7385,1.1474 -1.21,2.3576 -1.4896,3.6803 -0.4547,1.9611 -0.3504,3.7427 0.121,5.8165 1.3103,5.3407 7.0643,6.4923 11.4913,8.4494 0.7552,0.2796 1.548,0.751 1.9027,1.6023 0.4547,0.9263 0.4005,2.0779 -0.4589,2.829 -0.6301,0.5674 -1.6774,0.7469 -2.4242,0.9096 -3.6219,0.2963 -7.3605,-1.21 -10.4565,-2.9834l0.0459 9.3716c1.6189,0.8554 3.0042,1.1474 4.6064,1.6023 6.3298,2.0779 14.0323,1.5063 18.401,-4.3103 2.1781,-2.9292 2.7081,-6.6636 1.4897,-10.0517 -0.6802,-1.7817 -1.7274,-3.2838 -3.3881,-4.3145 -1.3853,-1.043 -2.7081,-1.6189 -4.1976,-2.3574 -2.1906,-0.9222 -4.8235,-0.9222 -6.3883,-2.8207 -0.3964,-0.4589 -0.3964,-1.331 -0.2171,-1.9611 0.2796,-0.7385 0.5758,-1.0306 1.2644,-1.3227 1.4895,-0.5758 2.9918,-0.4589 4.5356,-0.1627 2.5868,0.3421 5.1822,1.7774 7.5355,2.8123l-0.1168 -8.85zm-28.5695 0l0 0c-4.1517,-2.5286 -9.4383,-3.576 -14.5038,-2.8207 -1.3687,0.2921 -2.6913,0.8679 -3.9556,1.6148 -1.5648,0.7344 -2.7706,1.9444 -3.8011,3.3881 -0.747,1.0264 -1.206,2.2366 -1.5023,3.5593 -0.3962,1.9611 -0.2796,3.8554 0.1795,5.8165 1.2643,5.3407 7.0225,6.6634 11.4371,8.4494 0.7469,0.2796 1.5604,0.751 1.8984,1.6023 0.4715,0.9263 0.413,2.0779 -0.3963,2.829 -0.6927,0.5674 -1.7274,0.9096 -2.4743,0.9096 -3.6219,0.2963 -7.302,-1.0305 -10.4649,-2.9834 0,0.1711 0.0585,9.4926 0.0585,9.3716 1.6023,0.8554 2.9918,1.1474 4.6065,1.7816 6.313,1.8985 14.0865,1.4438 18.3969,-4.3144 2.1821,-2.9876 2.6995,-6.6678 1.4896,-10.1227 -0.6301,-1.7816 -1.7233,-3.2087 -3.384,-4.4187 -1.3853,-0.8678 -2.7081,-1.6189 -4.2101,-2.2531 -2.1781,-0.8512 -4.7734,-1.0264 -6.3757,-2.925 -0.3965,-0.4589 -0.3965,-1.331 -0.1754,-1.9611 0.238,-0.5758 0.5133,-1.0306 1.21,-1.3227 1.4981,-0.5758 2.9834,-0.2838 4.5482,-0.1627 2.6328,0.3421 5.1614,1.7774 7.5773,2.8123l-0.1586 -8.85zm-26.9672 -10.9823l0 0c-5.0697,-3.0001 -11.4579,-3.8512 -17.2537,-2.0737 -3.7969,1.1474 -7.0808,3.5634 -8.6873,7.2435 -0.8095,1.6607 -1.2057,3.5592 -1.1473,5.5203 0.0625,4.2561 2.9292,7.711 6.4883,9.889 -0.5091,0.6342 -1.2643,0.7552 -1.9528,1.21 -1.089,0.7511 -1.9443,1.6023 -2.7539,2.6496 -1.4438,1.6606 -2.2949,3.5591 -2.5328,5.7997 -0.2336,1.8985 -0.1751,3.9764 0.4549,5.7498 1.7273,4.7735 5.879,8.1741 10.9822,9.0879 2.37,0.4548 4.6065,0.5758 6.9055,0.2922 1.8986,-0.1795 3.5051,-0.4715 5.2993,-1.0473 1.3102,-0.2754 2.4116,-0.7469 3.6801,-1.4813 0,-0.121 -1.2684,-8.6247 -1.2684,-8.6247 -3.4548,0.6301 -7.1351,2.1155 -10.64,0.6301 -2.078,-0.7511 -2.7664,-3.1044 -2.4158,-5.1781 0.2796,-1.9611 1.6022,-3.1044 3.2837,-3.7428 2.754,-1.0305 5.8583,-0.7509 8.8458,-0.7509l-0.1168 -8.1532c-2.2949,0.3421 -4.7692,0.1627 -7.2978,-0.2963 -0.8094,-0.1169 -1.4895,-0.3964 -2.2448,-0.8513 -0.6885,-0.6342 -1.1433,-1.21 -1.4979,-1.7816 -0.747,-1.5022 -0.793,-3.0043 -0.0585,-4.3145 2.5911,-4.6065 8.7456,-2.6496 12.8222,-1.1599l1.1058 -8.6164zm74.6847 16.7237l0 0c-3.1043,0 -5.1824,3.459 -5.0614,9.8388 0.1168,6.3215 2.295,9.768 5.3994,9.768 3.1668,0 5.3575,-3.5592 5.2447,-9.768 -0.121,-6.7302 -2.4158,-9.9556 -5.5828,-9.8388zm0.121 -9.0212l0 0c8.4453,-0.1168 15.4092,4.4313 15.6346,18.5178 0.2296,13.6735 -6.4924,19.148 -14.9462,19.3107 -8.4619,0.121 -15.4091,-4.5898 -15.6429,-18.6764 -0.2378,-13.8111 6.4884,-18.9767 14.9545,-19.152z"/>
            </g>
          </g>
          </svg>
      </div>
      <div id="fuelPrices" class="d-flex flex-row align-items-center justify-content-center"></div>      
  </div>
  <!-- Billboard Images -->
  <div 
      id="carousel" 
      class="carousel slide carousel-fade" 
      data-bs-ride="carousel"
      data-bs-internal="15000" 
      data-bs-pause="false">
      <div 
        id="slide" 
        class="carousel-inner"></div>
  </div>
  <!-- Footer -->
  <div id="footer" class="d-flex flex-column">
    <div id="news" class="footerRow d-flex flex-row">
      <div id="news-logo" class="brand d-flex align-items-center justify-content-center">
          <svg  width="71px" height="18px" viewBox="0 0 71 18" focusable="false" aria-hidden="true"><path d="M12.2646923,8.95707692 C12.2646923,10.719 10.8364615,12.1472308 9.07476923,12.1472308 C7.31307692,12.1472308 5.88484615,10.719 5.88484615,8.95707692 C5.88484615,7.19538462 7.31307692,5.76738462 9.07476923,5.76738462 C10.8364615,5.76738462 12.2646923,7.19538462 12.2646923,8.95707692" id="Fill-1" fill="#D8232A"></path><path d="M5.39307692,12.147 C3.63,12.147 2.20130769,10.719 2.20130769,8.95753846 C2.20130769,7.19561538 3.63,5.766 5.39284615,5.766 L5.39307692,12.147" id="Fill-2" fill="#D8232A"></path><path d="M12.7596923,15.6664615 L12.7603846,12.6394615 L15.7887692,12.6408462 C15.7887692,14.3141538 14.4323077,15.6664615 12.7596923,15.6664615" id="Fill-3" fill="#D8232A"></path><path d="M5.39284615,2.24469231 L5.39284615,5.27538462 L2.36053846,5.27584615 C2.36053846,3.60207692 3.71861538,2.24469231 5.39284615,2.24469231" id="Fill-4" fill="#D8232A"></path><path d="M5.39307692,15.6683077 L5.39307692,12.6394615 L2.36123077,12.6408462 C2.36123077,14.3139231 3.71792308,15.6683077 5.39307692,15.6683077" id="Fill-5" fill="#D8232A"></path><path d="M16.4455385,11.6986154 L16.4439231,6.21623077 C17.3778462,6.77238462 18.0034615,7.79169231 18.0034615,8.95753846 C18.0034615,10.1229231 17.3778462,11.1413077 16.4455385,11.6986154" id="Fill-6" fill="#D8232A"></path><path d="M6.33484615,1.58861538 L11.8174615,1.58953846 C11.2610769,0.655615385 10.2429231,0.0311538462 9.07684615,0.0311538462 C7.911,0.0311538462 6.89123077,0.655615385 6.33484615,1.58861538" id="Fill-7" fill="#D8232A"></path><path d="M11.7770769,16.3255385 L6.29353846,16.3248462 C6.85015385,17.2583077 7.869,17.8841538 9.03530769,17.8841538 C10.2011538,17.8841538 11.22,17.259 11.7770769,16.3255385" id="Fill-8" fill="#D8232A"></path><path d="M12.2658462,12.6408462 C12.2658462,14.4032308 10.8380769,15.831 9.07661538,15.831 C7.31423077,15.831 5.88484615,14.4032308 5.88484615,12.6408462 L12.2658462,12.6408462" id="Fill-9" fill="#D8232A"></path><path d="M12.7603846,12.147 C14.5220769,12.147 15.9514615,10.719 15.9514615,8.95753846 C15.9514615,7.19561538 14.5220769,5.766 12.7603846,5.766 L12.7603846,12.147" id="Fill-10" fill="#D8232A"></path><path d="M12.2658462,5.27907692 C12.2658462,3.51738462 10.8380769,2.08938462 9.07661538,2.08938462 C7.31423077,2.08938462 5.88484615,3.51738462 5.88484615,5.27907692 L12.2658462,5.27907692" id="Fill-11" fill="#D8232A"></path><path d="M1.70769231,11.6986154 L1.70907692,6.21623077 C0.774923077,6.77238462 0.150461538,7.79169231 0.150461538,8.95753846 C0.150461538,10.1229231 0.774923077,11.1413077 1.70769231,11.6986154" id="Fill-12" fill="#D8232A"></path><path d="M15.789,5.277 L12.7603846,5.27538462 L12.7596923,2.24746154 C14.4325385,2.24746154 15.789,3.60323077 15.789,5.277" id="Fill-13" fill="#D8232A"></path><path d="M29.9725385,17.8790769 C24.8926154,17.8790769 21.1197692,13.9583077 21.1197692,9.00184615 L21.1197692,8.95246154 C21.1197692,4.04538462 24.8187692,0.0258461538 30.1204615,0.0258461538 C33.3752308,0.0258461538 35.3233846,1.11092308 36.9263077,2.68915385 L34.5096923,5.47546154 C33.1781538,4.26738462 31.8219231,3.52753846 30.0957692,3.52753846 C27.186,3.52753846 25.0899231,5.94415385 25.0899231,8.90330769 L25.0899231,8.95246154 C25.0899231,11.9116154 27.1366154,14.3776154 30.0957692,14.3776154 C32.0683846,14.3776154 33.2769231,13.5883846 34.6331538,12.3553846 L37.0495385,14.7966923 C35.2742308,16.6954615 33.3013846,17.8790769 29.9725385,17.8790769" id="Fill-14" fill="#1A1919"></path><path d="M49.5923077,12.4465385 C49.5923077,11.2479231 48.6999231,10.5083077 46.6848462,10.5083077 L42.1451538,10.5083077 L42.1451538,14.436 L46.8124615,14.436 C48.5469231,14.436 49.5923077,13.8237692 49.5923077,12.4977692 L49.5923077,12.4465385 Z M48.5976923,5.30538462 C48.5976923,4.13215385 47.6796923,3.46915385 46.0218462,3.46915385 L42.1451538,3.46915385 L42.1451538,7.24361538 L45.7668462,7.24361538 C47.5010769,7.24361538 48.5976923,6.68261538 48.5976923,5.35638462 L48.5976923,5.30538462 Z M46.8124615,17.8790769 L38.3194615,17.8790769 L38.3194615,0.0258461538 L46.6084615,0.0258461538 C50.2555385,0.0258461538 52.5,1.83669231 52.5,4.64238462 L52.5,4.69338462 C52.5,6.70823077 51.4287692,7.83023077 50.1535385,8.54446154 C52.2193846,9.33507692 53.4946154,10.5336923 53.4946154,12.9313846 L53.4946154,12.9823846 C53.4946154,16.2468462 50.8421538,17.8790769 46.8124615,17.8790769 L46.8124615,17.8790769 Z" id="Fill-15" fill="#1A1919"></path><path d="M63.4393846,17.8790769 C58.3596923,17.8790769 54.5868462,13.9583077 54.5868462,9.00184615 L54.5868462,8.95246154 C54.5868462,4.04538462 58.2856154,0.0258461538 63.5875385,0.0258461538 C66.8423077,0.0258461538 68.7904615,1.11092308 70.3933846,2.68915385 L67.9767692,5.47546154 C66.645,4.26738462 65.2887692,3.52753846 63.5626154,3.52753846 C60.6530769,3.52753846 58.557,5.94415385 58.557,8.90330769 L58.557,8.95246154 C58.557,11.9116154 60.6036923,14.3776154 63.5626154,14.3776154 C65.5354615,14.3776154 66.7437692,13.5883846 68.1,12.3553846 L70.5166154,14.7966923 C68.7413077,16.6954615 66.7682308,17.8790769 63.4393846,17.8790769" id="Fill-16" fill="#1A1919"></path></svg>
      </div>
      <div id="news-feed" class="carousel slide d-flex align-items-center flex-grow-1" data-bs-ride="carousel" data-bs-pause="false" data-bs-interval="10000">
          <div id="news-articles" class="carousel-inner"></div>
      </div>
      <!-- Clock -->
      <div id="time" class="brand d-flex align-items-center justify-content-center"></div>
    </div>
    <div id="weather" class="footerRow d-flex flex-row ">
      <div id="forecastCarousel" class="carousel slide d-flex align-items-center flex-grow-1" data-bs-ride="carousel" data-bs-pause="false" data-bs-interval="20000">
        <div id="forecast-slides" class="carousel-inner" ></div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
  <!-- Page Reload -->
  <script>
    // We need to hard refresh the page in case new assets need to be loaded.
    const rt = 60; // refresh time, in minutes
    setInterval(function () {
        location.reload(true);
    }, rt * 60 * 1000); // 
  </script>
  <!-- Asset loading and slider construction, clock and news feed -->
  <script>    
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

            const ext = file.split('.').pop().toLowerCase();

            if (['jpg','jpeg','png','gif','webp'].includes(ext)) {
              const img = document.createElement('img');
              img.src = 'assets/slides/' + file;
              img.alt = file;
              img.classList.add('d-block','w-100');
              div.appendChild(img);
            } else if (['mp4','webm','ogg'].includes(ext)) {
              const video = document.createElement('video');
              video.src = 'assets/slides/' + file;
              video.classList.add('d-block','w-100');
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
                          ${high !== undefined ? `High of ${high} °C` : ""}
                          ${low !== "" ? `Low of ${low} °C` : ""}
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
    // load the carousel
    loadForecastCarousel();
  </script>
  <!-- Load and display updated fuel prices and changes -->
  <script>
    // Full JavaScript: fetch external CSV once on load and render date + fuel items into #fuelPrices
    // Update CSV_URL to point to your actual CSV file location
    const CSV_URL = 'assets/fuel-prices.csv';

    // Parse CSV text into array of objects (simple CSV without quoted commas)
    function parseCSV(text) {
      const lines = text.trim().split(/\r?\n/).filter(Boolean);
      if (!lines.length) return [];
      const headers = lines.shift().split(',').map(h => h.trim());
      return lines.map(line => {
        const cols = line.split(',').map(c => c.trim());
        const obj = {};
        headers.forEach((h, i) => obj[h] = cols[i] ?? '');
        return obj;
      });
    }

    // Convert date string like "12-Dec-25" or "12-Dec-2025" to a Date for sorting
    function parseDate(d) {
      if (!d) return new Date(0);
      const parts = d.split('-');
      if (parts.length !== 3) return new Date(d);
      const day = parseInt(parts[0], 10);
      const monthStr = parts[1].slice(0,3).toLowerCase();
      const year = parts[2].length === 2 ? '20' + parts[2] : parts[2];
      const monthNames = {
        jan: '01', feb: '02', mar: '03', apr: '04', may: '05', jun: '06',
        jul: '07', aug: '08', sep: '09', oct: '10', nov: '11', dec: '12'
      };
      const m = monthNames[monthStr] || '01';
      return new Date(`${year}-${m}-${String(day).padStart(2,'0')}`);
    }

    // Build a single fuel item DIV — concise change text (e.g., "Down 4.0")
    function buildFuelItem(name, curVal, prevVal) {
      const item = document.createElement('div');
      item.className = 'fuel-item ';

      // Left meta (name + small label)
      const meta = document.createElement('div');
      meta.style.display = 'flex';
      meta.style.flexDirection = 'row';
      meta.innerHTML = `<div class="fuel-name">${name}</div>`;

      // Change block (icon + concise text)
      const change = document.createElement('div');
      change.className = 'fuel-change';
      change.style.display = 'flex';
      change.style.flexDirection = 'row';

      let icon = '—', cls = 'same', title = 'No previous value', changeText = 'No previous';
      if (prevVal !== null && !isNaN(prevVal) && !isNaN(curVal)) {
        const diff = Math.abs(curVal - prevVal);
        if (curVal > prevVal) {
          icon = '▲';
          cls = 'up';
          title = `${prevVal.toFixed(1)}`;
          changeText = ` ${diff.toFixed(1)}`;
        } else if (curVal < prevVal) {
          icon = '▼';
          cls = 'down';
          title = `${prevVal.toFixed(1)}`;
          changeText = ` ${diff.toFixed(1)}`;
        } else {
          icon = '—';
          cls = 'same';
          title = `No change ${prevVal.toFixed(1)}`;
          changeText = 'NC';
        }
      }

      const iconEl = document.createElement('span');
      iconEl.className = `change-icon ${cls}`;
      iconEl.setAttribute('title', title);
      iconEl.setAttribute('aria-hidden', 'true');
      iconEl.textContent = icon;

      const textEl = document.createElement('div');
      textEl.className = 'change-text';
      textEl.textContent = changeText;

      change.appendChild(iconEl);
      change.appendChild(textEl);

      // Price on the right
      const price = document.createElement('div');
      price.className = 'fuel-price';
      price.textContent = isNaN(curVal) ? '-' : curVal.toFixed(1);

      item.appendChild(meta);
      item.appendChild(price);
      item.appendChild(change);
      

      return item;
    }

    // Render date and fuel items into #fuelPrices
    function renderFuelDivs(rows) {
      const container = document.getElementById('fuelPrices');
      if (!container) return;
      container.innerHTML = '';

      if (!rows || rows.length === 0) {
        container.textContent = 'No price data available';
        return;
      }

      // sort by date ascending and pick latest two
      rows.sort((a, b) => parseDate(a.Date) - parseDate(b.Date));
      const latest = rows[rows.length - 1];
      const previous = rows.length > 1 ? rows[rows.length - 2] : null;

      // Date block (single)
      const dateBlock = document.createElement('div');
      dateBlock.id = 'fuel-date';
      dateBlock.className = 'fuel-date-block';
      dateBlock.textContent =  `${latest.Date}`;
      container.appendChild(dateBlock);

      // Fuel list container
      const list = document.createElement('div');
      list.id = 'fuel-list';
      list.className = 'fuel-list';

      const fuelCols = Object.keys(latest).filter(h => h !== 'Date');
      fuelCols.forEach(col => {
        const curVal = parseFloat(latest[col]);
        const prevVal = previous ? parseFloat(previous[col]) : null;
        const item = buildFuelItem(col, curVal, prevVal);
        list.appendChild(item);
      });

      container.appendChild(list);
    }

    // Fetch CSV and render once on load (cache-busted)
    async function fetchAndRender() {
      try {
        const res = await fetch(CSV_URL + '?t=' + Date.now(), { cache: 'no-store' });
        if (!res.ok) throw new Error('Network response not ok: ' + res.status);
        const text = await res.text();
        const rows = parseCSV(text);
        renderFuelDivs(rows);
      } catch (err) {
        console.error('Error loading CSV:', err);
        const container = document.getElementById('fuelPrices');
        if (container) container.textContent = 'Error loading prices';
      }
    }

    // Run on DOMContentLoaded
    document.addEventListener('DOMContentLoaded', () => {
      fetchAndRender();
    });

  </script>
</body>
</html>
