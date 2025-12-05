<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Live File List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta http-equiv="refresh" content="300">
</head>
<body>


<div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner" id="slide">
    </div>
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



// Initial load
loadFiles();

// Refresh every 5 minutes (300,000 ms)
setInterval(loadFiles, 300000);
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>
