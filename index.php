<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Live File List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta http-equiv="refresh" content="300">
    <style>
        @font-face {
            font-family: Digi;
            src: url(assets/fonts/DS-DIGI.TTF);
            font-weight: 400;
        }

        body{
            margin: 0;
            padding: 0;
            overflow: hidden;
        }


        #carousel{
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;

        }
        #dateTime{
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 3vw;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 20px;
            z-index: 5;
            font-family: Digi;
            line-height: 1;
        }
        #weather{
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 5;

        }
        #news{
            position: absolute;
            bottom:0;
            left: 0;
            right: 0;
            z-index: 5;

        }
    </style>
</head>
<body>


<div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner" id="slide">
    </div>
</div>

<div id="dateTime">
    
</div>

<div id="weather">
    <!-- Begin WeatherLink Fragment -->
<iframe title="Environment Canada Weather" width="500" src="https://weather.gc.ca/wxlink/wxlink.html?coords=44.567%2C-64.683&lang=e" allowtransparency="true" style="border: 0;"></iframe>
<!-- End WeatherLink Fragment -->
</div>


<div id="news">
    <rssapp-ticker id="t6orBzpaBMcPrcS1"></rssapp-ticker><script src="https://widget.rss.app/v1/ticker.js" type="text/javascript" async></script>
</div>

<script>
// Fetch and update the list
function loadFiles() {
    fetch('list-files.php')
        .then(response => response.json())
        .then(files => {
            const list = document.getElementById('slide');
            list.innerHTML = '';

            files.forEach((file, index) => {
                const div = document.createElement('div');
                div.classList.add('carousel-item');

                // Add "active" class to the first item
                if (index === 0) {
                    div.classList.add('active');
                }

                // Create the image tag
                const img = document.createElement('img');
                img.classList.add('d-block');
                img.classList.add('w-100');
                img.src = 'assets/images/' + file;
                img.alt = file;

                div.appendChild(img);
                list.appendChild(div);
            });
        })
        .catch(err => console.error('Error:', err));
}

function updateClock() {
    const now = new Date();

    // Short weekday names
    const weekdays = ['Sun.', 'Mon.', 'Tue.', 'Wed.', 'Thu.', 'Fri.', 'Sat.'];
    const months   = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    const weekday = weekdays[now.getDay()];
    const month   = months[now.getMonth()];
    const day     = now.getDate();
    const year    = now.getFullYear();

    // Build date string without commas
    const date = `${weekday} ${month} ${day}, ${year}`;

    // Time with 2‑digit hour/minute/second
    const time = now.toLocaleTimeString("en-US", {
        hour: '2-digit',
        minute: '2-digit'
    });

    document.getElementById('dateTime').textContent = date + ' - ' + time;
}

updateClock();
setInterval(updateClock, 1000);

// Initial load
loadFiles();

// Refresh every 5 minutes (300,000 ms)
setInterval(loadFiles, 300000);
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>
