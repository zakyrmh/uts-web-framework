<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">UTS Web Framework</h5> <button type="button"
                class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column mt-5">
                <li class="nav-item"> <a
                        class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        aria-current="page" href="{{ route('dashboard') }}"> <svg class="bi" aria-hidden="true">
                            <use xlink:href="#house-fill"></use>
                        </svg>
                        Dashboard
                    </a> </li>
                <li class="nav-item"> <a
                        class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}"
                        href="{{ route('mahasiswa.index') }}">
                        <svg class="bi" aria-hidden="true">
                            <use xlink:href="#people"></use>
                        </svg>
                        Mahasiswa
                    </a> </li>
                <li class="nav-item"> <a
                        class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('ruangan.*') ? 'active' : '' }}"
                        href="{{ route('dosen.index') }}">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-badge" viewBox="0 0 16 16">
                            <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path
                                d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z" />
                        </svg>
                        Dosen
                    </a>
                </li>
                <li class="nav-item"> <a
                        class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('ruangan.*') ? 'active' : '' }}"
                        href="{{ route('ruangan.index') }}">
                        <svg class="bi" aria-hidden="true">
                            <use xlink:href="#door-closed"></use>
                        </svg>
                        Ruangan
                    </a>
                </li>
                <li class="nav-item"> <a
                        class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('prodi.*') ? 'active' : '' }}"
                        href="{{ route('prodi.index') }}">
                        <svg class="bi" aria-hidden="true">
                            <use xlink:href="#puzzle"></use>
                        </svg>
                        Prodi
                    </a>
                </li>
            </ul>
            <hr class="my-3">
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a class="nav-link d-flex align-items-center gap-2 text-danger" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg class="bi" aria-hidden="true">
                            <use xlink:href="#door-closed"></use>
                        </svg>
                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
