@extends('layouts.admin')

@section('title', 'Kelola Sponsor')

@section('content')
<div class="admin-dashboard-container">
    <!-- Page Header -->
    <div class="admin-header mb-4">
        <h1 class="admin-title">
            <i class="fas fa-handshake me-2"></i>Kelola Sponsor
        </h1>
        <p class="admin-subtitle">Tambah dan kelola sponsor untuk ditampilkan di website</p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Action Button -->
    <div class="row justify-content-center mb-4">
        <div class="col-12 col-lg-8">
            <div class="text-center">
                <a href="{{ route('admin.sponsors.create') }}" class="btn-admin-action">
                    <i class="fas fa-plus me-2"></i>Tambah Sponsor Baru
                </a>
            </div>
        </div>
    </div>

    <!-- Sponsors List -->
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="admin-table-card">
                <div class="card-header-luxury">
                    <h5 class="card-title-luxury text-center">
                        <i class="fas fa-list me-2"></i>Daftar Sponsor
                    </h5>
                </div>
                <div class="card-body-luxury">
                    @if($sponsors->count() > 0)
                        <div class="table-responsive">
                            <table class="table-admin">
                                <thead>
                                    <tr>
                                        <th>Logo</th>
                                        <th>Nama Sponsor</th>
                                        <th>Tier</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sponsors as $sponsor)
                                        <tr>
                                            <td>
                                                @if($sponsor->logo && Storage::disk('public')->exists($sponsor->logo))
                                                    <img src="{{ Storage::url($sponsor->logo) }}" 
                                                         alt="{{ $sponsor->name }}" 
                                                         style="width: 60px; height: 60px; object-fit: contain; border-radius: 8px; background: #f8f9fa;"
                                                         onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjYwIiBoZWlnaHQ9IjYwIiByeD0iOCIgZmlsbD0iIzFBMUEyMCIvPgo8dGV4dCB4PSIzMCIgeT0iMzUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxNCIgZmlsbD0iI0Q0QUYzNyIgdGV4dC1hbmNob3I9Im1pZGRsZSI+TG9nbzwvdGV4dD4KPC9zdmc+'">
                                                @else
                                                    <div style="width: 60px; height: 60px; background: #1A1A20; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #D4AF37; font-size: 0.8rem; border: 1px solid rgba(212, 175, 55, 0.3);">
                                                        <i class="fas fa-image"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="user-name">{{ $sponsor->name }}</td>
                                            <td>
                                                <span class="badge 
                                                    @if($sponsor->tier == 'platinum') bg-primary
                                                    @elseif($sponsor->tier == 'gold') bg-warning text-dark
                                                    @elseif($sponsor->tier == 'silver') bg-secondary
                                                    @else bg-danger @endif">
                                                    {{ $sponsor->tier_label }}
                                                </span>
                                            </td>
                                            <td class="action-buttons">
                                                <a href="{{ route('admin.sponsors.edit', $sponsor) }}" class="btn-table-view me-1">
                                                    <i class="fas fa-edit me-1"></i>Edit
                                                </a>
                                                <form action="{{ route('admin.sponsors.destroy', $sponsor) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-table-view btn-danger" 
                                                            onclick="return confirm('Hapus sponsor {{ $sponsor->name }}?')">
                                                        <i class="fas fa-trash me-1"></i>Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-handshake fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada sponsor</h5>
                            <p class="text-muted">Mulai dengan menambahkan sponsor pertama Anda</p>
                            <a href="{{ route('admin.sponsors.create') }}" class="btn-admin-action mt-3">
                                <i class="fas fa-plus me-2"></i>Tambah Sponsor Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Fallback untuk gambar yang error
document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('img');
    images.forEach(img => {
        img.addEventListener('error', function() {
            this.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjYwIiBoZWlnaHQ9IjYwIiByeD0iOCIgZmlsbD0iIzFBMUEyMCIvPgo8dGV4dCB4PSIzMCIgeT0iMzUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxNCIgZmlsbD0iI0Q0QUYzNyIgdGV4dC1hbmNob3I9Im1pZGRsZSI+TG9nbzwvdGV4dD4KPC9zdmc+';
        });
    });
});
</script>
@endsection