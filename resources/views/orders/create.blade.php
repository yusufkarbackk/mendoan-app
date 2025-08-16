@extends('layouts.app')

@section('title', 'Form Pemesanan Makanan')

@section('content')
<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Pilih Produk Anda</h1>
        <p class="text-muted">Pilih tempe, telur, atau keduanya untuk ditambahkan ke pesanan.</p>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="row row-cols-1 row-cols-md-2 g-4">

                <div class="col">
                    <div class="card h-100 product-card">
                        <img src="https://placehold.co/600x400/DEB887/FFFFFF?text=Tempe" class="card-img-top" alt="Gambar Tempe">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Tempe</h5>
                            <p class="card-text">Satu papan tempe segar, kaya protein.</p>
                            <p class="fs-5 fw-semibold text-primary">Rp 5.000</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 pb-3">
                            <div class="form-check fs-5">
                                <input
                                    class="form-check-input product-checkbox"
                                    type="checkbox"
                                    value="5000"
                                    id="check-tempe"
                                    data-product-name="Tempe">
                                <label class="form-check-label" for="check-tempe">
                                    Pilih
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 product-card">
                        <img src="https://placehold.co/600x400/F0E68C/FFFFFF?text=Telur" class="card-img-top" alt="Gambar Telur">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Telur Ayam Negeri</h5>
                            <p class="card-text">Telur ayam negeri pilihan.</p>
                            <p class="fs-5 fw-semibold text-primary">Rp 15.000</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 pb-3">
                            <div class="form-check fs-5">
                                <input
                                    class="form-check-input product-checkbox"
                                    type="checkbox"
                                    value="15000"
                                    id="check-telur"
                                    data-product-name="Telur Ayam (1/2 kg)">
                                <label class="form-check-label" for="check-telur">
                                    Pilih
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 product-card">
                        <img src="https://placehold.co/600x400/F0E68C/FFFFFF?text=Telur" class="card-img-top" alt="Gambar Telur">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Telur Ayam</h5>
                            <p class="card-text">1/2 kg telur ayam negeri pilihan.</p>
                            <p class="fs-5 fw-semibold text-primary">Rp 15.000</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 pb-3">
                            <div class="form-check fs-5">
                                <input
                                    class="form-check-input product-checkbox"
                                    type="checkbox"
                                    value="15000"
                                    id="check-telur"
                                    data-product-name="Telur Ayam (1/2 kg)">
                                <label class="form-check-label" for="check-telur">
                                    Pilih
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 mt-4 mt-lg-0">
            <div class="card sticky-top" style="top: 20px;">
                <div class="card-body">
                    <h4 class="card-title fw-bold mb-3">🛒 Pesanan Anda</h4>

                    <ul class="list-group list-group-flush" id="order-summary-list">
                        <li class="list-group-item text-center text-muted" id="empty-cart-message">
                            Keranjang masih kosong
                        </li>
                    </ul>

                    <hr>

                    <div class="d-flex justify-content-between fs-5 fw-bold">
                        <span>Total:</span>
                        <span id="total-price">Rp 0</span>
                    </div>

                    <button class="btn btn-primary w-100 mt-4 py-2 fw-bold" id="order-button" disabled>
                        Pesan Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection