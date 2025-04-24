<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href={{ route('home') }}>ITI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} " aria-current="page"
                        href={{ route('home') }}>Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('posts.*') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Posts
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ request()->routeIs('posts.index') ? 'active' : '' }}"
                                href={{ route('posts.index') }}>Post List</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('posts.create') ? 'active' : '' }}"
                                href={{ route('posts.create') }}>New Post</a></li>
                    </ul>
                </li>

            </ul>

            <form action="{{ Auth::check() ? route('logout') : route('login') }}"
                method="{{ Auth::check() ? 'POST' : 'GET' }}">
                @if (Auth::check())
                    @csrf
                    <button class="btn btn-danger" type="submit">Log Out</button>
                @else
                    <button class="btn btn-success" type="submit">Log in</button>
                @endif
            </form>

        </div>
    </div>
</nav>
