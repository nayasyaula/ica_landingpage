@extends('layouts.app')

@section('content')
    <div class="ticket-page">
        <div class="container ticket-container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 ticket-col">
                    <!-- Success Alert -->
                    <div class="ticket-alert-success text-center mb-4 py-2">
                        <i class="fas fa-check-circle me-2"></i>
                        Pendaftaran Berhasil!
                    </div>

                    <!-- Main Ticket Card -->
                    <div class="ticket-card">
                        <!-- Header -->
                        <div class="ticket-header">
                            <small>QR Code ini diperlukan untuk proses check-in di venue. Sebagai tambahan,
                                QR Code juga telah dikirimkan ke email Anda. Mohon pastikan email telah diterima
                                sebelum menghadiri acara.</small>
                        </div>

                        <!-- QR Code Section -->
                        <div class="qr-section">
                            <div class="qr-container">
                                {!! $qrImage !!}
                            </div>
                        </div>

                        <!-- Ticket Details -->
                        <div class="ticket-details">
                            <div class="detail-item">
                                <span class="label">No. Tiket</span>
                                <span class="value">{{ $registration->qr_code }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="label">Tanggal Event</span>
                                <span
                                    class="value">{{ \Carbon\Carbon::parse($registration->event->event_date)->format('d M Y') }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="label">Nama</span>
                                <span class="value">{{ $registration->name }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="label">Email</span>
                                <span class="value">{{ $registration->email }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="label">Lokasi</span>
                                <span class="value">{{ $registration->event->location }}</span>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="ticket-actions">
                            <button onclick="window.print()" class="btn btn-sm btn-outline-primary ticket-btn">
                                <i class="fas fa-print me-2"></i> Print
                            </button>
                            <a href="{{ route('registrations.download-qrcode', $registration) }}"
                                class="btn btn-sm btn-success ticket-btn">
                                <i class="fas fa-download me-2"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Copy CSS di atas ke sini */
    </style>
@endsection