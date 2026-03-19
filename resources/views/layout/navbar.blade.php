<nav>
    <ul>
        <li>
            <a href="{{ route('product.index') }}" class="{{ request()->routeIs('product.index') ? 'active' : '' }}">
                Catálogo
            </a>
        </li>
        <li>
            <a href="{{ route('cart.index') }}" class="{{ request()->routeIs('cart.*') ? 'active' : '' }}">
                Carrito 
                @php 
                    use App\Http\Controllers\CartSessionController;
                    $cartController = new CartSessionController();
                    $count = $cartController->getCount();
                @endphp
                @if($count > 0)
                    <span style="background-color: var(--primary-color); color: white; padding: 0.125rem 0.5rem; border-radius: 9999px; font-size: 0.75rem; margin-left: 0.5rem;">
                        {{ $count }}
                    </span>
                @endif
            </a>
        </li>
        <li>
            <a href="{{ route('product.create') }}" class="{{ request()->routeIs('product.create') ? 'active' : '' }}">
                Registrar Producto
            </a>
        </li>
    </ul>
</nav>