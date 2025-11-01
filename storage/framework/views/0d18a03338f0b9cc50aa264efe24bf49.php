

<?php $__env->startSection('content'); ?>
    <section class="min-h-screen py-20 gold-pattern">
        <div class="max-w-4xl mx-auto px-4">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <div class="logo-gold-outline inline-block mb-6">
                    <img src="<?php echo e(asset('images/logo-ICA.png')); ?>" alt="Indonesian Cat Association Logo" class="logo-glow">
                </div>
                <h2 class="section-title text-4xl md:text-5xl text-white mb-4">QR Code Scanner</h2>
                <p class="text-xl text-gray-300 luxury-text max-w-2xl mx-auto">
                    Scan participant QR codes for event check-in and verification
                </p>
            </div>

            <!-- Scanner Card -->
            <div class="card-luxury rounded-xl overflow-hidden">
                <div class="p-1 bg-gradient-to-r from-gold-400 to-gold-600">
                    <div class="bg-dark-gray p-8 rounded-xl">
                        <!-- Scanner Header -->
                        <div class="text-center mb-8">
                            <div class="flex items-center justify-center mb-4">
                                <div class="icon-circle">
                                    <i class="fas fa-qrcode text-gold-400 text-2xl"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-white luxury-heading mb-2">Event Check-in Scanner</h3>
                            <p class="text-gray-300 luxury-text">Position the QR code within the frame to scan</p>
                        </div>

                        <!-- Scanner Container -->
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div id="reader" class="rounded-lg overflow-hidden border-2 border-gold-400 bg-black">
                                </div>
                                <div
                                    class="absolute inset-0 border-2 border-transparent rounded-lg pointer-events-none scanner-overlay">
                                </div>
                            </div>
                        </div>

                        <!-- Instructions -->
                        <div class="bg-gold-400 bg-opacity-10 border border-gold-400 border-opacity-30 rounded-lg p-4 mb-6">
                            <div class="flex items-start">
                                <i class="fas fa-info-circle text-gold-400 mr-3 mt-1 text-lg"></i>
                                <div>
                                    <h4 class="text-gold-300 luxury-heading text-lg mb-2">Scanning Instructions</h4>
                                    <ul class="text-gold-200 luxury-text text-sm space-y-1">
                                        <li>• Ensure good lighting for better scanning</li>
                                        <li>• Hold the QR code steady within the frame</li>
                                        <li>• Keep the QR code at a reasonable distance</li>
                                        <li>• Wait for the confirmation sound</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Result Display -->
                        <div id="result" class="transition-all duration-500 ease-in-out"></div>

                        <!-- Manual Check-in Option -->
                        <div class="text-center mt-8 pt-6 border-t border-medium-gray">
                            <p class="text-gray-400 luxury-text mb-4">Having trouble with QR code?</p>
                            <button
                                class="border border-gold-400 text-gold-400 px-6 py-3 rounded-lg font-semibold inline-flex items-center hover:bg-gold-400 hover:text-black transition-colors cursor-not-allowed opacity-50">
                                <i class="fas fa-keyboard mr-2"></i> Manual Check-in (Coming Soon)
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Information -->
            <div class="grid md:grid-cols-3 gap-6 mt-8">
                <div class="bg-dark-gray border border-medium-gray rounded-lg p-4 text-center">
                    <i class="fas fa-users text-gold-400 text-2xl mb-2"></i>
                    <h4 class="text-white luxury-heading mb-1">Total Check-ins</h4>
                    <p class="text-gold-300 text-2xl font-bold" id="totalCheckins">0</p>
                </div>
                <div class="bg-dark-gray border border-medium-gray rounded-lg p-4 text-center">
                    <i class="fas fa-check-circle text-green-400 text-2xl mb-2"></i>
                    <h4 class="text-white luxury-heading mb-1">Successful</h4>
                    <p class="text-green-400 text-2xl font-bold" id="successfulScans">0</p>
                </div>
                <div class="bg-dark-gray border border-medium-gray rounded-lg p-4 text-center">
                    <i class="fas fa-exclamation-triangle text-yellow-400 text-2xl mb-2"></i>
                    <h4 class="text-white luxury-heading mb-1">Failed</h4>
                    <p class="text-yellow-400 text-2xl font-bold" id="failedScans">0</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Include HTML5 QR Code Scanner -->
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
    <script>
        let html5QrcodeScanner;
        let totalScans = 0;
        let successfulScans = 0;
        let failedScans = 0;

        function updateStats() {
            document.getElementById('totalCheckins').textContent = totalScans;
            document.getElementById('successfulScans').textContent = successfulScans;
            document.getElementById('failedScans').textContent = failedScans;
        }

        function playSuccessSound() {
            // Simple beep sound for success
            const audioContext = new(window.AudioContext || window.webkitAudioContext)();
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();

            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);

            oscillator.frequency.value = 800;
            oscillator.type = 'sine';

            gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.5);

            oscillator.start(audioContext.currentTime);
            oscillator.stop(audioContext.currentTime + 0.5);
        }

        function playErrorSound() {
            // Simple beep sound for error
            const audioContext = new(window.AudioContext || window.webkitAudioContext)();
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();

            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);

            oscillator.frequency.value = 400;
            oscillator.type = 'sine';

            gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.8);

            oscillator.start(audioContext.currentTime);
            oscillator.stop(audioContext.currentTime + 0.8);
        }

        function onScanSuccess(decodedText, decodedResult) {
            // Stop scanner temporarily
            if (html5QrcodeScanner) {
                html5QrcodeScanner.pause();
            }

            totalScans++;

            // Show loading state
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = `
            <div class="bg-dark-gray border border-gold-400 rounded-lg p-6 text-center">
                <div class="loading mx-auto mb-4"></div>
                <h4 class="text-gold-300 luxury-heading mb-2">Verifying QR Code...</h4>
                <p class="text-gray-300 luxury-text">Please wait while we process your check-in</p>
            </div>
        `;

            // Kirim QR code ke server untuk verifikasi
            fetch("<?php echo e(route('scan.verify')); ?>", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    },
                    body: JSON.stringify({
                        qr_code: decodedText
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        playSuccessSound();
                        successfulScans++;

                        resultDiv.innerHTML = `
                    <div class="bg-green-900 border border-green-600 rounded-lg p-6">
                        <div class="flex items-center justify-center mb-4">
                            <i class="fas fa-check-circle text-green-400 text-4xl"></i>
                        </div>
                        <h4 class="text-green-300 luxury-heading text-2xl text-center mb-4">Check-in Successful!</h4>
                        
                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div class="bg-black bg-opacity-30 rounded-lg p-3">
                                <p class="text-green-200 luxury-text text-sm mb-1">Participant Name</p>
                                <p class="text-white luxury-heading">${data.data.name}</p>
                            </div>
                            <div class="bg-black bg-opacity-30 rounded-lg p-3">
                                <p class="text-green-200 luxury-text text-sm mb-1">Email</p>
                                <p class="text-white luxury-heading text-sm">${data.data.email}</p>
                            </div>
                        </div>
                        
                        <div class="bg-black bg-opacity-30 rounded-lg p-3">
                            <p class="text-green-200 luxury-text text-sm mb-1">Event</p>
                            <p class="text-white luxury-heading">${data.data.event}</p>
                        </div>
                        
                        <div class="mt-4 pt-4 border-t border-green-600">
                            <p class="text-green-300 luxury-text text-center">
                                <i class="fas fa-clock mr-2"></i>
                                Checked in at: ${new Date().toLocaleTimeString()}
                            </p>
                        </div>
                    </div>
                `;
                    } else {
                        playErrorSound();
                        failedScans++;

                        resultDiv.innerHTML = `
                    <div class="bg-red-900 border border-red-600 rounded-lg p-6">
                        <div class="flex items-center justify-center mb-4">
                            <i class="fas fa-times-circle text-red-400 text-4xl"></i>
                        </div>
                        <h4 class="text-red-300 luxury-heading text-2xl text-center mb-4">Check-in Failed</h4>
                        <p class="text-red-200 luxury-text text-center">${data.message}</p>
                        <div class="mt-4 bg-black bg-opacity-30 rounded-lg p-3">
                            <p class="text-red-300 luxury-text text-sm text-center">
                                Scanned Code: ${decodedText}
                            </p>
                        </div>
                    </div>
                `;
                    }

                    updateStats();

                    // Resume scanner setelah 4 detik
                    setTimeout(() => {
                        resultDiv.innerHTML = '';
                        if (html5QrcodeScanner) {
                            html5QrcodeScanner.resume();
                        }
                    }, 4000);
                })
                .catch(error => {
                    console.error('Error:', error);
                    failedScans++;
                    updateStats();

                    resultDiv.innerHTML = `
                <div class="bg-red-900 border border-red-600 rounded-lg p-6">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-exclamation-triangle text-red-400 text-4xl"></i>
                    </div>
                    <h4 class="text-red-300 luxury-heading text-2xl text-center mb-4">Network Error</h4>
                    <p class="text-red-200 luxury-text text-center">Please check your connection and try again</p>
                </div>
            `;

                    setTimeout(() => {
                        resultDiv.innerHTML = '';
                        if (html5QrcodeScanner) {
                            html5QrcodeScanner.resume();
                        }
                    }, 3000);
                });
        }

        function onScanFailure(error) {
            // Handle scan failure, if needed
            console.log('Scan failed:', error);
        }

        function initScanner() {
            const config = {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                },
                rememberLastUsedCamera: true,
                supportedScanTypes: [
                    Html5QrcodeScanType.SCAN_TYPE_QR_CODE,
                    Html5QrcodeScanType.SCAN_TYPE_CODE_128,
                    Html5QrcodeScanType.SCAN_TYPE_CODE_39
                ]
            };

            html5QrcodeScanner = new Html5QrcodeScanner(
                "reader",
                config,
                false
            );

            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        }

        // Initialize scanner ketika halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            initScanner();
            updateStats();
        });

        // Clean up when leaving page
        window.addEventListener('beforeunload', function() {
            if (html5QrcodeScanner) {
                html5QrcodeScanner.clear();
            }
        });
    </script>

    <style>
        .gold-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23d4af37' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        .card-luxury {
            background: linear-gradient(145deg, var(--dark-gray), var(--black));
            border: 1px solid var(--medium-gray);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card-luxury::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--gold), var(--light-gold), var(--gold));
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--dark-gray), var(--black));
            border: 2px solid var(--gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .scanner-overlay {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                border-color: transparent;
            }

            50% {
                border-color: var(--gold);
            }
        }

        .loading {
            display: inline-block;
            width: 40px;
            height: 40px;
            border: 4px solid rgba(212, 175, 55, 0.3);
            border-radius: 50%;
            border-top-color: var(--gold);
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Custom color utilities */
        .text-gold-200 {
            color: #f5e8c8;
        }

        .text-gold-300 {
            color: #e6c875;
        }

        .text-gold-400 {
            color: #d4af37;
        }

        .bg-gold-400 {
            background-color: #d4af37;
        }

        .border-gold-400 {
            border-color: #d4af37;
        }

        /* HTML5 QR Scanner Customization */
        #reader {
            border: none !important;
            background: black !important;
        }

        #reader video {
            border-radius: 8px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            #reader {
                width: 100% !important;
            }

            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/scan/index.blade.php ENDPATH**/ ?>