<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Market | Kelompok 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope&display=swap');

        * {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <!-- Container wrapper -->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse shadow-sm p-3" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0 fw-bold" href="#"> E-Market
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ '/product' }}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ '/transaksi' }}">Transaksi</a>
                    </li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ '/riwayat' }}">Riwayat Transaksi</a>
                    </li class="nav-item">

                </ul>
                <ul class="navbar-nav me-4 ms-4 mb-2 mb-lg-0">
                    <li class="nav-item me-4 ms-4">
                        <form class="d-flex" role="search" action="{{ route('product.search') }}" method="GET">
                            <input class="form-control me-2" type="text" name="search" placeholder="Cari produk...">
                            <button class="btn btn-outline-success" type="submit">
                                <ion-icon name="search-outline"></ion-icon>
                            </button>
                        </form>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <ion-icon name="person-circle-outline"></ion-icon>
                            @auth
                                {{ Auth::user()->name }}
                            @endauth
                        </a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item text-danger"
                                    onclick="return confirmLogout(event)"href="{{ route('logout') }}">
                                    <ion-icon name="power-outline"></ion-icon> Logout
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link text-danger" onclick="return confirmLogout(event)"
                            href="{{ route('logout') }}">Logout</a>
                    </li> --}}
                </ul>



                <script>
                    function confirmLogout(event) {
                        event.preventDefault();
                        swal({
                            title: "Konfirmasi Logout",
                            text: "Keluar dari akun Anda?",
                            icon: "warning",
                            buttons: ["Batal", "Keluar"],
                            dangerMode: true,
                        }).then((willDelete) => {
                            if (willDelete) {
                                window.location.href = event.target.getAttribute("href");
                            } else {
                                return false;
                            }
                        });
                    }
                </script>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

        </nav>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
        @yield('content')
</body>

</html>
