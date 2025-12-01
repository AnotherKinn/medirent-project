<x-app-layout>

    {{-- Font + ChartJS --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            background: #9db7e0;
            overflow-x: hidden;
        }

        .cards {
            display: flex;
            gap: 22px;
            width: 93%;
            margin: 40px auto;
        }

        .card {
            flex: 1;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.07);
        }

        .card h3 {
            font-size: 22px;
            margin-bottom: 12px;
        }

        .card h2 {
            font-size: 28px;
            margin-bottom: 4px;
        }

        .sub {
            font-size: 14px;
            color: #6f7b85;
        }

        .row {
            display: flex;
            width: 93%;
            gap: 22px;
            margin: 10px auto 50px auto;
        }

        .box {
            flex: 1;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.07);
        }

        canvas {
            margin-top: 15px;
        }

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

        #pieChart {
            max-width: 180px;
            max-height: 180px;
            margin: auto;
            display: block;
        }

    </style>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            background: #9db7e0;
            overflow-x: hidden;
        }

        header {
            display: flex;
            align-items: center;
            background: white;
            padding: 10px 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            width: 100%;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 22px;
            font-weight: 600;
            color: #1a73e8;
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
            flex-wrap: wrap;
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

        .cards {
            display: flex;
            gap: 22px;
            width: 93%;
            margin: 40px auto;
        }

        .card {
            flex: 1;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.07);
        }

        .card h3 {
            font-size: 22px;
            margin-bottom: 12px;
        }

        .card h2 {
            font-size: 28px;
            margin-bottom: 4px;
        }

        .sub {
            font-size: 14px;
            color: #6f7b85;
        }

        .row {
            display: flex;
            width: 93%;
            gap: 22px;
            margin: 10px auto 50px auto;
        }

        .box {
            flex: 1;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.07);
        }

        canvas {
            margin-top: 15px;
        }

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

    {{-- ======================
         DASHBOARD CONTENT
    ======================= --}}

    <div class="cards">
        <div class="card">
            <h3>Pendapatan Bulan Ini</h3>
            <h2>Rp {{ number_format($pendapatanBulanIni, 0, ',', '.') }}</h2>
        </div>

        <div class="card">
            <h3>Total Transaksi Sukses</h3>
            <h2>{{ $totalTransaksiSukses }} Transaksi</h2>
        </div>

        <div class="card">
            <h3>Total Alat Tersedia</h3>
            <h2>{{ $totalAlat }} Item</h2>
        </div>
    </div>

    <div class="row">

        {{-- CHART PENYEWA --}}
        <div class="box">
            <h3>Aktivitas</h3>
            <div class="sub">Jumlah penyewa tiap bulan</div>
            <canvas id="barChart"></canvas>
        </div>

        {{-- CHART ALAT PALING DISEWA --}}
        <div class="box">
            <h3>Alat Paling Sering Disewa</h3>

            <canvas id="pieChart"></canvas>

            <div class="legend">
                @foreach ($labelsAlat as $index => $nama)
                <div class="legend-item">
                    <div class="legend-color"
                        style="background: {{ ['#00ff40','#2b7a1f','#a6ff87','#4caf50'][$index] }}"></div>
                    {{ $nama }}
                </div>
                @endforeach
            </div>
        </div>

    </div>


    {{-- ======================
         CHART JS SECTION
    ======================= --}}
    <script>
        // Bar Chart - Penyewa per minggu
        new Chart(document.getElementById("barChart"), {
            type: "line",
            data: {
                labels: @json($labelsPenyewa),
                datasets: [{
                    data: @json($dataPenyewa),
                    backgroundColor: ["#00b34c", "#ff4b2b", "#a24bff", "#f5c022", "#1094ff"]
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Pie Chart - Alat paling disewa
        new Chart(document.getElementById("pieChart"), {
            type: "pie",
            data: {
                labels: @json($labelsAlat),
                datasets: [{
                    data: @json($dataAlat),
                    backgroundColor: ["#00ff40", "#2b7a1f", "#a6ff87", "#4caf50"]
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

    </script>

</x-app-layout>
