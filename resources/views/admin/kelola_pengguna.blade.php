<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna - MediRent</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="css/asset/icn.jpg">
<link rel="shortcut icon" href="css/asset/icn.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="css/asset/icn.jpg">
    <style>
    /* Import Font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

/* Reset */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #9db7e0;
}

/* ===================== NAVBAR ===================== */
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
/* ===================== TABLE CONTAINER ===================== */
.content {
    padding: 0;
}

.table-container {
    max-width: 1100px;
    background: white;
    margin: 60px auto;
    border-radius: 4px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.1);
    overflow: hidden;
}

table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
}

/* Header */
thead th {
    background-color: #f8f9fb;
    color: #333;
    text-align: left;
    padding: 16px 20px;
    font-weight: 600;
    font-size: 15px;
    border-bottom: 2px solid #e5e5e5;
}

/* Body */
tbody tr:hover {
    background-color: #f9fbff;
}

tbody td {
    padding: 16px 20px;
    border-bottom: 1px solid #e5e5e5;
    font-size: 15px;
    color: #333;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Column width */
table th:nth-child(1), table td:nth-child(1) { width: 5%; text-align: center; }
table th:nth-child(2), table td:nth-child(2) { width: 12%; }
table th:nth-child(3), table td:nth-child(3) { width: 15%; }
table th:nth-child(4), table td:nth-child(4) { width: 25%; }
table th:nth-child(5), table td:nth-child(5) { width: 15%; }
table th:nth-child(6), table td:nth-child(6) { width: 13%; text-align: center; }
table th:nth-child(7), table td:nth-child(7) { width: 10%; text-align: center; }

/* ===================== BADGE STATUS ===================== */
.status {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-align: center;
    width: 75px;
}

.aktif {
    background-color: #e5f6e8;
    color: #2ecc71;
    border: 1px solid #d4edda;
}

.nonaktif {
    background-color: #fbe6e7;
    color: #dc3545;
    border: 1px solid #f8d7da;
}

/* ===================== ACTION BUTTONS ===================== */
.actions button {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 16px;
    margin: 0 3px;
    transition: 0.2s;
    padding: 5px;
    border-radius: 4px;
}

.actions button:hover {
    background-color: #f0f2f5;
}

.edit-btn {
    color: #1a73e8;
}

.delete-btn {
    color: #dc3545;
}

    </style>
</head>
<body>

    <header>
        <div class="logo">
        <img src="css/asset/logo.jpg" alt="logo">
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

    <div class="content">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID User</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nomor telepon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2734197700</td>
                        <td>Kirantan</td>
                        <td>kirantan@gmail.com</td>
                        <td>62-882-7755-7678</td>
                        <td><span class="status nonaktif">Nonaktif</span></td>
                        <td class="actions">
                            <button class="edit-btn"><i class="fas fa-pen"></i></button> 
                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2734562990</td>
                        <td>Emel</td>
                        <td>emel@gmail.com</td>
                        <td>62-822-9923-7873</td>
                        <td><span class="status aktif">Aktif</span></td>
                        <td class="actions">
                            <button class="edit-btn"><i class="fas fa-pen"></i></button>
                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2723116428</td>
                        <td>Dini</td>
                        <td>Dini00@gmail.com</td>
                        <td>62-844-6755-7877</td>
                        <td><span class="status aktif">Aktif</span></td>
                        <td class="actions">
                            <button class="edit-btn"><i class="fas fa-pen"></i></button>
                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>2723269334</td>
                        <td>Chika</td>
                        <td>chika322@gmail.com</td>
                        <td>62-856-7745-3467</td>
                        <td><span class="status aktif">Aktif</span></td>
                        <td class="actions">
                            <button class="edit-btn"><i class="fas fa-pen"></i></button>
                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>2723994052</td>
                        <td>Azel</td>
                        <td>azel455@gmail.com</td>
                        <td>62-823-6556-7766</td>
                        <td><span class="status aktif">Aktif</span></td>
                        <td class="actions">
                            <button class="edit-btn"><i class="fas fa-pen"></i></button>
                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>2723996111</td>
                        <td>Ratna</td>
                        <td>ratna233@gmail.com</td>
                        <td>62-822-4568-9910</td>
                        <td><span class="status aktif">Aktif</span></td>
                        <td class="actions">
                            <button class="edit-btn"><i class="fas fa-pen"></i></button>
                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>2723459772</td>
                        <td>Dimas</td>
                        <td>dimas44@gmail.com</td>
                        <td>62-833-6557-8832</td>
                        <td><span class="status aktif">Aktif</span></td>
                        <td class="actions">
                            <button class="edit-btn"><i class="fas fa-pen"></i></button>
                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>