<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dasboard Admin')</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            height: 100vh;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 260px;
            display: flex;
            flex-direction: column;
            background: #06246b;
            color: #ffffff;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-header img {
            height: 60px;
            margin-bottom: 10px;
        }

        .sidebar-header h3 {
            margin: 0;
            font-size: 15px;
            line-height: 1.4;
            font-weight: bold;
            color: #ffffff;
        }

        .sidebar-header small {
            color: #c7d2fe;
            font-weight: normal;
        }

        .sidebar-menu {
            flex: 1;
            padding: 15px;
        }

        .sidebar-menu a {
            display: block;
            color: #ffffff;
            text-decoration: none;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 6px;
            font-size: 14px;
        }

        .sidebar-menu a:hover {
            background: #1e40af;
        }

        .sidebar-footer {
            padding: 15px;
            font-size: 12px;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.2);
            color: #e5e7eb;
        }

        .sidebar-footer button {
            width: 100%;
            padding: 10px;
            background: #dc2626;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 13px;
            margin-top: 6px;
        }

        /* ================= MAIN ================= */
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* HEADER */
        .header {
            background: white;
            padding: 15px 25px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
            color: #1e293b;
        }

        .search-form {
            display: flex;
            gap: 8px;
        }

        .search-form input {
            padding: 8px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
            width: 220px;
        }

        .search-form button {
            padding: 8px 15px;
            background: #06246b;
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        /* CONTENT */
        .content {
            padding: 25px;
            flex: 1; /* agar konten mengisi sisa ruang, mendorong footer ke bawah */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        table th{
            border: 1px solid #dddddd;
            padding: 10px;
            font-size: 14px;
            color: #f8f9fa;
            text-align: center;
        
        
        }
        table td {
            border: 1px solid #dddddd;
            padding: 10px;
            font-size: 14px;
            color: #1e293b;
            text-align: center;
        }

        table th {
            background: #06246b;
        }

        /* ================= FOOTER ================= */
        footer {
            background-color: rgb(215, 185, 15); /* warna kotak gold */
            text-align: center;
            padding: 27px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="sidebar-header">
            <img src="{{ asset('logo.png') }}" alt="Logo">
            <h3>
                Direktorat Pelindungan PMI<br>
                <small>Kementerian P2MI</small>
            </h3>
        </div>

        <div class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
            <a href="{{ route('admin.pengaduan.index') }}">📄 List Pengaduan</a>
             <!-- QR PENGADUAN -->
    
    </nav>
        </div>

        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>

    </aside>

    <!-- MAIN -->
    <div class="main">

        <!-- HEADER -->
        <div class="header">
    

            <form class="search-form" method="GET" action="{{ route('admin.pengaduan.index') }}">
                <input
                    type="text"
                    name="search"
                    placeholder="Cari Nama PMI..."
                    value="{{ request('search') }}"
                >
                <button type="submit">Search</button>
            </form>
        </div>

        <!-- CONTENT -->
        <main class="content">
            @yield('content')
        </main>

        <!-- FOOTER -->
        <footer>
            © {{ date('Y') }} KP2MI — Sistem Pengaduan Pekerja Migran Indonesia
        </footer>

    </div>

</div>

</body>
</html>
