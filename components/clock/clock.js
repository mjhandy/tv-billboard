// date time
function updateClock() {
  const now = new Date();


  let h = String(now.getHours()).padStart(2, '0');
  let m = String(now.getMinutes()).padStart(2, '0');
  let ampm = h >= 12 ? 'PM' : 'AM';

  document.getElementById('hours').textContent = h;
  document.getElementById('minutes').textContent = m;
  document.getElementById('ampm').textContent = ampm;

  // Flashing effect: toggle colon visibility every second
  const visible = now.getSeconds() % 2 === 0;
  document.getElementById('colon').style.opacity = visible ? '1' : '0';


}

// clock update onload
updateClock();
// clock update interval
setInterval(updateClock, 1000);