@extends('layouts.backend')

@section('content')
        <style>
            .container {
                display: flex;
                flex-wrap: wrap;
                /* agar card dapat pindah ke baris baru jika diperlukan */
                gap: 10px;
                justify-content: space-between;
                padding: 20px;
                /* background-color: #310000; */
            }

            .card {
                flex: 0 1 calc(50% - 10px);
                /* agar setiap card memiliki lebar 50% dan ada jarak 10px di antara mereka */
                background-color: #ffffff;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                margin-bottom: 10px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                text-align: center;
            }

            .card h5 {
                margin-top: 0;
                margin-bottom: 0;
                font-size: 1.5rem;
            }

            a {
                text-decoration: none;
            }
        </style>
        <div class="container">
            <div class="card">
                <a href="/admin/bioskop" class="nav-link {{ Request::is('admin/bioskop*') ? 'active' : '' }}">
                    <h5>Bioskop Pasiar</h5>
                </a>
            </div>
            <div class="card">
                <a href="/admin/kompetisi" class="nav-link {{ Request::is('admin/kompetisi*') ? 'active' : '' }}">
                    <h5>Kompetisi Film</h5>
                </a>
            </div>
            <div class="card">
                <a href="/admin/layar" class="nav-link {{ Request::is('admin/layar*') ? 'active' : '' }}">
                    <h5>Layar Nusantara</h5>
                </a>
            </div>
            <div class="card">
                <a href="/admin/bakumpul" class="nav-link {{ Request::is('admin/bakumpul*') ? 'active' : '' }}">
                    <h5>Bakumpul Komunitas</h5>
                </a>
            </div>
            <div class="card">
                <a href="/admin/kfk" class="nav-link {{ Request::is('admin/kfk*') ? 'active' : '' }}">
                    <h5>KFK Film Lab</h5>
                </a>
            </div>
            <div class="card">
                <a href="/admin/pelajar" class="nav-link {{ Request::is('admin/pelajar*') ? 'active' : '' }}">
                    <h5>Kompetisi Film Pelajar NTT</h5>
                </a>
            </div>
            <div class="card">
                <a href="/admin/internasional" class="nav-link {{ Request::is('admin/internasional*') ? 'active' : '' }}">
                    <h5>Layar Internasional</h5>
                </a>
            </div>
            <div class="card">
                <a href="/admin/baomong" class="nav-link {{ Request::is('admin/baomong*') ? 'active' : '' }}">
                    <h5>Baomong Film</h5>
                </a>
            </div>
        </div>
@endsection
