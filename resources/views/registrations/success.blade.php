@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4>🎉 Pendaftaran Berhasil!</h4>
                </div>
                <div class="card-body text-center">
                    <div class="alert alert-info">
                        <i class="fas fa-envelope"></i>
                        <strong>Tiket telah dikirim ke email:</strong> {{ $registration->email }}
                    </div>

                    <h5>Terima kasih <strong>{{ $registration->name }}</strong>!</h5>
                    <p>Anda telah terdaftar untuk event: <strong>{{ $registration->event->name }}</strong></p>
                    
                    <div class="my-4">
                        <p><strong>QR Code Anda (simpan sebagai backup):</strong></p>
                        <div class="d-flex justify-content-center">
                            {!! $qrImage !!}
                        </div>
                    </div>

                    <div class="ticket-info bg-light p-3 rounded mb-3">
                        <h6>📋 Detail Tiket:</h6>
                        <p class="mb-1"><strong>No. Tiket:</strong> {{ $registration->qr_code }}</p>
                        <p class="mb-1"><strong>Tanggal Event:</strong> {{ \Carbon\Carbon::parse($registration->event->event_date)->format('d M Y H:i') }}</p>
                        <p class="mb-0"><strong>Lokasi:</strong> {{ $registration->event->location }}</p>
                    </div>
                    
                    <p class="text-muted">
                        <i class="fas fa-info-circle"></i>
                        Cek inbox atau spam folder di email Anda untuk mendapatkan tiket digital
                    </p>
                    
                    <div class="mt-4">
                        <a href="{{ route('events.index') }}" class="btn btn-primary">
                            <i class="fas fa-calendar"></i> Kembali ke Daftar Event
                        </a>
                        <button onclick="window.print()" class="btn btn-secondary">
                            <i class="fas fa-print"></i> Print Halaman Ini
                        </button>
                        <a href="mailto:?subject=Tiket Event {{ $registration->event->name }}&body=Hi, saya ingin berbagi tiket event. No. tiket: {{ $registration->qr_code }}" 
                           class="btn btn-outline-primary">
                            <i class="fas fa-share-alt"></i> Bagikan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection