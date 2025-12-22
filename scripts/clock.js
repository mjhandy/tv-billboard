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

// clock update onload
updateClock();
// clock update interval
setInterval(updateClock, 1000);