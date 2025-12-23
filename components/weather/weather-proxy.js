async function loadWeather() {
    const url = "./components/weather/weather-proxy.php";

    try {
        const response = await fetch(url);
        const data = await response.json();

        if (data.error) {
            console.error("Weather error:", data.error);
            return;
        }

        buildFullCarousel(data.current, data.daily);

    } catch (err) {
        console.error("Weather fetch failed:", err);
    }
}

// --------------------------------------------------
// Format date: "2025-12-24" → "Dec. 24, 25"
// --------------------------------------------------
function formatDate(dateStr) {
    if (!dateStr) return "";

    const d = new Date(dateStr);
    if (isNaN(d)) return "";

    const months = [
        "Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.",
        "Jul.", "Aug.", "Sep.", "Oct.", "Nov.", "Dec."
    ];

    const month = months[d.getMonth()];
    const day = d.getDate();
    // const year = String(d.getFullYear()).slice(-2);
    const year = d.getFullYear();

    return `${month} ${day}, ${year}`;
}

// --------------------------------------------------
// Build ENTIRE Bootstrap Carousel (Slide 0 + Forecast)
// --------------------------------------------------
function buildFullCarousel(current, days) {
    const inner = document.querySelector("#forecastInner");
    inner.innerHTML = ""; // wipe everything

    // --------------------------------------------------
    // Slide 0 — Current Weather (ACTIVE)
    // --------------------------------------------------
    const slide0 = document.createElement("div");
    slide0.className = "carousel-item active";

    const currentIcon = current.icon ?? "unknown.png";

    slide0.innerHTML = `
        <div class="d-flex flex-row align-items-center justify-content-center">
            <div class="forecast forecast_date">Current Conditions: </div>    
            <div class="forecast forecast_temp" id="temp">${current.temperature}°</div>
            <img id="current-icon" class="weather-icon" src="./assets/weather_icons/${currentIcon}" width="50">    
            <div class="forecast forecast_feelLike">Feels like: <span id="feels">${current.apparent}°</span></div>
            <div class="forecast forecast_humidity">Humidity: <span id="humidity">${current.humidity}%</span></div>
            <div class="forecast forecast_precip">Precip: <span id="precip">${current.precipitation} mm</span></div>
        </div>
    `;

    inner.appendChild(slide0);

    // --------------------------------------------------
    // Slides 1+ — Daily Forecast
    // --------------------------------------------------
    days.forEach(day => {
        const slide = document.createElement("div");
        slide.className = "carousel-item";

        const iconFile = day.icon ?? "unknown.png";
        const formattedDate = formatDate(day.date);

        slide.innerHTML = `
            <div class="d-flex flex-row align-items-center justify-content-center">
                <div class="forecast forecast_date">${formattedDate}</div>
                <img src="./assets/weather_icons/${iconFile}" class="weather-icon" width="50">
                <div class="forecast forecast_temps">
                    <span class="max">H: ${day.temp_max}°</span> /
                    <span class="min">L: ${day.temp_min}°</span>
                </div>
            </div>
        `;

        inner.appendChild(slide);
    });
}

// --------------------------------------------------
// Start
// --------------------------------------------------
loadWeather();
