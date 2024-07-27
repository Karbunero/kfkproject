@extends('layouts.fontend')

@section('content')
@include('layouts.carousel')

<div class="container">
    <h1 class="judul mt-5">JADWAL & TIKETING</h1>
    <hr>
    @if(isset($jadwal) && $jadwal->isNotEmpty())
    <div class="row">
        @foreach($jadwal as $item)
        <div class="col-md-4 mb-4">
            <div class="card21 jadwal-card">
                <div class="card-body">
                    <p class="card-date">{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM YYYY') }}</p>
                    <p class="card-text">{{ $item->rundown }}</p>
                    <p class="text-center">
                        {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }}
                        -
                        {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p>Data tidak ditemukan.</p>
    @endif
</div>

@include('layouts.footer')

<style>
    .card21 {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #FFFEDD; /* Card background color */
    }

    .jadwal-card {
        width: 100%;
        max-width: 400px;
        /* Adjust based on your preference */
        height: 300px;
        /* Adjust based on your preference */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
        padding: 15px;
        text-align: left;
    }

    .card-time {
        font-size: 14px;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 15px;
        color: #666;
        flex-grow: 1;
        /* Allows text to grow and push date to the bottom */
    }

    .card-date {
        font-size: 14px;
        font-weight: bold;
        margin-top: 10px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .card {
            max-width: 100%;
            height: auto;
        }

        .card-text {
            white-space: normal;
            /* Allow text to wrap */
        }
    }
</style>
@endsection
