async function loadWeather() {
    const url = "./components/weather/weather_api.php";

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

    slide0.innerHTML = `
        <div class="d-flex flex-row align-items-center">
            <img id="current-icon" class="forecast forecast_icon" src="./assets/weather_icons/${current.icon}">
            <div class="forecast forecast_temp" id="temp">${current.temperature}°</div>
            <div class="forecast forecast_feelLike">Feels like: <span id="feels">${current.apparent}°</span></div>
            <div class="forecast forecast_humidity">Humidity: <span id="humidity">${current.humidity}%</span></div>
            <div class="forecast forecast_percip">Precip: <span id="precip">${current.precipitation} mm</span></div>
        </div>
    `;

    inner.appendChild(slide0);

    // --------------------------------------------------
    // Slides 1+ — Daily Forecast
    // --------------------------------------------------
    days.forEach(day => {
        const slide = document.createElement("div");
        slide.className = "carousel-item";

        slide.innerHTML = `
            <div class="d-flex flex-row align-items-center">
                <div class="forecast forecast_day">${day.date}</div>
                <img src="./assets/weather_icons/${day.icon}" class="weather-icon mb-3">
                <div class="forecast forecast_temps>
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
