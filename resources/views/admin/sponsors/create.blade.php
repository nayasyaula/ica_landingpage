@extends('layouts.admin')

@section('title', 'Tambah Sponsor')

@section('content')
<div class="admin-dashboard-container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="admin-table-card">
                <div class="card-header-luxury">
                    <h5 class="card-title-luxury text-center">
                        <i class="fas fa-plus me-2"></i>Tambah Sponsor Baru
                    </h5>
                </div>
                <div class="card-body-luxury">
                    <form action="{{ route('admin.sponsors.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group-luxury">
                            <label class="form-label">Nama Sponsor *</label>
                            <input type="text" name="name" class="form-control-luxury" value="{{ old('name') }}" required
                                   placeholder="Masukkan nama sponsor">
                            @error('name') <small class="error-message">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group-luxury">
                            <label class="form-label">Tier Sponsor *</label>
                            <select name="tier" class="form-control-luxury" required>
                                <option value="">Pilih Tier Sponsor</option>
                                <option value="platinum" {{ old('tier') == 'platinum' ? 'selected' : '' }}>Platinum</option>
                                <option value="gold" {{ old('tier') == 'gold' ? 'selected' : '' }}>Gold</option>
                                <option value="silver" {{ old('tier') == 'silver' ? 'selected' : '' }}>Silver</option>
                                <option value="bronze" {{ old('tier') == 'bronze' ? 'selected' : '' }}>Bronze</option>
                            </select>
                            @error('tier') <small class="error-message">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group-luxury">
                            <label class="form-label">Logo Sponsor *</label>
                            <input type="file" name="logo" class="form-control-luxury" accept="image/*" required>
                            @error('logo') <small class="error-message">{{ $message }}</small> @enderror
                            <small class="text-muted">Format: JPEG, PNG, JPG, GIF (Maksimal 2MB)</small>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn-admin-action flex-fill">
                                <i class="fas fa-save me-2"></i>Simpan Sponsor
                            </button>
                            <a href="{{ route('admin.sponsors.index') }}" class="btn-auth-outline">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection