<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
        <!-- Tambahkan Font Awesome di bagian head -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link
            href="https://fonts.googleapis.com/icon?family=Material+Icons"
            rel="stylesheet">
        <link href="{{ asset('css/formulir1.css') }}" rel="stylesheet">
        <link href="{{ asset('css/user.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <link href="{{ asset('css/show.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jadwal.css') }}" rel="stylesheet">

        <style>
            .navbar {
                background-image: url("{{ asset('foto') }}");
                background-size: cover;
                /* untuk mengisi seluruh area navbar dengan gambar */
                background-repeat: no-repeat;
                background-position: center;
            }

            #sp-footer {
                background-color: #311f5b;
                /* Ubah latar belakang menjadi hitam */
                color: white;
                /* Ubah warna teks menjadi putih */
                padding: 20px 0;
                /* Berikan padding ke atas dan bawah untuk memberikan ruang */
            }

            .sp-column {
                text-align: center;
                /* Pusatkan teks di dalam kolom */
                margin-bottom: 10px;
                /* Berikan ruang di antara kolom */
            }

            .sp-whatsapp a {
                color: white;
                /* Ubah warna teks tautan menjadi putih */
            }

            .sp-whatsapp a:hover {
                color: gray;
                /* Ubah warna teks tautan saat digulir menjadi abu-abu */
            }

            .card1 {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            border: none;
        }
        </style>

        <title>{{ config('app.name', 'KFK') }}</title>
    </head>

    <body>

        @if (session('pinjam'))
        <script>
            Swal.fire({icon: 'success', title: '<span style="font-size: 24px;">Terima kasih!</span>', html: '<p style="font-size: 18px;"> {{ session('
            pinjam ') }}</p>', showConfirmButton: false, timer: 2000});
        </script>
        @endif @if (session('formulir1'))
        <script>
            Swal.fire({icon: 'success', title: '<span style="font-size: 24px;">Terima kasih!</span>', html: '<p style="font-size: 18px;"> {{ session('
            formulir1 ') }}</p>', showConfirmButton: false, timer: 2000});
        </script>
        @endif @if (session('formulir2'))
        <script>
            Swal.fire({icon: 'success', title: '<span style="font-size: 24px;">Terima kasih!</span>', html: '<p style="font-size: 18px;"> {{ session('
            formulir2 ') }}</p>', showConfirmButton: false, timer: 2000});
        </script>
        @endif @if (session('logout'))
        <script>
            Swal.fire({icon: 'success', title: '<span style="font-size: 24px;">Logout Berhasil</span>', showConfirmButton: false, timer: 2000});
        </script>
        @endif @if (session('hapus'))
        <script>
            Swal.fire({icon: 'success', title: '<span style="font-size: 24px;">Terima kasih!</span>', html: '<p style="font-size: 18px;"> {{ session('
            hapus ') }}</p>', showConfirmButton: false, timer: 2000});
        </script>
        @endif

        <div class="container pt-2">
            <div class="card1 card">
                <!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top p-2 navbar-custom">
    <a
        class="navbar-brand"
        href="{{ route('welcome') }}">FLOBAMORA FILM FESTIVAL</a>
    <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('welcome') }}">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('program') }}">Program</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('media') }}">Media & Publikasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('film') }}">Film</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('penghargaan') }}">Penghargaan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('jadwal') }}">Jadwal & Tiketing</a>
            </li>
        </ul>
    </div>
</nav>

                <!-- footer -->
                @yield('content')
            </div>
        </div>

        <style>
            /* Gaya CSS untuk link berwarna putih */
            #sp-footer a {
                color: white;
                text-decoration: none;
                /* Menghilangkan garis bawah pada link */
            }

            #sp-footer a:hover {
                text-decoration: underline;
                /* Efek garis bawah saat hover */
            }

                /* Smaller font size for screens smaller than 768px */
    @media (max-width: 768px) {
        .navbar-brand {
            font-size: 1.5rem; /* Adjust the font size as needed */
        }
    }
    @media (max-width: 425px) {
        .navbar-brand {
            font-size: 1.2rem; /* Adjust the font size as needed */
        }
    }

    /* Even smaller font size for screens smaller than 576px */
    @media (max-width: 375px) {
        .navbar-brand {
            font-size: 0.9rem; /* Further adjustment for very small screens */
        }
    }

        /* Smaller font size for ul elements on screens smaller than 1024px */
    @media (max-width: 1024px) {
        .navbar-nav .nav-link {
            font-size: 0.9rem; /* Adjust the font size as needed */
        }
    }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var currentYear = new Date().getFullYear();
                var copyrightElement = document.getElementById('copyright');
                copyrightElement.textContent = 'Copyright © ' + currentYear + ' ';
            });
        </script>

        <link href="{{ asset('css/buku.css') }}" rel="stylesheet">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>

</html>