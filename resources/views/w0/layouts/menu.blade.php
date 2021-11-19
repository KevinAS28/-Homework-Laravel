<div class="links">
    <a href="/w0">Home</a>
    {{-- <a href="/login">Login</a>
    <a href="/register">Register</a> --}}
    <a href="/mahasiswa">Mahasiswa</a>
    <a href="/buku">Buku</a>

    @if(Auth::check() && Auth::user()->level=='admin')
        <a href="/user">User</a>
        <a href="/galeri">Galeri</a>
    @endif

    @if(Auth::check())
        <a class="dropdown-item" href="http://localhost:8000/logout" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                    Logout
                </a>
        
            <form id="logout-form" action="http://localhost:8000/logout" method="POST" class="d-none" type="hidden">
                @csrf
            </form>
    @endif
    

    {{-- a[href="/w0/p$"]{Page $}*10 --}}
</div>