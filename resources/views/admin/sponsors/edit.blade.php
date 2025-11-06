@extends('layouts.admin')

@section('title', 'Edit Sponsor')

@section('content')
<div class="admin-dashboard-container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="admin-table-card">
                <div class="card-header-luxury">
                    <h5 class="card-title-luxury text-center">
                        <i class="fas fa-edit me-2"></i>Edit Sponsor
                    </h5>
                </div>
                <div class="card-body-luxury">
                    <form action="{{ route('admin.sponsors.update', $sponsor) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group-luxury">
                            <label class="form-label">Nama Sponsor *</label>
                            <input type="text" name="name" class="form-control-luxury" value="{{ old('name', $sponsor->name) }}" required>
                            @error('name') <small class="error-message">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group-luxury">
                            <label class="form-label">Tier Sponsor *</label>
                            <select name="tier" class="form-control-luxury" required>
                                <option value="platinum" {{ old('tier', $sponsor->tier) == 'platinum' ? 'selected' : '' }}>Platinum</option>
                                <option value="gold" {{ old('tier', $sponsor->tier) == 'gold' ? 'selected' : '' }}>Gold</option>
                                <option value="silver" {{ old('tier', $sponsor->tier) == 'silver' ? 'selected' : '' }}>Silver</option>
                                <option value="bronze" {{ old('tier', $sponsor->tier) == 'bronze' ? 'selected' : '' }}>Bronze</option>
                            </select>
                            @error('tier') <small class="error-message">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group-luxury">
                            <label class="form-label">Logo Sponsor</label>
                            
                            <!-- Current Logo Preview -->
                            @if($sponsor->logo)
                                <div class="mb-3">
                                    <p class="text-gold mb-1">Logo Saat Ini:</p>
                                    <img src="{{ Storage::url($sponsor->logo) }}" 
                                         alt="{{ $sponsor->name }}" 
                                         style="width: 100px; height: 100px; object-fit: contain; border-radius: 8px; background: #f8f9fa;">
                                </div>
                            @endif

                            <input type="file" name="logo" class="form-control-luxury" accept="image/*">
                            @error('logo') <small class="error-message">{{ $message }}</small> @enderror
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah logo</small>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn-admin-action flex-fill">
                                <i class="fas fa-save me-2"></i>Update Sponsor
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