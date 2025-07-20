@extends('layouts.app')

@section('title', 'Pesanan Sedang Dimasak')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white text-center">
                <h4 class="mb-0">🍳 Pesanan Sedang Dimasak</h4>
            </div>

            <div class="card-body text-center">
                <p class="fs-5">Terima kasih</p>
                <p class="mb-4">Nomor pesanan Anda: <span class="fw-bold text-primary">#{{ $order->id }}</span></p>

                {{-- ======== BLOK KONDISIONAL ======== --}}
                @if ($order->payment_method === 'cash')
                <p class="fs-5">Metode pembayaran: <span class="fw-bold">Cash</span></p>

                <div class="alert alert-info">
                    Mohon <strong>siapkan uang Anda</strong> saat pesanan tiba. 💵
                </div>
                @else
                <p class="fs-5">Metode pembayaran: <span class="fw-bold">Transfer Bank</span></p>

                <h5 class="mb-3">Silakan transfer pembayaran ke salah satu rekening berikut:</h5>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Bank</th>
                                <th>No. Rekening</th>
                                <th>Atas Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bankAccounts as $acc)
                            <tr>
                                <td>{{ $acc['bank'] }}</td>
                                <td>
                                    <span class="fw-semibold me-2">{{ $acc['number'] }}</span>

                                    <!-- tombol copy -->
                                    <button
                                        class="btn btn-sm btn-outline-secondary copy-btn"
                                        data-copy="{{ $acc['number'] }}"
                                        title="Salin nomor rekening">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </td>
                                <td>{{ $acc['name'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <p class="mt-4">Setelah transfer, kirim bukti ke WhatsApp <a href="${env('NOMOR_WA')}" >Bu Dewi</a> agar pesanan segera kami proses.</p>
                @endif
                {{-- ==================================== --}}

                <a href="{{ route('orders.create') }}" class="btn btn-outline-primary mt-3">
                    Buat Pesanan Lain
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // pilih semua tombol copy
    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const text = btn.dataset.copy;

            // salin ke clipboard
            navigator.clipboard.writeText(text).then(() => {
                // ganti ikon jadi centang 2 detik sebagai feedback
                const original = btn.innerHTML;
                btn.innerHTML = '<i class="bi bi-check-lg text-success"></i>';
                setTimeout(() => btn.innerHTML = original, 2000);
            });
        });
    });
});
</script>
@endpush
