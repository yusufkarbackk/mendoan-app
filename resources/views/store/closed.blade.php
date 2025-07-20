@extends('layouts.app')

@section('title', 'Toko Masih Tutup')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card text-center shadow-sm border-0">
            <div class="card-body py-5">
                <h1 class="display-5 mb-4">Maaf, Mendoan Becks Masih Tutup 💤</h1>

                <p class="fs-5">
                    Kami buka setiap hari <strong>09:00 - 17:00 WIB</strong>.<br>
                    Silakan kembali lagi nanti atau hubungi <a href="https://wa.me/6285210896102">Bu Dewi</a>
                    untuk pertanyaan mendesak.
                </p>

                <img src="{{ asset('images/closed_sign.svg') }}" alt="Closed Sign" class="mt-4" style="max-width:200px">
            </div>
            <div class="card-footer bg-white">
                <a href="{{ url()->current() }}" class="btn btn-outline-primary">
                    Coba Refresh
                </a>
            </div>
        </div>
    </div>
</div>
@endsection