<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard Admin')</title>

    <!-- CSS COMPACT -->
    <link rel="stylesheet" href="{{ asset('css/admin-compact.css') }}">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            height: 100vh;
            overflow: hidden;
        }

        .wrapper {
            display: flex;
            height: 100vh;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 260px;
            background: #06246b;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
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
        }

        .sidebar-header small {
            color: #c7d2fe;
        }

        .sidebar-menu {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
        }

        .sidebar-menu a {
            display: block;
            color: #ffffff;
            text-decoration: none;
            padding: 10px;
            margin-bottom: 8px;
            border-radius: 6px;
            font-size: 13px;
        }

        .sidebar-menu a:hover {
            background: #1e40af;
        }

        .sidebar-footer {
            padding: 15px;
            font-size: 12px;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.2);
        }

        .sidebar-footer button {
            width: 100%;
            padding: 8px;
            background: #dc2626;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
        }

        /* ================= MAIN ================= */
        .main {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* HEADER FIXED */
        .header {
            position: fixed;
            top: 0;
            left: 260px;
            right: 0;
            height: 60px;
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 20px;
            z-index: 100;
        }

        .search-form {
            display: flex;
            gap: 8px;
        }

        .search-form input {
            padding: 6px 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 12px;
            width: 180px;
        }

        .search-form button {
            padding: 6px 12px;
            background: #06246b;
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
        }

        /* CONTENT SCROLL */
        .content {
            margin-top: 60px;
            margin-bottom: 60px;
            padding: 15px;
            overflow-y: auto;
            height: calc(100vh - 120px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        table th,
        table td {
            border: 1px solid #dddddd;
            padding: 8px;
            font-size: 12px;
            text-align: center;
        }

        table th {
            background: #06246b;
            color: #ffffff;
        }

        /* FOOTER FIXED */
        footer {
            position: fixed;
            bottom: 0;
            left: 260px;
            right: 0;
            height: 60px;
            background-color: rgb(215, 185, 15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 12px;
            z-index: 100;
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
                <input type="text" name="search" placeholder="Cari Nama PMI..." value="{{ request('search') }}">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

@yield('script')
</html>
