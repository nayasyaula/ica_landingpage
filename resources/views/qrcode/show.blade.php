@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header text-center py-4">
                    <h3 class="mb-0"><i class="fas fa-qrcode me-2"></i>QR Code Detail</h3>
                </div>
                <div class="card-body text-center p-4">
                    <!-- QR Code -->
                    <div class="mb-4">
                        {!! $qrImage !!}
                    </div>
                    
                    <!-- Ticket Info -->
                    <div class="ticket-info bg-dark p-3 rounded mb-4">
                        <h6 class="text-white mb-3">Detail Tiket</h6>
                        <p class="mb-2"><strong>No. Tiket:</strong> {{ $registration->qr_code }}</p>
                        <p class="mb-2"><strong>Nama:</strong> {{ $registration->name }}</p>
                        <p class="mb-2"><strong>Email:</strong> {{ $registration->email }}</p>
                        <p class="mb-2"><strong>Event:</strong> {{ $registration->event->name }}</p>
                        <p class="mb-0"><strong>Tanggal:</strong> 
                            {{ \Carbon\Carbon::parse($registration->event->event_date)->format('d M Y H:i') }}
                        </p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="javascript:window.history.back()" class="btn btn-secondary px-4">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <button onclick="window.print()" class="btn btn-primary px-4">
                            <i class="fas fa-print me-2"></i>Print
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection