<!-- resources/views/user/bioskop_pasjar.blade.php -->
@extends('layouts.fontend')@section('content')
@include('layouts.carousel')
    <h1 class="judul mt-5">PENGHARGAAN</h1>
    <hr>
    <!-- <div class="navbar1">
        <ul class="nav-list1">
            <li><a href="#">Semua</a></li>
            <li><a href="#">Penghargaan</a></li>
        </ul>
    </div> -->

<div class="container">
    @if(isset($penghargaan) && $penghargaan->isNotEmpty())
        <div class="row">
            @foreach($penghargaan as $item)
                <div class="col-md-4 mb-4">
                    <div class="box">
                        <div class="box-content">
                            <img
                                src="{{ $item->foto ? asset('foto/penghargaan/' . $item->foto) : asset('foto/penghargaan/default.png') }}"
                                class="box-img-top"
                                alt="Foto Penghargaan">
                            <div class="box-body">
                                <h5 class="box-title">{{ $item->nama }}</h5>
                                <p class="box-text"><strong>Posisi:</strong> {{ $item->posisi }}</p>
                                <p class="box-text">{{ $item->bio }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Data tidak ditemukan.</p>
    @endif
</div>

<style>
.box {
    /* border: 2px solid #000; Add a solid black border */
    border-radius: 8px; /* Match rounded corners */
    overflow: hidden; /* Ensure content stays within the box */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Same shadow effect */
    background-color: #fff; /* White background */
    margin-bottom: 15px; /* Space below each box */
    display: flex; /* Flexbox for layout control */
    flex-direction: column; /* Column layout for content */
    height: 100%; /* Ensure full height */
}

.box-content {
    display: flex;
    flex-direction: column;
    height: 100%;
    text-align: left;
}

.box-img-top {
    width: 100%;
    height: 200px; /* Fixed height for image */
    object-fit: cover; /* Cover image within the box */
}

.box-body {
    padding: 15px;
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Push title and text to top and bottom */
}

.box-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.box-text {
    font-size: 14px;
    color: #666; /* Slightly lighter color for text */
    margin-bottom: 10px;
}

/* Responsive styling */
@media (max-width: 768px) {
    .judul {
        font-size: 35px; /* Adjust font size for smaller screens */
    }
}

@media (max-width: 576px) {
    .judul {
        font-size: 30px; /* Further adjustment for very small screens */
    }
}

}

</style>

@include('layouts.footer')
@endsection
