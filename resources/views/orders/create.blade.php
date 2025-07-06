@extends('layouts.app')

@section('title', 'Form Pemesanan Makanan')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Pesan Mendoan</h5>
            </div>

            <div class="card-body">
                <!-- tampilkan error validasi -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nomor Whatsapp</label>
                        <input type="tel" class="form-control" id="nomor" name="nomor"
                            value="{{ old('nomor') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Pengiriman</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Jumlah Porsi</label>
                        <input type="number" min="1" class="form-control" id="quantity" name="quantity"
                            value="{{ old('quantity', 1) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan Tambahan (opsional)</label>
                        <textarea class="form-control" id="catatan" name="catatan" rows="2">{{ old('catatan') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Metode Pembayaran</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="pay_cash"
                                name="payment_method" value="cash"
                                {{ old('payment_method') === 'cash' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="pay_cash">Cash (bayar di tempat)</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="pay_transfer"
                                name="payment_method" value="transfer"
                                {{ old('payment_method') === 'transfer' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="pay_transfer">Transfer Bank</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Pesan Mendoan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection