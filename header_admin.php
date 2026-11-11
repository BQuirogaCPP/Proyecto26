<header class="header-admin">
    <div class="logo">
        <h2>MiTienda</h2>
        <span>ADMIN</span>
    </div>

    <nav>
        <a href="#">Dashboard</a>
        <a href="#">Usuarios</a>
        <a href="#">Productos</a>
        <a href="#">Pedidos</a>
        <a href="#">Reportes</a>
    </nav>

    <div class="admin-user">
        <span>🔔</span>
        <span>👤 Administrador</span>
    </div>
</header>

<style>
    .header-admin {
        background: #1f2937;
        color: white;
        padding: 15px 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-family: Arial, sans-serif;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .logo h2 {
        margin: 0;
    }

    .logo span {
        background: #ef4444;
        padding: 4px 7px;
        border-radius: 5px;
        font-size: 11px;
    }

    .header-admin nav {
        display: flex;
        gap: 25px;
    }

    .header-admin nav a {
        color: white;
        text-decoration: none;
    }

    .header-admin nav a:hover {
        color: #60a5fa;
    }

    .admin-user {
        display: flex;
        gap: 15px;
        align-items: center;
    }
</style>