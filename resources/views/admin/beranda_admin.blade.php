<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>MediRent – Dashboard</title>
<link rel="icon" type="image/png" href="css/asset/icn.jpg">
<link rel="shortcut icon" href="css/asset/icn.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="css/asset/icn.jpg">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body {
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
    background: #9db7e0;

    /* ANTI SCROLL SAMPING */
    overflow-x: hidden;
}

/* ======================
   NAVBAR (SAMA PERSIS)
====================== */
header {
    display: flex;
    align-items: center;
    background: white;
    padding: 10px 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.08);
    box-sizing: border-box;
    width: 100%;
}

.logo {
    display: flex;
    align-items: center;
    font-size: 22px;
    font-weight: 600;
    color: #1a73e8;

    /* GANTI 520px → AUTO (TAMPILAN SAMA, TIDAK OVERFLOW) */
    margin-right: auto;
}

.logo img {
    width: 38px;
    height: 38px;
    margin-right: 8px;
}

nav {
    display: flex;
    align-items: center;
    gap: 42px;
    flex-wrap: wrap; /* Biar tidak melebar keluar */
}

nav a {
    text-decoration: none;
    color: #6d7a8a;
    font-weight: 500;
    font-size: 16px;
    transition: 0.2s;
}

nav a:hover {
    color: #1a73e8;
}

nav a.active {
    color: #1a73e8;
    font-weight: 600;
}

/* ======================
   CARDS
====================== */
.cards {
    display: flex;
    gap: 22px;
    width: 93%;
    margin: 40px auto;
    box-sizing: border-box;
}

.card {
    flex: 1;
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.07);
    box-sizing: border-box;
}

.card h3 {
    font-size: 22px;
    margin-bottom: 12px;
}

.card h2 {
    font-size: 28px;
    margin: 0 0 4px;
}

.sub {
    font-size: 14px;
    color: #6f7b85;
}

/* ======================
   CONTENT ROW
====================== */
.row {
    display: flex;
    width: 93%;
    gap: 22px;
    margin: 10px auto 50px auto;
    box-sizing: border-box;
}

.box {
    flex: 1;
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.07);
    box-sizing: border-box;
}

.box h3 {
    margin-bottom: 6px;
}

canvas {
    margin-top: 15px;
}

/* Legend */
.legend {
    margin-top: 15px;
}
.legend-item {
    display: flex;
    align-items: center;
    margin-bottom: 6px;
}
.legend-color {
    width: 16px;
    height: 16px;
    border-radius: 4px;
    margin-right: 10px;
}

/* Chart sizes */
#barChart {
    max-width: 340px;
    max-height: 220px;
}

#pieChart {
    max-width: 180px;
    max-height: 180px;
    margin: auto;
    display: block;
}

</style>
</head>
<body>

<!-- ======================
     NAVBAR
====================== -->
<header>
    <div class="logo">
        <img src="css/asset/logo.jpg">
        MediRent
    </div>

    <nav>
        <a href="/admin.beranda_admin">Beranda</a>
        <a href="/admin.kelola_alat">Kelola Alat</a>
        <a href="/admin.kelola_transaksi">Kelola Transaksi</a>
        <a href="/admin.kelola_pengguna">Kelola Pengguna</a>
        <a href="/admin.profil_admin">Profil</a>
        <a href="/admin.laporan">Laporan</a>
    </nav>
</header>

<!-- ======================
     TOP CARDS
====================== -->
<div class="cards">

    <div class="card">
        <h3>Pendapatan Bulan Ini</h3>
        <h2>Rp 3.365.000</h2>
    </div>

    <div class="card">
        <h3>Total Transaksi</h3>
        <h2>128 Transaksi</h2>
        <div class="sub">12 menunggu konfirmasi</div>
    </div>

    <div class="card">
        <h3>Alat Tersedia</h3>
        <h2>445 unit</h2>
        <div class="sub">5 sedang disewa</div>
    </div>

</div>

<!-- ======================
     CHART ROW
====================== -->
<div class="row">

    <!-- BAR CHART -->
    <div class="box">
        <h3>Activitas</h3>
        <div class="sub">Jumlah penyewa tiap minggu selama bulan ini</div>
        <canvas id="barChart"></canvas>
    </div>

    <!-- PIE CHART -->
    <div class="box">
        <h3>Alat Paling Sering Disewa</h3>
        <canvas id="pieChart"></canvas>

        <div class="legend">
            <div class="legend-item">
                <div class="legend-color" style="background:#00ff40"></div> Ambulance
            </div>
            <div class="legend-item">
                <div class="legend-color" style="background:#2b7a1f"></div> Tensi
            </div>
            <div class="legend-item">
                <div class="legend-color" style="background:#a6ff87"></div> Kursi Roda
            </div>
            <div class="legend-item">
                <div class="legend-color" style="background:#4caf50"></div> Nebulizer
            </div>
        </div>
    </div>

</div>



<!-- ======================
     CHART.JS SETUP
====================== -->
<script>
    // Bar Chart
    const barCtx = document.getElementById("barChart");

    new Chart(barCtx, {
        type: "bar",
        data: {
            labels: ["M1", "M2", "M3", "M4", "M5"],
            datasets: [{
                data: [50, 23, 47, 33, 35],
                backgroundColor: ["#00b34c", "#ff4b2b", "#a24bff", "#f5c022", "#1094ff"]
            }]
        },
        options: {
            plugins: { legend: { display: false }},
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Pie Chart
    const pieCtx = document.getElementById("pieChart");

    new Chart(pieCtx, {
        type: "pie",
        data: {
            labels: ["Ambulance", "Tensi", "Kursi Roda", "Nebulizer"],
            datasets: [{
                data: [40, 30, 15, 15],
                backgroundColor: ["#00ff40", "#2b7a1f", "#a6ff87", "#4caf50"]
            }]
        },
        options: {
            plugins: { legend: { display: false }}
        }
    });
</script>

</body>
</html>
