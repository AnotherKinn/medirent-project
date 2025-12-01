<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang MediRent - MediRent</title>
    <link rel="shortcut icon" href="{{ asset('css/asset/icn.jpg') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('css/asset/icn.jpg') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('css/asset/icn.jpg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Navbar Styles */
        header {
            display: flex;
            align-items: center;
            background: white;
            padding: 10px 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1000;
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

        .main-content {
            margin-top: 80px;
            padding: 20px;
        }

        .page-title {
            text-align: center;
            font-size: 28px;
            font-weight: 700;
            color: white;
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .about-section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .section-title {
            font-size: 24px;
            font-weight: 700;
            color: #1a73e8;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e3f2fd;
        }

        .section-content {
            font-size: 16px;
            line-height: 1.8;
            color: #333;
            margin-bottom: 20px;
        }

        .features-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            transition: transform 0.2s;
        }

        .feature-item:hover {
            transform: translateY(-2px);
            background: #e3f2fd;
        }

        .feature-icon {
            font-size: 24px;
            color: #1a73e8;
            min-width: 30px;
        }

        .feature-text h4 {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .feature-text p {
            font-size: 15px;
            color: #666;
            margin: 0;
        }

        .steps-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .step-card {
            background: white;
            border: 2px solid #e3f2fd;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s;
        }

        .step-card:hover {
            transform: translateY(-5px);
            border-color: #1a73e8;
            box-shadow: 0 8px 20px rgba(26, 115, 232, 0.15);
        }

        .step-number {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 700;
            margin: 0 auto 15px;
        }

        .step-title {
            font-size: 18px;
            font-weight: 600;
            color: #1a73e8;
            margin-bottom: 10px;
        }

        .step-description {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }

        .mission-vision {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-top: 20px;
        }

        .mission-card, .vision-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .mission-card {
            border-left: 4px solid #1a73e8;
        }

        .vision-card {
            border-left: 4px solid #4caf50;
        }

        .card-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .card-content {
            font-size: 15px;
            color: #666;
            line-height: 1.7;
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                padding: 10px;
            }

            .logo {
                margin-bottom: 10px;
                margin-right: 0;
            }

            nav {
                width: 100%;
                justify-content: center;
                gap: 10px;
            }

            .main-content {
                margin-top: 120px;
            }

            .mission-vision {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>
<body>
    <!-- Navbar -->
    <header>
        <div class="logo">
            <img src="{{ asset('css/asset/logo.jpg') }}" alt="Logo">
            <span>MediRent</span>
        </div>

        <nav>
            <a href="{{ route('dashboard.user') }}">Beranda</a>
            <a href="{{ route('user.about') }}">Tentang</a>
            <a href="{{ route('user.daftar-alat.index') }}">Daftar Alat</a>
            <a href="{{ route('user.booking.index') }}">Booking</a>
            <a href="{{ route('user.transaksi.index') }}">Transaksi</a>
            <a href="{{ route('user.profile.index') }}">Profil</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="page-title">
            Tentang MediRent
        </div>

        <!-- What is MediRent Section -->
        <div class="about-section">
            <h2 class="section-title">Apa itu MediRent?</h2>
            <div class="section-content">
                <p>MediRent adalah platform digital yang menyediakan layanan sewa alat bantu kesehatan secara online untuk membantu masyarakat memenuhi kebutuhan perawatan kesehatan tanpa harus membeli alat secara permanen. Kami hadir sebagai solusi praktis, ekonomis, dan terjangkau untuk kebutuhan alat kesehatan jangka pendek maupun jangka panjang.</p>
                <p>Dengan MediRent, Anda dapat dengan mudah menyewa berbagai jenis alat kesehatan seperti tensi meter, nebulizer, kursi roda, alat bantu jalan, dan berbagai peralatan medis lainnya yang telah terverifikasi kualitas dan kebersihannya.</p>
            </div>
        </div>

        <!-- Mission and Vision -->
        <div class="about-section">
            <h2 class="section-title">Misi & Visi</h2>
            <div class="mission-vision">
                <div class="mission-card">
                    <h3 class="card-title">Misi Kami</h3>
                    <div class="card-content">
                        <p>Memberikan akses mudah dan terjangkau terhadap alat bantu kesehatan berkualitas tinggi untuk mendukung proses pemulihan dan perawatan kesehatan masyarakat secara optimal.</p>
                        <p>Menjamin kebersihan, sterilisasi, dan kelayakan fungsi semua alat yang disewakan sesuai dengan standar kesehatan yang berlaku.</p>
                    </div>
                </div>
                <div class="vision-card">
                    <h3 class="card-title">Visi Kami</h3>
                    <div class="card-content">
                        <p>Menjadi platform sewa alat kesehatan terpercaya nomor satu di Indonesia yang membantu masyarakat dalam mengatasi tantangan kesehatan sehari-hari.</p>
                        <p>Mewujudkan kesehatan yang inklusif dan terjangkau bagi seluruh lapisan masyarakat tanpa batasan ekonomi.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why Choose Us -->
        <div class="about-section">
            <h2 class="section-title">Mengapa Memilih MediRent?</h2>
            <ul class="features-list">
                <li class="feature-item">
                    <div class="feature-icon">
                        <i class="fa-solid fa-shield"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Alat Terstandarisasi</h4>
                        <p>Semua alat kesehatan kami telah melalui proses sterilisasi dan pemeriksaan kualitas secara berkala oleh tenaga medis profesional.</p>
                    </div>
                </li>
                <li class="feature-item">
                    <div class="feature-icon">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Delivery Cepat</h4>
                        <p>Layanan pengiriman dan pengambilan alat yang cepat dan tepat waktu, dengan opsi delivery ke rumah atau pickup di lokasi kami.</p>
                    </div>
                </li>
                <li class="feature-item">
                    <div class="feature-icon">
                        <i class="fa-solid fa-dollar-sign"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Harga Terjangkau</h4>
                        <p>Tarif sewa yang sangat kompetitif dengan berbagai pilihan durasi sewa yang fleksibel sesuai kebutuhan Anda.</p>
                    </div>
                </li>
                <li class="feature-item">
                    <div class="feature-icon">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Support 24/7</h4>
                        <p>Tim customer service kami siap membantu Anda kapan saja dengan layanan support 24 jam, 7 hari seminggu.</p>
                    </div>
                </li>
            </ul>
        </div>

        <!-- How to Book -->
        <div class="about-section">
            <h2 class="section-title">Panduan Booking Alat</h2>
            <p class="section-content">Berikut adalah langkah-langkah mudah untuk melakukan booking alat kesehatan di MediRent:</p>

            <div class="steps-container">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Pilih Alat</h3>
                    <p class="step-description">Jelajahi katalog alat kesehatan kami dan pilih alat yang sesuai dengan kebutuhan Anda.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Atur Durasi</h3>
                    <p class="step-description">Tentukan durasi sewa yang diinginkan, mulai dari 3 hari, 1 minggu, hingga 1 bulan.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Pilih Metode</h3>
                    <p class="step-description">Pilih metode pengambilan: delivery ke rumah Anda atau pickup langsung di lokasi kami.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">4</div>
                    <h3 class="step-title">Lakukan Pembayaran</h3>
                    <p class="step-description">Selesaikan proses pembayaran melalui transfer bank atau pembayaran di tempat (COD).</p>
                </div>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="about-section">
            <h2 class="section-title">Hubungi Kami</h2>
            <div class="section-content">
                <p>Jika Anda memiliki pertanyaan, saran, atau membutuhkan bantuan, jangan ragu untuk menghubungi tim kami melalui:</p>
                <ul class="features-list">
                    <li class="feature-item">
                        <div class="feature-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Telepon/WhatsApp</h4>
                            <p>+62 856-2356-8976</p>
                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="feature-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Email</h4>
                            <p>MediRent.support@gmail.com</p>
                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="feature-icon">
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Instagram</h4>
                            <p>@MediRent_id</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
