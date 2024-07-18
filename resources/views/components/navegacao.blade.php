<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{ route('dashboard.index') }}">
                    <svg class="bi"><use xlink:href="#house-fill"/></svg>
                    <h4><i class="bi bi-speedometer2"></i></h4>. Dashboard
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('vendas.index') }}">
                    <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                    <h4><i class="bi bi-cart-check"></i></h4>. Vendas 
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('produto.index') }}">
                    <svg class="bi"><use xlink:href="#cart"/></svg>
                    <h4><i class="bi bi-boxes"></i></h4>. Produtos
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('clientes.index') }}">
                    <svg class="bi"><use xlink:href="#people"/></svg>
                    <h4><i class="bi bi-buildings"></i></h4>. Clientes
                </a>
                </li>
                
            </ul>

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('usuarios.index') }}">
                    <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                    <h4><i class="bi bi-people"></i></h4>. Users
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="#">
                    <svg class="bi"><use xlink:href="#door-closed"/></svg>
                    <h4><i class="bi bi-box-arrow-left"></i></h4>. Logout
                </a>
                </li>
            </ul>
        </div>
    </div>
</div>