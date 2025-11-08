@extends('layouts.admin')

@section('title', 'Tambah Sponsor')

@section('content')
<div class="admin-dashboard-container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-6">
            <!-- Page Header -->
            <div class="admin-header mb-4">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="admin-title mb-2">
                            <i class="fas fa-handshake me-3"></i>Tambah Sponsor Baru
                        </h1>
                        <p class="admin-subtitle mb-0">Tambahkan sponsor baru untuk ditampilkan di website</p>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="admin-table-card">
                <div class="card-header-luxury p-4">
                    <h5 class="card-title-luxury text-center mb-0 fw-semibold">
                        <i class="fas fa-plus-circle me-3"></i>Form Tambah Sponsor
                    </h5>
                </div>
                <div class="card-body-luxury p-4">
                    <form action="{{ route('admin.sponsors.store') }}" method="POST" enctype="multipart/form-data" id="sponsorForm">
                        @csrf
                        
                        <!-- Nama Sponsor -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold mb-3">
                                Nama Sponsor <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   value="{{ old('name') }}" 
                                   required
                                   placeholder="Masukkan nama sponsor">
                            @error('name')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Tier Sponsor -->
                        <div class="mb-4">
                            <label for="tier" class="form-label fw-semibold mb-3">
                                Tier Sponsor <span class="text-danger">*</span>
                            </label>
                            <select name="tier" 
                                    id="tier"
                                    class="form-select form-select-lg @error('tier') is-invalid @enderror" 
                                    required>
                                <option value="">Pilih Tier Sponsor</option>
                                <option value="platinum" {{ old('tier') == 'platinum' ? 'selected' : '' }} data-color="bg-light text-dark">
                                    Platinum
                                </option>
                                <option value="gold" {{ old('tier') == 'gold' ? 'selected' : '' }} data-color="bg-warning text-dark">
                                    Gold
                                </option>
                                <option value="silver" {{ old('tier') == 'silver' ? 'selected' : '' }} data-color="bg-secondary">
                                    Silver
                                </option>
                                <option value="bronze" {{ old('tier') == 'bronze' ? 'selected' : '' }} data-color="bg-danger">
                                    Bronze
                                </option>
                            </select>
                            @error('tier')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Logo Sponsor -->
                        <div class="mb-4">
                            <label for="logo" class="form-label fw-semibold mb-3">
                                </i>Logo Sponsor <span class="text-danger">*</span>
                            </label>
                            <input type="file" 
                                   name="logo" 
                                   id="logo"
                                   class="form-control form-control-lg @error('logo') is-invalid @enderror" 
                                   accept="image/*" 
                                   required
                                   onchange="previewImage(this)">
                            @error('logo')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <small class="text-muted mt-2 d-block">
                                <i class="fas fa-info-circle me-1"></i>
                                Format: JPEG, PNG, JPG, GIF (Maksimal 2MB). Rekomendasi: 300x300px
                            </small>
                            
                            <!-- Image Preview -->
                            <div id="imagePreview" class="mt-3 text-center" style="display: none;">
                                <p class="text-muted mb-2">Preview Logo:</p>
                                <img id="preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-3 mt-5 pt-3">
                            <button type="submit" class="btn-admin-action flex-fill">
                                <i class="fas fa-save me-2"></i>Simpan Sponsor
                            </button>
                            <a href="{{ route('admin.sponsors.index') }}" class="btn btn-outline-secondary btn-lg py-3 px-4">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
function previewImage(input) {
    const preview = document.getElementById('preview');
    const imagePreview = document.getElementById('imagePreview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            imagePreview.style.display = 'block';
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        imagePreview.style.display = 'none';
    }
}

// Form validation
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('sponsorForm');
    const logoInput = document.getElementById('logo');
    
    form.addEventListener('submit', function(e) {
        let valid = true;
        
        // Basic validation
        const requiredFields = form.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                valid = false;
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
        });
        
        // File validation
        if (logoInput.files.length > 0) {
            const file = logoInput.files[0];
            const maxSize = 2 * 1024 * 1024; // 2MB
            
            if (file.size > maxSize) {
                valid = false;
                alert('Ukuran file terlalu besar. Maksimal 2MB.');
            }
        }
        
        if (!valid) {
            e.preventDefault();
            alert('Harap isi semua field yang wajib diisi dan pastikan file logo sesuai requirements.');
        }
    });
});
</script>
@endsection