<nav>
    <ul>
        <li>
            <a href="{{ route('product.index') }}" class="{{ request()->routeIs('product.index') ? 'active' : '' }}">
                Catálogo
            </a>
        </li>
        <li>
            <a href="{{ route('product.create') }}" class="{{ request()->routeIs('product.create') ? 'active' : '' }}">
                Registrar Producto
            </a>
        </li>
    </ul>
</nav>