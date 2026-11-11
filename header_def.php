
<header class="header-cliente">

    <div class="cliente-logo">
        <h2>MiTienda</h2>
    </div>

    <div class="buscador">
        <input type="text" placeholder="¿Qué estás buscando?">
        <button>🔍</button>
    </div>

    <nav>
        <a href="#">Inicio</a>
        <a href="#">Categorías</a>
        <a href="#">Ofertas</a>
        <a href="#">Mis pedidos</a>
    </nav>

    <div class="cliente-actions">
        <span>♡</span>
        <span>🛒</span>
        <span>👤</span>
    </div>

</header>

<style>
    .header-cliente {
        background: white;
        border-bottom: 1px solid #ddd;
        padding: 15px 30px;
        display: flex;
        align-items: center;
        gap: 30px;
        font-family: Arial, sans-serif;
    }

    .cliente-logo h2 {
        margin: 0;
        color: #2563eb;
    }

    .buscador {
        display: flex;
        flex: 1;
        max-width: 400px;
    }

    .buscador input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px 0 0 6px;
        outline: none;
    }

    .buscador button {
        padding: 10px 15px;
        border: none;
        background: #2563eb;
        color: white;
        border-radius: 0 6px 6px 0;
        cursor: pointer;
    }

    .header-cliente nav {
        display: flex;
        gap: 18px;
    }

    .header-cliente nav a {
        color: #333;
        text-decoration: none;
    }

    .header-cliente nav a:hover {
        color: #2563eb;
    }

    .cliente-actions {
        display: flex;
        gap: 18px;
        font-size: 20px;
        cursor: pointer;
    }
</style>