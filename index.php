<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Live File List</title>

    <style>
        body { font-family: Arial, sans-serif; }
        #fileList { margin-top: 20px; }
    </style>
</head>
<body>

<h2>Files in Folder:</h2>
<ul id="fileList"></ul>

<script>
// Fetch and update the list
function loadFiles() {
    fetch('list-files.php')
        .then(response => response.json())
        .then(files => {
            const list = document.getElementById('fileList');
            list.innerHTML = '';

            files.forEach(file => {
                const li = document.createElement('li');
                li.textContent = file;
                list.appendChild(li);
            });
        })
        .catch(err => console.error('Error:', err));
}

// Initial load
loadFiles();

// Refresh every 5 minutes (300,000 ms)
setInterval(loadFiles, 300000);
</script>

</body>
</html>
