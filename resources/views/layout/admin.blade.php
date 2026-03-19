<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - StoreUI Admin</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>
        /* Estilos específicos para el panel de admin */
        :root {
            --admin-sidebar-width: 250px;
            --admin-header-height: 60px;
            --admin-primary: #2563eb;
            --admin-secondary: #1e293b;
            --admin-success: #10b981;
            --admin-danger: #ef4444;
            --admin-warning: #f59e0b;
            --admin-dark: #0f172a;
            --admin-light: #f8fafc;
            --admin-border: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f5f9;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .admin-sidebar {
            width: var(--admin-sidebar-width);
            background-color: var(--admin-secondary);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h2 {
            color: white;
            font-size: 1.5rem;
            margin: 0;
        }

        .sidebar-header span {
            color: var(--admin-primary);
            font-size: 0.875rem;
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .sidebar-nav ul {
            list-style: none;
        }

        .sidebar-nav li {
            margin-bottom: 0.25rem;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.5rem;
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: var(--admin-primary);
        }

        .sidebar-nav .nav-icon {
            font-size: 1.25rem;
            width: 24px;
            text-align: center;
        }

        /* Main Content */
        .admin-main {
            flex: 1;
            margin-left: var(--admin-sidebar-width);
            min-height: 100vh;
            background-color: #f1f5f9;
        }

        /* Top Header */
        .admin-header {
            height: var(--admin-header-height);
            background-color: white;
            border-bottom: 1px solid var(--admin-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }

        .header-search {
            display: flex;
            align-items: center;
            background-color: var(--admin-light);
            border-radius: 0.375rem;
            padding: 0.375rem 1rem;
            width: 300px;
            border: 1px solid var(--admin-border);
        }

        .header-search input {
            border: none;
            background: none;
            outline: none;
            width: 100%;
            font-size: 0.875rem;
        }

        .header-search span {
            color: #64748b;
            margin-right: 0.5rem;
        }

        .header-user {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-info {
            text-align: right;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--admin-dark);
        }

        .user-role {
            font-size: 0.75rem;
            color: #64748b;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        /* Content Area */
        .admin-content {
            padding: 2rem;
        }

        .content-header {
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content-header h1 {
            font-size: 1.875rem;
            color: var(--admin-dark);
            margin: 0;
        }

        .breadcrumb {
            display: flex;
            gap: 0.5rem;
            color: #64748b;
            font-size: 0.875rem;
        }

        .breadcrumb a {
            color: var(--admin-primary);
            text-decoration: none;
        }

        /* Cards */
        .admin-card {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }

        .card-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--admin-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h2 {
            font-size: 1.25rem;
            margin: 0;
            color: var(--admin-dark);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--admin-border);
            background-color: var(--admin-light);
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background-color: white;
            border-radius: 0.5rem;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-icon.primary { background-color: #dbeafe; color: #2563eb; }
        .stat-icon.success { background-color: #d1fae5; color: #10b981; }
        .stat-icon.warning { background-color: #fed7aa; color: #f59e0b; }
        .stat-icon.danger { background-color: #fee2e2; color: #ef4444; }

        .stat-info h3 {
            font-size: 0.875rem;
            color: #64748b;
            margin-bottom: 0.25rem;
        }

        .stat-info .stat-number {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--admin-dark);
        }

        /* Tables */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }

        .admin-table th {
            text-align: left;
            padding: 0.75rem 1rem;
            background-color: var(--admin-light);
            color: #64748b;
            font-weight: 600;
            font-size: 0.875rem;
            border-bottom: 2px solid var(--admin-border);
        }

        .admin-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--admin-border);
            color: var(--admin-dark);
        }

        .admin-table tr:hover {
            background-color: var(--admin-light);
        }

        /* Badges */
        .admin-badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-success {
            background-color: #d1fae5;
            color: #065f46;
        }

        .badge-warning {
            background-color: #fed7aa;
            color: #92400e;
        }

        .badge-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .badge-info {
            background-color: #dbeafe;
            color: #1e40af;
        }

        /* Buttons */
        .admin-btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .admin-btn-primary {
            background-color: var(--admin-primary);
            color: white;
        }

        .admin-btn-primary:hover {
            background-color: #1d4ed8;
        }

        .admin-btn-success {
            background-color: var(--admin-success);
            color: white;
        }

        .admin-btn-success:hover {
            background-color: #059669;
        }

        .admin-btn-danger {
            background-color: var(--admin-danger);
            color: white;
        }

        .admin-btn-danger:hover {
            background-color: #dc2626;
        }

        .admin-btn-outline {
            background-color: transparent;
            border: 1px solid var(--admin-border);
            color: var(--admin-dark);
        }

        .admin-btn-outline:hover {
            background-color: var(--admin-light);
        }

        .admin-btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }

        /* Forms */
        .admin-form-group {
            margin-bottom: 1.5rem;
        }

        .admin-form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--admin-dark);
        }

        .admin-form-control {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid var(--admin-border);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: border-color 0.3s ease;
        }

        .admin-form-control:focus {
            outline: none;
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .admin-sidebar {
                width: 0;
                transform: translateX(-100%);
            }

            .admin-main {
                margin-left: 0;
            }

            .admin-sidebar.open {
                width: var(--admin-sidebar-width);
                transform: translateX(0);
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Toggle button for mobile */
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--admin-dark);
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <aside class="admin-sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2>StoreUI</h2>
            <span>Administración</span>
        </div>
        
        <nav class="sidebar-nav">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <span class="nav-icon">📊</span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products') }}" class="{{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                        <span class="nav-icon">📦</span>
                        <span>Productos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories') }}" class="{{ request()->routeIs('admin.categories*') ? 'active' : '' }}">
                        <span class="nav-icon">🏷️</span>
                        <span>Categorías</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.orders') }}" class="{{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
                        <span class="nav-icon">🛒</span>
                        <span>Pedidos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <span class="nav-icon">👥</span>
                        <span>Usuarios</span>
                    </a>
                </li>
                <li style="margin-top: 2rem; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem;">
                    <a href="{{ route('product.index') }}">
                        <span class="nav-icon">🏠</span>
                        <span>Ver Tienda</span>
                    </a>
                </li>
                <!-- Logout comentado temporalmente hasta implementar autenticación -->
                {{-- 
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="nav-icon">🚪</span>
                        <span>Cerrar Sesión</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                --}}
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="admin-main">
        <!-- Top Header -->
        <header class="admin-header">
            <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
            
            <div class="header-search">
                <span>🔍</span>
                <input type="text" placeholder="Buscar...">
            </div>

            <div class="header-user">
                <div class="user-info">
                    <div class="user-name">Admin User</div>
                    <div class="user-role">Administrador</div>
                </div>
                <div class="user-avatar">A</div>
            </div>
        </header>

        <!-- Content -->
        <div class="admin-content">
            @yield('admin-content')
        </div>
    </main>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
        }
    </script>

    @stack('scripts')
</body>
</html>