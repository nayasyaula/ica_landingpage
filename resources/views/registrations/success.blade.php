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
                            <h4 class="ticket-title">
                                <i class="fas fa-qrcode me-2"></i>E-Ticket QR Code
                            </h4>
                            <small class="text-muted">Scan QR code berikut untuk check-in di venue</small>
                        </div>

                        <!-- QR Code Section -->
                        <div class="qr-section text-center py-4">
                            {!! $qrImage !!}
                        </div>

                        <!-- Ticket Details -->
                        <div class="ticket-details">
                            <div class="detail-item">
                                <span class="label">Kode Tiket</span>
                                <span class="value ticket-code">{{ $registration->qr_code }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="label">Tanggal Event</span>
                                <span class="value">28 - 30 November 2025</span>
                            </div>
                            <div class="detail-item">
                                <span class="label">Nama Peserta</span>
                                <span class="value">{{ $registration->name }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="label">Email</span>
                                <span class="value">{{ $registration->email }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="label">Telepon</span>
                                <span class="value">{{ $registration->phone }}</span>
                            </div>
                              <div class="detail-item">
                                <span class="label">Posisi/Jabatan</span> <!-- ✅ TAMBAH POSITION -->
                                <span class="value">{{ $registration->position }}</span>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="ticket-actions">
                            <button onclick="window.print()" class="btn btn-sm btn-outline-primary ticket-btn">
                                <i class="fas fa-print me-2"></i> Print Tiket
                            </button>
                            <button onclick="downloadTicket()" class="btn btn-sm btn-success ticket-btn">
                                <i class="fas fa-download me-2"></i> Download Tiket
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include html2canvas for download functionality -->
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <script>
        function downloadTicket() {
            const ticketCard = document.querySelector('.ticket-card');
            if (!ticketCard) {
                alert('Tiket tidak ditemukan!');
                return;
            }

            // Show loading
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';
            btn.disabled = true;

            html2canvas(ticketCard, {
                scale: 2,
                backgroundColor: '#ffffff',
                useCORS: true,
                logging: false
            }).then(canvas => {
                const link = document.createElement('a');
                link.download = 'E-Ticket-{{ $registration->qr_code }}.png';
                link.href = canvas.toDataURL('image/png');
                link.click();

                // Restore button
                btn.innerHTML = originalText;
                btn.disabled = false;
            }).catch(error => {
                console.error('Download error:', error);
                alert('Error downloading ticket');
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        }

        // Print styles
        function beforePrint() {
            document.body.classList.add('printing');
        }

        function afterPrint() {
            document.body.classList.remove('printing');
        }

        // Print event listeners
        if (window.matchMedia) {
            const mediaQueryList = window.matchMedia('print');
            mediaQueryList.addListener(mql => {
                if (mql.matches) {
                    beforePrint();
                } else {
                    afterPrint();
                }
            });
        }

        window.onbeforeprint = beforePrint;
        window.onafterprint = afterPrint;
    </script>

    <style>
       
    </style>
@endsection