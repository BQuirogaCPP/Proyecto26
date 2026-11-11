
<header class="header-vendor">
    <div class="vendor-logo">
        <h2>MiTienda</h2>
        <span>VENDEDOR</span>
    </div>

    <nav>
        <a href="#">🏠 Inicio</a>
        <a href="#">🏪 Mi Tienda</a>
        <a href="#">📦 Productos</a>
        <a href="#">🛒 Pedidos</a>
        <a href="#">💰 Ventas</a>
    </nav>

    <div class="vendor-actions">
        <span>🔔 3</span>
        <span>👤 Mi cuenta</span>
    </div>
</header>

<style>
    .header-vendor {
        background: #166534;
        color: white;
        padding: 15px 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-family: Arial, sans-serif;
    }

    .vendor-logo {
        display: flex;
        flex-direction: column;
    }

    .vendor-logo h2 {
        margin: 0;
    }

    .vendor-logo span {
        font-size: 10px;
        color: #bbf7d0;
    }

    .header-vendor nav {
        display: flex;
        gap: 20px;
    }

    .header-vendor nav a {
        color: white;
        text-decoration: none;
    }

    .header-vendor nav a:hover {
        color: #bbf7d0;
    }

    .vendor-actions {
        display: flex;
        gap: 15px;
    }
</style>