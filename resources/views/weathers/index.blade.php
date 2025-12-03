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

        body {
                       background-color: #0d0d0d;
        }

        .dashboard {
            background-color: #0d0d0d;
            display: flex;
            justify-content: center;
            text-align: center;
            flex-direction: column;
            width: 100%;
            height: auto;
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
                        overflow-x: auto;
            overflow-y: auto;
            
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
            gap: 5px;
            height: 400px;
            justify-content: space-between;
        }

        .card1-container {
            background-color: #0e0e0e;
            border: 1px solid #2B2B2B;
        }

        .secondary-card1 {
            width: 25%;
            height: 400px;
            border: 1px solid #2B2B2B;
        }

        .secondary-card1 h4 {
            height: 35px;
        }

        .secondary-card2 {
            width: 30%;
            height: 400px;
            border: 1px solid #2B2B2B;
            overflow-x: auto;
            overflow-y: auto;
        }

        
        .secondary-card-alert {
            width: 25%;
            height: 400px;
            border: 1px solid #2B2B2B;
            background-color: blue;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .alert-level {
            color: white;
            font-size: 100px;
        }
        
        .main-header {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
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


        .footer {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            color: whitesmoke;
            height: 25px; 
            font-family: 'Inter', sans-serif;
            font-weight: 200;
            font-size: 13px;
        }

        .footer-logo {
            width: 20px;
            height: auto;
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

        #live-date-time {
            display: flex;
            flex-direction: column;
            font: 10px;
            border-left: 1px solid white;
            padding-left: 10px;
            border-right: 1px solid white;
            padding-right: 10px;
        }

        /* 3D Smooth Flip Animation */
@keyframes flipLogo {
    0%   { transform: rotateY(0deg); }
    50%  { transform: rotateY(180deg); }
    100% { transform: rotateY(360deg); }
}

/* Required so animation does NOT freeze */
#dzmmLogo {
    animation: flipLogo 2.5s infinite linear;
    backface-visibility: hidden;
    transform-style: preserve-3d;
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

            <div id="live-date-time">
            <div id="liveDate" style="font-size:20px; color:#FFA500; text-shadow:0 0 8px #ff8c00;">--</div>
            <div id="liveTime" style="font-size:20px; font-weight:bold; color:#FFA500; text-shadow:0 0 10px #ff8c00;">--</div>
            </div>

            
        </div>

        <div class="main-container">
            <div class="card1">
                
                <h4 class="windy">MIMAROPA Real-Time Weather Situation</h4>

                 <div class="card1-container">
                        <!-- Weather Conditions Panel -->
                        <div class="card">
                            <div id="weatherBox">
                            <p style="color:#777;">Loading weather data...</p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- <div class="card2"> 
                <h4 class="windy">Windy Weather Map (Rain & Thunder)</h4>
                    {{-- windy -- }}
                <div class="windy-map" id="windyMapContainer">
                    <iframe
                        id="windyMapFrame"
                        src="https://embed.windy.com/embed2.html?lat=13.0&lon=122.0&zoom=5&level=surface&overlay=rain&product=ecmwf&menu=&message=true&marker=&calendar=&pressure=&type=map&location=coordinates&detail=&metricWind=knots&metricTemp=c"
                        frameborder="0"
                        width="100%"
                        height="100%">
                    </iframe>
                </div>
            </div>  --}}

<div class="card2">
    <h4 class="windy">Ventusky Weather Map (Satellite-Like Clouds)</h4>

    <div class="windy-map" id="ventuskyContainer" style="position: relative; width:100%; height:370px;">
        <iframe
            id="ventuskyFrame"
            src="https://embed.ventusky.com/?p=10.7;122.9;3&l=radar" 
            frameborder="0"
            style="width:100%; height:100%; border:0;">
        </iframe>
    </div>
</div>

<script>
function resizeVentusky() {
    const card = document.getElementById("ventuskyContainer");
    const frame = document.getElementById("ventuskyFrame");

    frame.style.width = card.clientWidth + "px";
    frame.style.height = card.clientHeight + "px";
}

window.addEventListener("load", resizeVentusky);
window.addEventListener("resize", resizeVentusky);

setTimeout(resizeVentusky, 800);
</script>



            <div class="card2">
                    <h4 class="windy">Windy Weather Map (Wind)</h4>
                    {{-- windy --}}
                <div class="windy-map" id="windyMapContainer">
                    <iframe
                        id="windyMapFrame"
                        src="https://embed.windy.com/embed2.html?lat=13.0&lon=121.0&zoom=4&level=surface&overlay=wind&product=ecmwf&tcinfo=1&menu=&message=true&marker=&calendar=&pressure=&type=map&location=coordinates&detail=&metricWind=knots&metricTemp=c"
                        frameborder="0"
                        width="100%"
                        height="100%">
                    </iframe>
                </div>
            </div>  
        </div>

        
        <div class="secondary-container">
            <div class="secondary-card2">
                <h4 class="windy" style="color:rgb(215, 215, 215)">Real-Time Rainfall Situation</h4>
                {{-- Alarm sound --}}
                <audio id="rainAlertSound" src="{{ asset('sounds/siren.mp3') }}" preload="auto"></audio>
                <div id="rainMunicipalities"></div>
            </div>

            <div class="secondary-card2" style="height:400px; overflow-y:auto;">
                <h4 class="windy" style="color:rgb(215, 215, 215)">MIMAROPA Heat Index Monitoring</h4>
                <div id="heatIndexList" style="margin-top:10px;"></div>
            </div>

<div class="secondary-card1" 
     style="display:flex; flex-direction:column; align-items:center;">

    <h4 class="windy" style="color: whitesmoke">DZMM TeleRadyo News (Live)</h4>

    <div id="dzmmWrapper" 
         style="width:100%; height:500px; border-radius:5px; overflow:hidden; position:relative;">

        <!-- YOUTUBE LIVE STREAM -->
        <iframe 
            id="dzmmFrame"
            width="100%" 
            height="100%"
            src="https://www.youtube.com/embed/live_stream?channel=UCXIgfGZhI3ZtF8BrCoHcGYA&autoplay=1"
            frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
            style="position:absolute; top:0; left:0; display:none;">
        </iframe>

        <!-- STANDBY SCREEN -->
        <div id="dzmmStandby"
             style="width:100%; height:100%; display:flex; flex-direction:column; justify-content:center; align-items:center;">
            
            <!-- FLIPPING LOGO -->
            <img id="dzmmLogo" src="{{ asset('images/Radyo_Patrol_logo.svg') }}" 
                 style="width:250px; height:auto;">

            <!-- NOTE TEXT -->
            <p style="color:#dedede; margin-top:5px; font-size:10px; text-align:center;">
                The live video will start once the broadcast begins.
            </p>
        </div>
    </div>
</div>

<script>
function checkDZMM() {
    const frame = document.getElementById("dzmmFrame");
    const standby = document.getElementById("dzmmStandby");

    // Guarantee standby if iframe failed / unavailable
    const frameURL = frame.src.toLowerCase();

    // Detect YouTube unavailable content
    if (
        frameURL.includes("unavailable") ||
        frameURL.includes("error") ||
        frameURL.includes("invalid") ||
        frameURL.trim() === ""
    ) {
        frame.style.display = "none";
        standby.style.display = "flex";
        return;
    }

    // Try safer detection – whether YouTube actually loads video
    let trulyLive = false;

    try {
        // If contentWindow is blocked but URL is correct, assume NOT LIVE
        const w = frame.contentWindow;
        if (w && w.length > 0) {
            trulyLive = true;
        }
    } catch (err) {
        // iframe still not ready → treat as NOT LIVE
        trulyLive = false;
    }

    // FINAL DECISION
    if (trulyLive) {
        standby.style.display = "none";
        frame.style.display = "block";
    } else {
        standby.style.display = "flex";
        frame.style.display = "none";
    }
}

// Re-check every 6 seconds
setInterval(checkDZMM, 6000);

// First check 2 seconds after load
setTimeout(checkDZMM, 2000);
</script>




         <div class="secondary-card-alert" >
                <h4 class="windy" style="color: rgb(215, 215, 215">RDRRMC MIMAROPA Alert Status</h4>
                <h1 class="alert-level" style="margin: auto ;">BLUE</h1>
            </div>
        </div>  

        
        <div class="footer">
            <img src="{{asset ('images/logo.png')}}" alt="logo" class="footer-logo">
            <p class="p-footer">Designed and Developed by ICTU MIMAROPA, Office of Civil Defense MIMAROPA © 2025</p>
        </div>

            </div>



     

   
    </div> {{-- end of dashboard --}}
    

</div> 

{{-- windy-map --}}
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

{{-- Real Time Weather Condition --}}
<script>
const apiKey = "2348d8b4d12fe196f2a2a15310f0a7da";  

const provinces = [
    { api: "Boac", label: "Marinduque Province" },
    { api: "Calapan", label: "Oriental Mindoro Province" },
    { api: "Mamburao", label: "Occidental Mindoro Province" },
    { api: "Romblon", label: "Romblon Province" },
    { api: "Puerto Princesa", label: "Palawan Province" }
];

const municipalities = {
    "Marinduque Province": ["Boac","Gasan","Mogpog","Santa Cruz","Torrijos","Buenavista"],
    "Oriental Mindoro Province": ["Calapan","Baco","Naujan","Victoria","Socorro","Pola","Puerto Galera","San Teodoro","Bansud","Gloria","Pinamalayan","Roxas","Bulalacao"],
    "Occidental Mindoro Province": ["Mamburao","San Jose","Rizal","Calintaan","Sablayan","Santa Cruz","Abra de Ilog","Looc","Lubang"],
    "Romblon Province": ["Romblon","Odiongan","Cajidiocan","Magdiwang","San Fernando","San Agustin","Santa Maria","Corcuera","Banton","Concepcion","Ferrol","Alcantara","Looc"],
    "Palawan Province": ["Puerto Princesa","Aborlan","Narra","Quezon","Rizal","Brooke's Point","Bataraza","Sofronio Espanola","Roxas","San Vicente","Taytay","El Nido","Dumaran","Araceli","Kawayan","Linapacan","Cuyo","Agutaya","Magsaysay","Kalayaan","Balabac","Coron","Busuanga","Culion"]
};

function get3DIcon(condition) {
    const text = condition.toLowerCase();

    if (text.includes("thunder")) return "/images/weather/storm.png";
    if (text.includes("heavy rain")) return "/images/weather/rain-heavy.png";
    if (text.includes("moderate rain")) return "/images/weather/rain.png";
    if (text.includes("light rain")) return "/images/weather/rain-light.png";
    if (text.includes("rain")) return "/images/weather/rain.png";
    if (text.includes("overcast")) return "/images/weather/overcast.png";
    if (text.includes("broken")) return "/images/weather/broken.png";
    if (text.includes("few") || text.includes("scattered")) return "/images/weather/partly.png";
    if (text.includes("cloud")) return "/images/weather/cloudy.png";
    if (text.includes("clear")) return "/images/weather/sun.png";

    return "/images/weather/unknown.png";
}

async function loadWeather(city) {
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${city},PH&appid=${apiKey}&units=metric`;
    const res = await fetch(url);
    return await res.json();
}

// Assign numeric severity to conditions
function getWeatherRank(condition) {
    const text = condition.toLowerCase();

    if (text.includes("thunder")) return 1;
    if (text.includes("heavy rain")) return 2;
    if (text.includes("moderate rain")) return 3;
    if (text.includes("light rain")) return 4;
    if (text.includes("overcast")) return 5;
    if (text.includes("broken")) return 6;
    if (text.includes("few") || text.includes("scattered")) return 7;
    if (text.includes("cloud")) return 8;
    if (text.includes("clear")) return 9;

    return 10; // unknown
}

async function loadWeatherForProvinces() {
    const box = document.getElementById("weatherBox");
    box.innerHTML = "";

    for (const p of provinces) {
        const muniList = municipalities[p.label];

        let combinedCondition = "";
        let combinedIcon = "";
        let totalRank = 999; // lowest rank = strongest weather

        // check all municipalities for combined weather
        for (const muni of muniList) {
            const data = await loadWeather(muni);
            if (data.cod == 200) {
                const cond = data.weather[0].description;
                const rank = getWeatherRank(cond);

                if (rank < totalRank) {
                    totalRank = rank;
                    combinedCondition = cond;
                    combinedIcon = get3DIcon(cond);
                }
            }
        }

        // fallback values
        if (!combinedCondition) {
            combinedCondition = "Unavailable";
            combinedIcon = "/images/weather/unknown.png";
        }

        const provinceHTML = `
            <div class="province-item" 
                style="padding:10px;border-bottom:1px solid #555;display:flex;align-items:center;cursor:pointer;"
                onclick="toggleMunicipalities('${p.label}')">

                <img src="${combinedIcon}" style="width:40px;height:40px;">
                <div style="margin-left:10px;">
                    <strong style="color:white;">${p.label}</strong><br>
                    <span style="color:#ccc;font-size:0.9rem;">
                        ${combinedCondition}
                    </span>
                </div>
            </div>

            <div id="${p.label}-muni" style="display:none; margin-left:20px;"></div>
        `;

        box.innerHTML += provinceHTML;
    }
}

async function toggleMunicipalities(provinceName) {
    const container = document.getElementById(`${provinceName}-muni`);
    if (container.style.display === "block") {
        container.style.display = "none";
        return;
    }

    container.style.display = "block";
    container.innerHTML = "<p style='color:#888;'>Loading...</p>";

    const muniList = municipalities[provinceName];
    let html = "";

    for (const muni of muniList) {
        const data = await loadWeather(muni);

        if (data.cod == 200) {
            const temp = data.main.temp.toFixed(1);
            const cond = data.weather[0].description;
            const icon = get3DIcon(cond);

            html += `
                <div style="padding:8px 0; border-bottom:1px solid #333; display:flex; align-items:center;">
                    <img src="${icon}" style="width:28px;height:28px;">
                    <div style="margin-left:8px;">
                        <strong style="color:#FFA500;">${muni}</strong><br>
                        <span style="color:#bbb;font-size:0.85rem;">
                            ${temp}°C - ${cond}
                        </span>
                    </div>
                </div>
            `;
        } else {
            html += `
                <div style="padding:8px; color:#FFA500;">
                    ${muni} — Weather Unavailable
                </div>
            `;
        }
    }

    container.innerHTML = html;
}

loadWeatherForProvinces();
setInterval(loadWeatherForProvinces, 600000);
</script>

{{-- Real Time Clock and Date --}}
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

{{-- Real-Time Heat Index --}}
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

    const container = document.getElementById("heatIndexList");
    container.innerHTML = ""; // clear old content

    // -----------------------------
    // CORRECT HEAT INDEX FUNCTION
    // -----------------------------
    function computeHeatIndex(T, RH) {
        // Convert Celsius → Fahrenheit
        let Tf = (T * 9/5) + 32;

        // Official NWS Rothfusz Regression (°F)
        let HI_F =
            -42.379 +
            2.04901523 * Tf +
            10.14333127 * RH -
            0.22475541 * Tf * RH -
            0.00683783 * Tf * Tf -
            0.05481717 * RH * RH +
            0.00122874 * Tf * Tf * RH +
            0.00085282 * Tf * RH * RH -
            0.00000199 * Tf * Tf * RH * RH;

        // Convert back °F → °C
        let HI_C = (HI_F - 32) * 5/9;

        return HI_C;
    }

    // -----------------------------
    // LOOP FOR EACH PROVINCE
    // -----------------------------
    for (const p of provinces) {
        try {
            const url = `https://api.openweathermap.org/data/2.5/weather?q=${p.api},PH&appid=${apiKey}&units=metric`;
            const res = await fetch(url);
            const data = await res.json();

            const T = data.main.temp;
            const RH = data.main.humidity;

            const HI = computeHeatIndex(T, RH);

            // UI card output
            const item = document.createElement("div");
            item.style.color = "white";
            item.style.fontSize = "14px";
            item.style.margin = "6px 0";
            item.style.padding = "6px";
            item.style.borderBottom = "1px solid rgba(255,255,255,0.1)";

            item.innerHTML = `
                <strong>${p.label}</strong><br>
                Heat Index: <span style="color:#FFA500;">${HI.toFixed(1)} °C</span><br>
                Temp: ${T.toFixed(1)} °C &nbsp;&nbsp; | &nbsp;&nbsp; Humidity: ${RH}% 
            `;

            container.appendChild(item);

        } catch (err) {
            const item = document.createElement("div");
            item.style.color = "white";
            item.style.fontSize = "14px";
            item.innerHTML = `<strong>${p.label}</strong> — Data unavailable`;
            container.appendChild(item);
        }
    }
}

// INITIAL LOAD + AUTO REFRESH EVERY 10 MINS
loadHeatIndex();
setInterval(loadHeatIndex, 600000);
</script>


{{-- News API ##########################################################################--}} 
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


{{-- 5 mins refresh rate --}}
<script>
    setInterval(() => {
    location.reload(true); // full page reload (same as CTRL+R)
}, 300000); // 10,000 ms = 10 seconds -> 300,000 5 mins
</script>


{{-- Real time rain ########################################################################## --}}
<script>
async function loadRainMunicipalities() {
    const container = document.getElementById("rainMunicipalities");
    const alertSound = document.getElementById("rainAlertSound");

    container.innerHTML = "<p style='color:#999;'>Loading...</p>";

    let output = "";
    let heavyRainDetected = false;
    let thunderDetected = false; // ⚡ detect thunderstorm

    for (const province in municipalities) {
        const muniList = municipalities[province];

        for (const muni of muniList) {
            try {
                const url = `https://api.openweathermap.org/data/2.5/weather?q=${muni},PH&appid=${apiKey}&units=metric`;
                const res = await fetch(url);
                const data = await res.json();

                if (data.cod == 200) {
                    const cond = data.weather[0].description.toLowerCase();
                    const temp = data.main.temp.toFixed(1);

                    // ⚡ Detect thunderstorm
                    if (cond.includes("thunder") || cond.includes("storm")) {
                        thunderDetected = true;
                    }

                    // 🔔 Detect heavy rain
                    if (cond.includes("heavy rain")) {
                        heavyRainDetected = true;
                    }

                    // 🟦 Filter for rain OR thunderstorm
                    if (
                        cond.includes("light rain") ||
                        cond.includes("moderate rain") ||
                        cond.includes("heavy rain") ||
                        cond.includes("rain") ||
                        cond.includes("thunder") ||
                        cond.includes("storm")
                    ) {
                        output += `
                            <div style="padding:6px 0; border-bottom:1px solid #333;">
                                <strong style="color:#FFA500;">${muni}</strong>
                                <span style="color:#6fa8dc;"> (${province.replace(" Province","")})</span>
                                <br>
                                <span style="color:#ccc; font-size:0.85rem;">
                                    ${temp}°C — ${cond}
                                </span>
                            </div>
                        `;
                    }
                }
            } catch (err) {}
        }
    }

    // 🔊 Play siren when HEAVY RAIN or THUNDER detected
    if (heavyRainDetected || thunderDetected) {
        alertSound.currentTime = 0;
        alertSound.play().catch(()=>{});
    }

    // 🟦 Display result
    if (output === "") {
        container.innerHTML = `<p style="color:#888;">No municipalities experiencing rain or thunderstorm at the moment.</p>`;
    } else {
        container.innerHTML = output;
    }
}

loadRainMunicipalities();
setInterval(loadRainMunicipalities, 600000);
</script>



</body>
</html>