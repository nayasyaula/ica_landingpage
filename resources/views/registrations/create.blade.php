@extends('layouts.app-registration')

@section('content')
    <section class="min-h-screen py-16 paw-pattern flex justify-center">
        <div class="max-w-4xl mx-auto px-4 w-full mt-16">
            <div class="flex justify-center">
                <div class="w-full max-w-lg">
                    <!-- Header Section -->
                    <div class="text-center mb-8">
                        <h2 class="section-title text-3xl md:text-4xl text-white mb-3">Pendaftaran Acara</h2>
                    </div>

                    <!-- Event Info Card -->
                    <div class="card-luxury rounded-lg mb-6">
                        <div class="p-5">
                            <div class="mb-3">
                                <h3 class="text-xl font-bold text-white luxury-heading">{{ $event->name }}</h3>
                            </div>
                            <div class="grid md:grid-cols-2 gap-3 text-gray-300">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-day text-gold-400 mr-2 w-4"></i>
                                    <span class="luxury-text text-sm">28 - 30 November 2025</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-gold-400 mr-2 w-4"></i>
                                    <span class="luxury-text text-sm">{{ $event->location }}</span>
                                </div>
                            </div>
                            @if ($event->description)
                                <div class="mt-3 pt-3 border-t border-medium-gray">
                                    <p class="text-gray-300 luxury-text text-sm">{{ $event->description }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Registration Form -->
                    <div class="card-luxury rounded-lg">
                        <div class="p-1 bg-gradient-to-r from-gold-400 to-gold-600 rounded-lg">
                            <div class="bg-dark-gray p-6 rounded-lg">
                                <div class="mb-4">
                                    <h3 class="text-xl font-bold text-white luxury-heading mb-1">Formulir Pendaftaran</h3>
                                    <p class="text-gray-300 luxury-text text-sm">Harap isi detail Anda dengan akurat</p>
                                </div>

                                @if ($errors->any())
                                    <div class="mb-4 bg-red-900 border border-red-700 text-red-100 px-4 py-3 rounded-lg text-sm">
                                        <div class="flex items-center mb-1">
                                            <i class="fas fa-exclamation-circle text-red-300 mr-2 text-lg"></i>
                                            <span class="font-semibold">Harap perbaiki kesalahan berikut:</span>
                                        </div>
                                        <ul class="list-disc list-inside space-y-1 luxury-text">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('registrations.store', $event) }}" class="space-y-4">
                                    @csrf

                                    <!-- Name -->
                                    <div class="form-group">
                                        <label for="name"
                                            class="form-label luxury-heading text-white mb-1 block text-sm">Nama</label>
                                        <div class="relative">
                                            <i
                                                class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gold-400 text-sm"></i>
                                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                                class="form-luxury-input w-full pl-10 pr-3 py-3 rounded-md text-sm"
                                                placeholder="Masukkan nama Anda" required>
                                        </div>
                                        @error('name')
                                            <p class="text-red-400 luxury-text mt-1 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email"
                                            class="form-label luxury-heading text-white mb-1 block text-sm">Email</label>
                                        <div class="relative">
                                            <i
                                                class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gold-400 text-sm"></i>
                                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                                class="form-luxury-input w-full pl-10 pr-3 py-3 rounded-md text-sm"
                                                placeholder="Masukkan alamat email Anda" required>
                                        </div>
                                        @error('email')
                                            <p class="text-red-400 luxury-text mt-1 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Phone -->
                                    <div class="form-group">
                                        <label for="phone" class="form-label luxury-heading text-white mb-1 block text-sm">Nomor
                                            Handphone</label>
                                        <div class="relative">
                                            <i
                                                class="fas fa-phone absolute left-3 top-1/2 transform -translate-y-1/2 text-gold-400 text-sm"></i>
                                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                                class="form-luxury-input w-full pl-10 pr-3 py-3 rounded-md text-sm"
                                                placeholder="Masukkan nomor telepon Anda" required>
                                        </div>
                                        @error('phone')
                                            <p class="text-red-400 luxury-text mt-1 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Custom Dropdown -->
                                    <div class="form-group">
                                        <label class="form-label luxury-heading text-white mb-1 block text-sm">Jabatan /
                                            Posisi</label>
                                        <div class="custom-select">
                                            <div class="select-selected text-sm">Pilih Jabatan/Posisi</div>
                                            <div class="select-items hidden">
                                                <div data-value="Owner">Owner</div>
                                                <div data-value="Director">Director</div>
                                                <div data-value="Manager">Manager</div>
                                                <div data-value="Supervisor">Supervisor</div>
                                                <div data-value="Staff">Staff</div>
                                                <div data-value="Veterinarian">Veterinarian</div>
                                                <div data-value="Breeder">Breeder</div>
                                                <div data-value="Groomer">Groomer</div>
                                                <div data-value="Trainer">Trainer</div>
                                                <div data-value="Other">Lainnya</div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="position" id="position">
                                        @error('position')
                                            <p class="text-red-400 luxury-text mt-1 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Lainnya -->
                                    <div class="form-group" id="otherPositionField" style="display: none;">
                                        <label for="other_position"
                                            class="form-label luxury-heading text-white mb-1 block text-sm">Jabatan Lainnya</label>
                                        <div class="relative">
                                            <i
                                                class="fas fa-edit absolute left-3 top-1/2 transform -translate-y-1/2 text-gold-400 text-sm"></i>
                                            <input type="text" id="other_position" name="other_position"
                                                value="{{ old('other_position') }}"
                                                class="form-luxury-input w-full pl-10 pr-3 py-3 rounded-md text-sm"
                                                placeholder="Tuliskan jabatan/posisi Anda">
                                        </div>
                                    </div>

                                    <!-- Catatan -->
                                    <div
                                        class="bg-gold-400 bg-opacity-10 border border-gold-400 border-opacity-30 rounded-md p-3 text-sm">
                                        <div class="flex items-start">
                                            <i class="fas fa-info-circle text-gold-400 mr-2 mt-0.5 text-sm"></i>
                                            <p class="text-black luxury-text">
                                                Detail pendaftaran Anda akan diverifikasi. Pastikan semua informasi akurat.
                                                Anda akan menerima email konfirmasi setelah pendaftaran berhasil.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Tombol -->
                                    <div class="flex flex-col sm:flex-row gap-3 pt-3">
                                        <button type="submit"
                                            class="btn-gold flex-1 py-3 rounded-md font-semibold text-sm transition-all duration-300 hover:shadow-lg">
                                            <i class="fas fa-paper-plane mr-1"></i> Kirim
                                        </button>
                                        <a href="{{ url()->previous() }}"
                                            class="border border-gold-400 text-gold-400 px-6 py-3 rounded-md font-semibold text-center hover:bg-gold-400 hover:text-white transition-colors no-underline text-sm">
                                            <i class="fas fa-arrow-left mr-1"></i> Kembali
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectSelected = document.querySelector('.select-selected');
            const selectItems = document.querySelector('.select-items');
            const hiddenInput = document.getElementById('position');
            const otherPositionField = document.getElementById('otherPositionField');
            const otherPositionInput = document.getElementById('other_position');

            selectSelected.addEventListener('click', () => {
                selectItems.classList.toggle('hidden');
                selectSelected.classList.toggle('active');
            });

            selectItems.querySelectorAll('div').forEach(item => {
                item.addEventListener('click', () => {
                    const value = item.getAttribute('data-value');
                    const text = item.textContent;

                    selectSelected.textContent = text;
                    hiddenInput.value = value;
                    selectItems.classList.add('hidden');
                    selectSelected.classList.remove('active');

                    if (value === 'Other') {
                        otherPositionField.style.display = 'block';
                        otherPositionInput.setAttribute('required', 'required');
                    } else {
                        otherPositionField.style.display = 'none';
                        otherPositionInput.removeAttribute('required');
                        otherPositionInput.value = '';
                    }
                });
            });

            document.addEventListener('click', (e) => {
                if (!e.target.closest('.custom-select')) {
                    selectItems.classList.add('hidden');
                    selectSelected.classList.remove('active');
                }
            });

            @if (old('position'))
                const oldValue = "{{ old('position') }}";
                hiddenInput.value = oldValue;
                selectSelected.textContent = oldValue;
                if (oldValue === 'Other') {
                    otherPositionField.style.display = 'block';
                    otherPositionInput.setAttribute('required', 'required');
                }
            @endif
    });
    </script>
@endsection