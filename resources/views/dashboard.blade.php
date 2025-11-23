<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OCD CLMS - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Momo+Signature&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>


<style>

 .dropdown {
    position: relative;
}

.dropdown-toggle::after {
    content: " ▼";
    font-size: 0.6em;
}

.dropdown-menu {
    display: none;
    flex-direction: column;
    background-color: #0D5EA6;
    padding-left: 0.5rem; /* Reduced left padding */
}

.dropdown:hover .dropdown-menu {
    display: flex;
}

.dropdown-item {
    padding: 0.15rem 0; /* Reduced vertical spacing */
    color: #fff; /* Changed to white for contrast with dark background */
    text-decoration: none;
    font-size: 0.9rem; /* Optional: slightly smaller font */
}

.dropdown-item:hover {
    text-decoration: underline;
}

    
    body {
        margin: 0;
        font-family: "Inter", sans-serif;
        background-color: #EFEFEF;
    }

    /* Sidebar Styling */
    .sidebar {
        width: 210px;
        background-color: #0D5EA6;
        color: #EFEFEF;
        position: fixed;
        top: 0;
        bottom: 0;
        padding: 1rem 0;
        margin: 0;
        transition: width 0.3s;
        border-bottom-right-radius: 20px; 
        border-top-right-radius: 20px; 
    }

    .sidebar:hover {
        width: 220px;
    }

    .sidebar a {
        display: block;
        text-decoration: none;
        margin: 1rem 0;
        font-size: 0.85rem;
        padding: 0.8rem 1rem;
        transition: background-color 0.2s, color 0.2s;
    }

    .sidebar a:hover {
        background-color: #f4f6f9;
        color: #112B3C;
    }

    .sidebar a.active {
        background-color: #FF8C00;
        color: rgb(226, 225, 225);
    }

    .sidebar h2 {
        text-align: center;
        font-size: 1.2rem;
        margin-bottom: 2rem;
    }

    .sidebar img.logo {
        width: 100px;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .topbar {
        margin-left: 200px;
        height: 60px;
        background-color: white;
        border-bottom: 1px solid #ccc;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1.5rem;
        font-size: 0.9rem;
    }

    .main {
        margin-left: 200px;
        padding: 2rem;
    }

    .dashboard {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        align-items: stretch;
    }

    .card, .gender-panel {
        border: 0.2px solid #c2d2ff;
        background-color: white;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        height: 270px; /* Unified panel height */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-sizing: border-box;
    }

    .card:hover, .gender-panel:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .card h3, .gender-panel h3 {
        font-size: 1.2rem; /* Reduced font size for titles */
        margin-bottom: 1rem;
        color: #333;
    }

    .card p, .gender-panel p {
        font-size: 0.9rem; /* Reduced font size for panel text */
        color: #555;
    }

    .gender-panel canvas {
        max-width: 100%;
        height: 140px !important;
        margin: 0 auto;
    }

    #clock {
        font-size: 1.3rem; /* Slightly reduced font size for clock */
        font-weight: bold;
        color: #0D5EA6;
    }

    #dateDisplay {
        font-size: 0.9rem; /* Reduced font size for date */
        color: #888;
        margin-bottom: 1rem;
    }

    .footer {
        margin-left: 200px;
        text-align: center;
        padding: 1rem;
        font-size: 0.8rem;
        color: #555;
    }

    @media (max-width: 768px) {
        .sidebar, .topbar, .main, .footer {
            margin-left: 0;
        }
    }

    .card {
    background-color: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(124, 66, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    width: 100%; /* This will make the card take the full width */
    box-sizing: border-box; /* Ensures padding doesn't affect the width */
}

.weather-icon-3d {
    width: 50px;
    height: 50px;
    filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));
    transform: translateY(0);
    transition: transform 0.3s ease, filter 0.3s ease;
}

.weather-icon-3d:hover {
    transform: translateY(-6px);
    filter: drop-shadow(0 8px 12px rgba(0,0,0,0.4));
}


</style>

</head>
<body>

    <!-- Sidebar -->
<div class="sidebar">
    <img src="{{ asset('images/logo.png') }}" alt="LTMS Logo" class="logo">

    <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">
        <i class="bi bi-person-circle"></i> Profile
    </a>
        
    <!-- Records Section Dropdown -->
    <div class="dropdown">
        <a href="#" class="dropdown-toggle">
            <i class="bi bi-file-earmark-text"></i> Comm Records
        </a>
        <div class="dropdown-menu">
            <a href="{{ route('record.index') }}" class="dropdown-item">Incoming Communication</a>
            <a href="{{ route('outgoing.index')}}" class="dropdown-item">Outgoing Communication</a>
        </div>
    </div>

    <a href="{{ route('trainingdb.index') }}" class="{{ request()->routeIs('trainingdb.index') ? 'active' : '' }}">
        <i class="bi bi-inbox"></i> Training IMS
    </a>

     <!--<a href="{{ route('developer.index') }}" class="{{ request()->routeIs('developer.index') ? 'active' : '' }}" style="color: #5a5a5a">
         <i class="bi bi-calendar"></i> Calendar of Activities
    </a> -->

    <a href="/radiolog" class="{{ request()->is('radiolog') ? 'active' : '' }}">
        <i class="bi bi-journal-text"></i> Radio Log
    </a>

    <!-- Generated Docs Dropdown -->
    <div class="dropdown">
        <a href="#" class="dropdown-toggle">
            <i class="bi bi-file-earmark-text"></i> Generated Docs
        </a>
        <div class="dropdown-menu">
            <a href="{{route ('risadmin.index')}}" class="dropdown-item">e-RIS</a>
            <a href="{{route ('guest.log')}}" class="dropdown-item">e-Certificate of Appearance</a>
        </div>
    </div>

    <a href="https://192-168-1-10.ocd-mimaropa-nas.direct.quickconnect.to:5001/#/signin"><i class="bi bi-hdd"></i>
</i>
Network Attached Storage (NAS)</a>

    <form method="POST" action="{{ route('logout') }}" style="margin-top: 1rem;">
        @csrf
        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </form>
</div>


    <!-- Topbar -->
    <div class="topbar">
    <div>CLMS <strong>| DASHBOARD</strong></div>
    <div>
        {{ date('l, F j, Y') }} - <span id="liveTime"></span>
    </div>
</div>

<!-- Main Content -->
        <div class="main">
            <div class="dashboard" style="gap: 1rem; display: flex; flex-wrap: wrap;">
        <!-- Welcome Card -->
        <div class="card" style="flex: 1 1 25%; min-width: 200px; display: flex; flex-direction: column;">
            <div style="flex: 1; overflow-y: auto; padding-right: 5px; font-size: 0.75rem;">
                <h3 style="font-weight: bold; font-size: .9rem;">WELCOME, {{ Auth::user()->name }}!</h3>
                <p style="margin-bottom: 0.5rem;">You're successfully logged in! Use the dashboard below to manage communication logs, 
                                                                            track records, view reminders, and access all system features.</p>

                <h5 style="font-weight: bold; font-size: 0.8rem; margin-top: 0.75rem;">Date</h5>
                <div id="dateDisplay"></div>

                <h5 style="font-weight: bold; font-size: 0.8rem; margin-top: 0.5rem;">Time</h5>
                <div id="clock"></div>
            </div>
        </div>
        <!-- Documents for Review Card - Wider and Larger -->
        <div class="card p-3 mb-4" style="flex: 2 1 50%; min-width: 400px; max-height: 500px; overflow-y: auto; ">
             <h3 style="font-weight: bold; font-size: 1rem;">Reminder Notes/Memos</h3>
            @if ($myAssignedRecords->isEmpty())
                <p class="text-muted">No records assigned to you.</p>
            @else
                <ul class="list-group list-group-flush" style="max-height: 400px; overflow-y: auto;">
                                        @foreach ($myAssignedRecords as $record)
                            <li class="list-group-item">
                                {{-- Title now links to the file view --}}
                                <p></p>
                                <a href="{{ route('records.show', $record->id) }}"
                                style="color: #0D5EA6;; font-weight: bold;">
                                    {{ $record->subject_description }}
                                </a><br>

                                {{-- Info --}}
                                <small class="text-muted">
                                    <small>From: {{ $record->from_agency_office }}</small> |
                                    <small>Type: {{ $record->type }}</small>
                                </small><br>

                                {{-- Status link (was View Files) --}}
                                <small>
                                    @if ($record->file_path || $record->file_path1 || $record->file_path2)
                                        <a href="{{ route('record.edit', $record->id) }}" title="View Status">
                            <i class="fas fa-external-link-alt" style="color: #007bff;"></i> Status
                        </a>

                                    @else
                                        <span class="text-muted"><i class="fas fa-paperclip"></i> No Attachments</span>
                                    @endif
                                </small>
                            </li>

                            @if (!$loop->last)
                                <hr style="border: 1px dotted rgb(221, 221, 221); margin: 5px 0;">
                            @endif
                        @endforeach
                </ul>
            @endif
        </div>
        <!-- Weather Conditions Panel -->
        <div class="card" style="flex: 1 1 25%; min-width: 250px; height: 450px; overflow-y: auto;">
            <h3 style="font-weight: bold; font-size: 1rem;">MIMAROPA Weather Conditions</h3>

            <div id="weatherBox">
                <p style="color:#777;">Loading weather data...</p>
            </div>
        </div>
        <!-- Map Search Panel -->
  <div class="card" style="flex: 1 1 50%; min-width: 400px; height: 450px;">
    <h3 style="font-weight: bold; font-size: 1rem;">Search Location & Weather</h3>

    <div style="display:flex; gap:8px; margin-bottom:10px;">
        <input type="text" id="mapSearch" placeholder="Enter location..."
            style="width:30%; padding:8px; border-radius:6px; border:1px solid #ccc;">

            {{-- 
        <button onclick="searchLocation()" 
            style="background:#0D5EA6; color:white; padding:8px; border:none; border-radius:6px; cursor:pointer;">
            Search
        </button> --}}

        <button onclick="showWindy()" 
            style="background:#0D5EA6; color:#eeeeee; padding:8px; border:1px solid rgb(110, 110, 110); border-radius:6px; cursor:pointer;">
            Windy
        </button>

        <button onclick="showOSM()" 
            style="background:#FF8C00; color:white; padding:8px; border:none; border-radius:6px; cursor:pointer;">
            OSM
        </button>
    </div>

    <div id="mapMessage" style="color:rgb(119, 37, 37); font-size:0.85rem; margin-bottom:8px;"></div>

    <div id="mapContainer" style="width:100%; height:300px; border-radius:10px; overflow:hidden;">
        <div id="map" style="width:100%; height:100%; border-radius:10px;"></div>
    </div>
</div>

        <!-- Incoming Communications Overview -->
        <div class="card" style="flex: 1 1 25%; min-width: 200px;">
            <h3 style="font-weight: bold; font-size: 1rem;">Incoming Communications Overview</h3>
        <p style="font-weight: bold; font-size: 0.9rem; color: #030d22;">
            <i class="fas fa-envelope-open-text" style="color: #030d22; margin-right: 6px;"></i>
            Total IComs: {{ $totalIncomingLogs }}
        </p>
            <div class="row">
                <div class="col">
                    <p><span style="color: #007bff; font-weight: bold;">Reports:</span> {{ $typeCounts['Report'] }}</p>
                    <p><span style="color: #007bff; font-weight: bold;">Request:</span> {{ $typeCounts['Request'] }}</p>
                    <p><span style="color: #007bff; font-weight: bold;">Submission:</span> {{ $typeCounts['Submission'] }}</p>
                </div>
                <div class="col">
                    <p><span style="color: #007bff; font-weight: bold;">Invitation:</span> {{ $typeCounts['Invitation'] }}</p>
                    <p><span style="color: #007bff; font-weight: bold;">For Information:</span> {{ $typeCounts['For Information'] }}</p>
                </div>
                <div class="col">
                    <p><span style="color: #007bff; font-weight: bold;">For Compliance:</span> {{ $typeCounts['For Compliance'] }}</p>
                    <p><span style="color: #007bff; font-weight: bold;">Complaint:</span> {{ $typeCounts['Complaint'] }}</p>
                </div>
            </div>
        </div>
        <!-- Gender Distribution Panel -->
        <div class="gender-panel" style="flex: 1 1 25%; min-width: 200px;">
             <h3 style="font-weight: bold; font-size: 0.9rem;">OCD MIMAROPA Employee Gender Distribution</h3>
            <p>Total Employees: 21</p>
            <canvas id="genderChart" width="200" height="200"></canvas>
        </div>
        <!-- Radio Logs Totals Line Chart -->
        <div class="card" style="flex: 1 1 25%; min-width: 200px;">
             <h3 style="font-weight: bold; font-size: 1rem;">Radio Logs Overview</h3>
            <canvas id="radioLogsChart" style="max-height: 200px;"></canvas>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    Designed and Developed by ICTU MIMAROPA, Office of Civil Defense MIMAROPA © 2025
</footer>

{{-- animation --}}
<script>
// Converts weather description to a custom 3D icon
function get3DIcon(condition) {
    condition = condition.toLowerCase();

    if (condition.includes("clear")) {
        return "/images/weather/sun.png";       // ☀️ Sunny
    }
    if (condition.includes("clouds")) {
        return "/images/weather/cloudy.png";    // ☁️ Cloudy
    }
    if (condition.includes("rain")) {
        return "/images/weather/rain.png";      // 🌧 Rainy
    }
    if (condition.includes("thunder")) {
        return "/images/weather/storm.png";     // ⛈ Thunderstorm
    }
    if (condition.includes("mist") || condition.includes("fog")) {
        return "/images/weather/fog.png";         // 🌫 Mist
    }

    return "/images/weather/unknown.png";        // Default icon
}
</script>


{{-- weather api --}}
<script>
const apiKey = "2348d8b4d12fe196f2a2a15310f0a7da";   // ← Replace with your API key

// Province labels + API city lookups
const provinces = [
    { api: "Boac", label: "Marinduque Province" },
    { api: "Calapan", label: "Oriental Mindoro Province" },
    { api: "Mamburao", label: "Occidental Mindoro Province" },
    { api: "Romblon", label: "Romblon Province" },
    { api: "Puerto Princesa", label: "Palawan Province" }
];

// Convert weather description → 3D icon file
function get3DIcon(condition) {
    condition = condition.toLowerCase();

    if (condition.includes("clear")) {
        return "/images/weather/sun.png";     // ☀️ Sunny
    }
    if (condition.includes("cloud")) {
        return "/images/weather/cloudy.png";  // ☁️ Cloudy
    }
    if (condition.includes("rain")) {
        return "/images/weather/rain.png";    // 🌧 Rain
    }
    if (condition.includes("thunder")) {
        return "/images/weather/storm.png";   // ⛈ Storm
    }
    if (condition.includes("mist") || condition.includes("fog")) {
        return "/images/weather/fog.png";     // 🌫 Foggy
    }

    return "/images/weather/unknown.png";      // Default icon
}

async function loadWeatherForProvinces() {
    const weatherBox = document.getElementById("weatherBox");
    weatherBox.innerHTML = ""; // Clear "loading..."

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
                        border-bottom:1px solid #eee;
                        display:flex;
                        align-items:center;
                    ">
                        <img src="${icon3d}" class="weather-icon-3d">
                        <div style="margin-left:10px;">
                            <strong>${item.label}</strong><br>
                            <span style="font-size:0.9rem;">
                                ${temp}°C - ${condition}
                            </span>
                        </div>
                    </div>
                `;
            } else {
                weatherBox.innerHTML += `
                    <div style="padding:10px; border-bottom:1px solid #eee;">
                        <strong>${item.label}</strong><br>
                        <span style="color:red;">Weather unavailable</span>
                    </div>
                `;
            }
        } catch (error) {
            weatherBox.innerHTML += `
                <div style="padding:10px; border-bottom:1px solid #eee;">
                    <strong>${item.label}</strong><br>
                    <span style="color:red;">Error loading weather</span>
                </div>
            `;
        }
    }
}

// Load immediately
loadWeatherForProvinces();

// Auto-refresh every 10 minutes
setInterval(loadWeatherForProvinces, 600000);
</script>



    <!-- Scripts -->
    <script>
        function updateDateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString();
            const dateString = now.toLocaleDateString(undefined, {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            document.getElementById('clock').textContent = timeString;
            document.getElementById('dateDisplay').textContent = dateString;
        }

        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>
{{-- gender --}}
    <script>
        const ctx = document.getElementById('genderChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Male (12)', 'Female (9)'],
                datasets: [{
                    data: [12, 9],
                    backgroundColor: ['#0D5EA6', '#FF8DA1'],
                    borderColor: '#ffffff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#333',
                            font: {
                                size: 14
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let total = context.dataset.data.reduce((a, b) => a + b, 0);
                                let value = context.parsed;
                                let percentage = ((value / total) * 100).toFixed(1) + '%';
                                return `${context.label}: ${value} (${percentage})`;
                            }
                        }
                    }
                }
            }
        });
    </script>
{{-- radio logs --}}
   <script>
    const radioLogsCtx = document.getElementById('radioLogsChart').getContext('2d');

    new Chart(radioLogsCtx, {
        type: 'line',
        data: {
            labels: ['Total Radio Logs', 'Incoming From CO', 'My Coms Log'],
            datasets: [{
                label: 'Radio Logs Count',
                data: [
                    {{ $totalRadioLogs }},
                    {{ $totalIncomingCentral }},
                    {{ $totalMyComsLogs }}
                ],
                borderColor: '#007bff',
                backgroundColor: 'rgba(0, 123, 255, 0.2)',
                fill: true,
                tension: 0.3,
                pointBackgroundColor: '#007bff',
                pointBorderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 12
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        font: {
                            size: 10
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        font: {
                            size: 10
                        }
                    }
                }
            }
        }
    });
</script>

<script>
let currentMap = "OSM"; 
let map;

// INITIALIZE DEFAULT OSM MAP
function initOSM() {
    document.getElementById("mapContainer").innerHTML = `<div id="map" style="width:100%; height:100%;"></div>`;

    map = L.map('map').setView([13.0, 121.0], 6);
        
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap Contributors'
    }).addTo(map);
}

// SHOW WINDY EMBED
function showWindy() {
    currentMap = "WINDY";

    document.getElementById("mapContainer").innerHTML = `
        <iframe width="100%" height="100%"
            src="https://embed.windy.com/embed2.html?lat=13&lon=121&zoom=6&level=surface&overlay=wind"
            frameborder="0" style="border-radius:10px;">
        </iframe>
    `;
}

// RESTORE OSM
function showOSM() {
    currentMap = "OSM";
    initOSM();
}

// SEARCH WITH WEATHER (OSM ONLY)
async function searchLocation() {

    if (currentMap !== "OSM") {
        document.getElementById("mapMessage").innerHTML = "⚠ Switch to OSM to use the search.";
        return;
    }

    const query = document.getElementById("mapSearch").value;

    if (!query) {
        document.getElementById("mapMessage").innerHTML = "⚠ Please enter a location.";
        return;
    }

    document.getElementById("mapMessage").innerHTML = "";

    // NOMINATIM SEARCH
    const url = `https://nominatim.openstreetmap.org/search?format=json&q=${query}`;
    const response = await fetch(url);
    const data = await response.json();

    if (data.length === 0) {
        document.getElementById("mapMessage").innerHTML = "❌ Location not found.";
        return;
    }

    const lat = data[0].lat;
    const lon = data[0].lon;

    map.setView([lat, lon], 13);

    // WEATHER API
    const weatherUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`;
    const weatherRes = await fetch(weatherUrl);
    const weatherData = await weatherRes.json();

    const condition = weatherData.weather[0].description;
    const temp = weatherData.main.temp.toFixed(1);
    const iconPath = get3DIcon(condition);

    // MARKER
    const weatherIcon = L.icon({
        iconUrl: iconPath,
        iconSize: [50, 50],
        iconAnchor: [25, 25]
    });

    L.marker([lat, lon], { icon: weatherIcon })
        .addTo(map)
        .bindPopup(`
            <strong>${query}</strong><br>
            <img src="${iconPath}" style="width:45px;"><br>
            <strong>${temp}°C</strong><br>
            ${condition}
        `)
        .openPopup();
}

// ENTER KEY SUPPORT
document.getElementById("mapSearch").addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        searchLocation();
    }
});

// Initialize default map
initOSM();

// Enable Enter key for searching
document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("mapSearch");

    input.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Avoid page refresh
            searchLocation();
        }
    });
});

</script>



</body>
</html>
