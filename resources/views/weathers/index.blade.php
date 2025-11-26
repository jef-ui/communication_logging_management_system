<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCD MIMAROPA Weather Monitoring Dashboard </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Momo+Signature&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>

        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        .dashboard {
            background-color: #0d0d0d;
            display: flex;
            justify-content: center;
            text-align: center;
            flex-direction: column;
            width: 100%;
            height: 100vh;
            overflow-x: hidden;
            overflow-y: hidden;
            gap: 10px;
            font-family: "Inter", sans-serif;
            
        }

        .main-header {
            background-color: #2B2B2B;
            width: 100%;
            height: 50px;
        }


        
        .main-container {
            
            display: flex;
            flex-direction: row;
            background-color: #0d0d0d;
            width: 100%;
            height: 400px;
            gap: 10px;
            justify-content: space-between;
        }

        .card1 {
            background-color: red;
            width: 350px;
            height: 30px;
        }

        
        .card1-container {
            background-color: #2B2B2B;
            width: 340px;
            height: 370px;
        }
        
        .card2 {
            display: flex;
            flex-direction: column;
            width: 650px;
            height: 400px;
            color: rgb(215, 215, 215);   
        }

        .windy {
            background-color: #2B2B2B;
            display: block;
            width: 100%;
            height: 30px;
            font-weight: 300;
            font-size: 15px;
            display: flex;
            align-items: center;
        }

        .windy-map {
            background-color: pink;
            width: 100%;
            height: 370px;
        }

        .card3 {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: red;
            width: 650px;
            height: 400px;
            color: white;   
        }

        .secondary-container {
            display: flex;
            flex-direction: row;
            width: 100%;
            gap: 10px;
            height: 200px;
            justify-content: space-between;
        }

        .card1-container {
            background-color: #0e0e0e;
            border: 1px solid #2B2B2B;
        }

        .secondary-card1 {
            background-color: rgb(55, 15, 67);
            width: 30%;
            height: 200px;
        }

        .secondary-card2 {
            width: 40%;
            height: 200px;
            border: 1px solid #2B2B2B;
        }

        

        

        

        .main-header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding-left: 20px;
            padding-right: 20px;

            
        }

        .logo {
            width: 100px;
            height: auto;
        }
        .title {
            font-size: 25px;
            color: rgb(215, 215, 215);
        }

        .logo2 {
            width: 50px;
            height: auto;
        }

        .card1 h4 {
            color: rgb(215, 215, 215);
        }

        .footer p {
            font-size: 12px;
            color: rgb(215, 215, 215);
        }

        .footer {
            display: flex;
            align-items: center;
            justify-content: center;    
        }

        .card {
            margin-top: 20px; 
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: left;
        }


        /* scroll */
        /* Black Scrollbar */
.secondary-card2::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

.secondary-card2::-webkit-scrollbar-track {
    background: #1a1a1a;   /* dark track */
    border-radius: 4px;
}

.secondary-card2::-webkit-scrollbar-thumb {
    background: #000;      /* pure black thumb */
    border-radius: 4px;
}

.secondary-card2::-webkit-scrollbar-thumb:hover {
    background: #333;      /* slightly lighter on hover */
}




    </style>
</head>
<body>
    {{-- Dashboard main parent --}}
    <div class="dashboard">
        <div class="main-header">
            <img src="{{asset ('images/ocdrdrrmc.png')}}" alt="ocd-rdrrmc-logo" class="logo">
            <h4 class="title">OCD MIMAROPA Weather Monitoring Dashboard</h4>
            <img src="{{asset ('images/bago.png')}}" alt="ocd-rdrrmc-logo" class="logo2">
            
        </div>

        <div class="main-container">
            <div class="card1">
                  <h4 class="windy">MIMAROPA Real-Time Weather Condition</h4>
                 <div class="card1-container">
    <!-- Weather Conditions Panel -->
    <div class="card">
        <div id="weatherBox">
            <p style="color:#777;">Loading weather data...</p>
        </div>
    </div>
</div>

            </div>
                <div class="card2">
                    <h4 class="windy">Windy Weather Map</h4>
                    {{-- windy --}}
                    <div class="windy-map" id="windyMapContainer">
      <iframe
    id="windyMapFrame"
    src="https://embed.windy.com/embed2.html?lat=13.0&lon=122.0&zoom=5&level=surface&overlay=rain&product=ecmwf&menu=&message=true&marker=&calendar=&pressure=&type=map&location=coordinates&detail=&metricWind=knots&metricTemp=c"
    frameborder="0"
    width="100%"
    height="100%">
</iframe>

                    </div>
                </div>  
                {{-- windyend --}}

              <div class="card2">
                    <h4 class="windy">Satellite</h4>
                    {{-- windy --}}
             <div class="windy-map" id="windyMapContainer">
<iframe
    id="windyMapFrame"
    src="https://embed.windy.com/embed2.html?lat=13.0&lon=121.0&zoom=4&level=surface&overlay=satellite&product=ecmwf&tcinfo=1&menu=&message=true&marker=&calendar=&pressure=&type=map&location=coordinates&detail=&metricWind=knots&metricTemp=c"
    frameborder="0"
    width="100%"
    height="100%">
</iframe>



</div>

                </div>  
        </div>

        
        <div class="secondary-container">
         <div class="secondary-card1" id="liveClockContainer" 
     style="display:flex; flex-direction:column; justify-content:center; align-items:center; 
            background:#2B2B2B;">

    <div id="liveTime" 
        style="font-size:55px; font-weight:bold; color:#FFA500; text-shadow:0 0 10px #ff8c00;">
        --
    </div>

    <div id="liveDate" 
        style="font-size:18px; margin-top:5px; color:#FFA500; text-shadow:0 0 8px #ff8c00;">
        --
    </div>

</div>
  
<div class="secondary-card2" >
     
        <h4 class="windy" style="color:rgb(215, 215, 215)">PHILIPPINE DISASTER NEWS (Live Headlines)</h4>
    

    <ul id="newsList" style="margin-top:10px; list-style:none; padding-left:0;">
        <!-- News headlines will appear here -->
    </ul>
</div>

<div class="secondary-card2" 
     style="height:200px; overflow-x:auto; position:relative;">
     
     <h4 class="windy" style="color:rgb(215, 215, 215)">MIMAROPA Heat Index Monitoring</h4>

     <canvas id="rainfallChart" 
             style="height:10px !important;"></canvas>

</div>





        </div>    

        
    <div class="footer">
        <p>Designed and Developed by ICTU MIMAROPA, Office of Civil Defense MIMAROPA © 2025</p>
    </div>


    
    </div>

    </div> 
<script>
function resizeWindyMap() {
    const card = document.getElementById("windyMapContainer");
    const frame = document.getElementById("windyMapFrame");
    frame.style.width = card.clientWidth + "px";
    frame.style.height = card.clientHeight + "px";
}

window.addEventListener("load", resizeWindyMap);
window.addEventListener("resize", resizeWindyMap);
</script>

<script>
const apiKey = "2348d8b4d12fe196f2a2a15310f0a7da";  

const provinces = [
    { api: "Boac", label: "Marinduque Province" },
    { api: "Calapan", label: "Oriental Mindoro Province" },
    { api: "Mamburao", label: "Occidental Mindoro Province" },
    { api: "Romblon", label: "Romblon Province" },
    { api: "Puerto Princesa", label: "Palawan Province" }
];

function get3DIcon(condition) {
    const text = condition.toLowerCase();

  if (text.includes("clear")) 
    return "/images/weather/sun.png";

// ☁ OVERCAST CLOUDS
if (text.includes("overcast")) 
    return "/images/weather/overcast.png";   // ← NEW (use a more solid cloud icon)

// 🌤 FEW / SCATTERED CLOUDS
if (text.includes("few clouds") || text.includes("scattered")) 
    return "/images/weather/partly.png";

// ⛅ BROKEN CLOUDS (very important for accuracy)
if (text.includes("broken")) 
    return "/images/weather/broken.png";     // ← NEW icon file

// ☁ GENERAL CLOUDS (fallback)
if (text.includes("cloud")) 
    return "/images/weather/cloudy.png";

// 🌧 LIGHT / MODERATE / HEAVY RAIN
if (text.includes("light rain")) 
    return "/images/weather/rain-light.png";

if (text.includes("moderate rain")) 
    return "/images/weather/rain.png";

if (text.includes("heavy rain")) 
    return "/images/weather/rain-heavy.png";

if (text.includes("rain")) 
    return "/images/weather/rain.png";

// ⛈ THUNDERSTORM
if (text.includes("thunder")) 
    return "/images/weather/storm.png";

// 🌫 HAZE / SMOKE / MIST / FOG
if (text.includes("haze") || text.includes("smoke") ||
    text.includes("mist") || text.includes("fog")) 
    return "/images/weather/fog.png";

    return "/images/weather/unknown.png";
}

async function loadWeatherForProvinces() {
    const weatherBox = document.getElementById("weatherBox");
    weatherBox.innerHTML = "";

    for (const item of provinces) {
        try {
            const url = `https://api.openweathermap.org/data/2.5/weather?q=${item.api},PH&appid=${apiKey}&units=metric`;
            const response = await fetch(url);
            const data = await response.json();

            if (data.cod == 200) {
                const temp = data.main.temp.toFixed(1);
                const condition = data.weather[0].description;
                const icon3d = get3DIcon(condition);

                weatherBox.innerHTML += `
                    <div style="
                        padding:10px;
                        border-bottom:1px solid #444;
                        display:flex;
                        align-items:center;
                        color:#2B2B2B;
                    ">
                        <img src="${icon3d}" class="weather-icon-3d" style="width:40px;height:40px;">
                        <div style="margin-left:10px;">
                            <strong style="color:rgb(215, 215, 215);">${item.label}</strong><br>
                            <span style="font-size:0.9rem; color:#ddd;">
                                ${temp}°C - ${condition}
                            </span>
                        </div>
                    </div>
                `;
            } else {
                weatherBox.innerHTML += `
                    <div style="padding:10px; border-bottom:1px solid #444; color:rgb(215, 215, 215);">
                        <strong style="color:rgb(215, 215, 215);">${item.label}</strong><br>
                        <span style="color:red;">Weather unavailable</span>
                    </div>
                `;
            }

        } catch (error) {
            weatherBox.innerHTML += `
                <div style="padding:10px; border-bottom:1px solid #444; color:rgb(215, 215, 215);">
                    <strong style="color:rgb(215, 215, 215);">${item.label}</strong><br>
                    <span style="color:red;">Error loading weather</span>
                </div>
            `;
        }
    }
}

loadWeatherForProvinces();
setInterval(loadWeatherForProvinces, 600000);
</script>

<script>
function updateClock() {
    const timeElem = document.getElementById("liveTime");
    const dateElem = document.getElementById("liveDate");

    const now = new Date();

    // Format time
    let hours = now.getHours();
    let minutes = now.getMinutes();
    let seconds = now.getSeconds();
    const ampm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12 || 12;

    const timeString = 
        `${hours.toString().padStart(2,"0")}:` +
        `${minutes.toString().padStart(2,"0")}:` +
        `${seconds.toString().padStart(2,"0")} ` +
        ampm;

    // Format date
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const dateString = now.toLocaleDateString("en-US", options);

    timeElem.textContent = timeString;
    dateElem.textContent = dateString;
}

// Update immediately
updateClock();

// Update every second
setInterval(updateClock, 1000);
</script>


<script>
async function loadHeatIndex() {
    const apiKey = "2348d8b4d12fe196f2a2a15310f0a7da";

    const provinces = [
        { api: "Boac", label: "Marinduque" },
        { api: "Calapan", label: "Oriental Mindoro" },
        { api: "Mamburao", label: "Occidental Mindoro" },
        { api: "Romblon", label: "Romblon" },
        { api: "Puerto Princesa", label: "Palawan" }
    ];

    let labels = [];
    let heatIndexValues = [];

    for (const p of provinces) {
        try {
            const url = `https://api.openweathermap.org/data/2.5/weather?q=${p.api},PH&appid=${apiKey}&units=metric`;
            const res = await fetch(url);
            const data = await res.json();

            const T = data.main.temp;
            const RH = data.main.humidity;

            // Heat Index formula
            const HI = 
                -8.784 + 
                1.611 * T +
                2.338 * RH -
                0.146 * T * RH -
                0.0123 * (T*T) -
                0.0164 * (RH*RH) +
                0.00221 * (T*T) * RH +
                0.000725 * T * (RH*RH);

            labels.push(p.label);
            heatIndexValues.push(HI.toFixed(1));

        } catch (err) {
            labels.push(p.label);
            heatIndexValues.push(0);
        }
    }

    const ctx = document.getElementById("rainfallChart").getContext("2d");

    if (window.heatChart) window.heatChart.destroy();

    window.heatChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: labels,
            datasets: [{
                label: "Heat Index (°C)",
                data: heatIndexValues,
                borderColor: "#FFA500",
                backgroundColor: "transparent",
                borderWidth: 3,
                tension: 0.3,
                pointRadius: 4,
                pointBackgroundColor: "#FFA500",
                pointBorderColor: "#FFA500"
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,   // ⭐ fixes compression
            plugins: {
                legend: {
                    labels: {
                        color: "#FFA500",
                        font: { size: 12 }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: false,
                    grid: { color: "rgba(255,165,0,0.15)" },
                    ticks: { color: "#FFA500" }
                },
                x: {
                    grid: { display: false },
                    ticks: { color: "#FFA500" }
                }
            }
        }
    });
}

loadHeatIndex();
setInterval(loadHeatIndex, 600000);
</script>




<script>
const newsKey = "4ad9132c35c6447a899b871d7e5b0ebb"; // ← replace with your NewsAPI.org key

async function loadPHDisasterNews() {
    const url = `https://newsapi.org/v2/top-headlines?country=ph&q=disaster OR typhoon OR earthquake OR flood OR weather&apiKey=${newsKey}`;

    try {
        const response = await fetch(url);
        const data = await response.json();

        const newsList = document.getElementById("newsList");
        newsList.innerHTML = ""; 

        if (!data.articles || data.articles.length === 0) {
            newsList.innerHTML = `
                <li style="color:gray; font-size:0.9rem;">No news available.</li>
            `;
            return;
        }

        // Show only the first 5 headlines
        data.articles.slice(0, 5).forEach(article => {
            const item = document.createElement("li");
            item.style.marginBottom = "10px";

            item.innerHTML = `
                <a href="${article.url}" 
                   target="_blank" 
                   style="color:#ff8c00; text-decoration:none; font-size:0.85rem;">
                    • ${article.title}
                </a>
            `;

            newsList.appendChild(item);
        });

    } catch (err) {
        console.error("Error loading news:", err);
        document.getElementById("newsList").innerHTML =
            `<li style="color:gray;">Unable to load news.</li>`;
    }
}

// Load immediately
loadPHDisasterNews();

// Reload every 10 minutes
setInterval(loadPHDisasterNews, 600000);
</script>

<script>
    setInterval(() => {
    location.reload(true); // full page reload (same as CTRL+R)
}, 300000); // 10,000 ms = 10 seconds
</script>





</body>
</html>