

<?php $__env->startSection('title', 'Edit Sponsor'); ?>

<?php $__env->startSection('content'); ?>
<div class="admin-dashboard-container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-6">
            <!-- Page Header -->
            <div class="admin-header mb-4">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="admin-title mb-2">
                            <i class="fas fa-handshake me-3"></i>Edit Sponsor
                        </h1>
                        <p class="admin-subtitle mb-0">Update data sponsor <?php echo e($sponsor->name); ?></p>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="admin-table-card">
                <div class="card-header-luxury p-4">
                    <h5 class="card-title-luxury text-center mb-0 fw-semibold">
                        <i class="fas fa-edit me-3"></i>Form Edit Sponsor
                    </h5>
                </div>
                <div class="card-body-luxury p-4">
                    <form action="<?php echo e(route('admin.sponsors.update', $sponsor)); ?>" method="POST" enctype="multipart/form-data" id="sponsorForm">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        
                        <!-- Nama Sponsor -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold mb-3">
                                Nama Sponsor <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   class="form-control form-control-lg <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   value="<?php echo e(old('name', $sponsor->name)); ?>" 
                                   required
                                   placeholder="Masukkan nama sponsor">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-circle me-1"></i><?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Tier Sponsor -->
                        <div class="mb-4">
                            <label for="tier" class="form-label fw-semibold mb-3">
                                Tier Sponsor <span class="text-danger">*</span>
                            </label>
                            <select name="tier" 
                                    id="tier"
                                    class="form-select form-select-lg <?php $__errorArgs = ['tier'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    required>
                                <option value="">Pilih Tier Sponsor</option>
                                <option value="platinum" <?php echo e(old('tier', $sponsor->tier) == 'platinum' ? 'selected' : ''); ?> data-color="bg-light text-dark">
                                    Platinum
                                </option>
                                <option value="gold" <?php echo e(old('tier', $sponsor->tier) == 'gold' ? 'selected' : ''); ?> data-color="bg-warning text-dark">
                                    Gold
                                </option>
                                <option value="silver" <?php echo e(old('tier', $sponsor->tier) == 'silver' ? 'selected' : ''); ?> data-color="bg-secondary">
                                    Silver
                                </option>
                                <option value="bronze" <?php echo e(old('tier', $sponsor->tier) == 'bronze' ? 'selected' : ''); ?> data-color="bg-danger">
                                    Bronze
                                </option>
                            </select>
                            <?php $__errorArgs = ['tier'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-circle me-1"></i><?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Logo Sponsor -->
                        <div class="mb-4">
                            <label for="logo" class="form-label fw-semibold mb-3">
                                Logo Sponsor
                            </label>

                            <!-- Current Logo Preview -->
                            <?php if($sponsor->logo && Storage::disk('public')->exists($sponsor->logo)): ?>
                                <div class="current-logo-preview mb-3">
                                    <p class="text-muted mb-2">Logo Saat Ini:</p>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="<?php echo e(Storage::url($sponsor->logo)); ?>" 
                                             alt="<?php echo e($sponsor->name); ?>" 
                                             class="img-thumbnail current-logo">
                                        <div class="flex-grow-1">
                                            <small class="text-muted d-block">
                                                <i class="fas fa-info-circle me-1"></i>
                                                Kosongkan jika tidak ingin mengubah logo
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-warning mb-3">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    Sponsor ini belum memiliki logo
                                </div>
                            <?php endif; ?>

                            <input type="file" 
                                   name="logo" 
                                   id="logo"
                                   class="form-control form-control-lg <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   accept="image/*"
                                   onchange="previewImage(this)">
                            <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-circle me-1"></i><?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <small class="text-muted mt-2 d-block">
                                <i class="fas fa-info-circle me-1"></i>
                                Format: JPEG, PNG, JPG, GIF (Maksimal 2MB). Rekomendasi: 300x300px
                            </small>
                            
                            <!-- New Image Preview -->
                            <div id="imagePreview" class="mt-3 text-center" style="display: none;">
                                <p class="text-muted mb-2">Preview Logo Baru:</p>
                                <img id="preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-3 mt-5 pt-3">
                            <button type="submit" class="btn-admin-action flex-fill">
                                <i class="fas fa-save me-2"></i>Update Sponsor
                            </button>
                            <a href="<?php echo e(route('admin.sponsors.index')); ?>" class="btn btn-outline-secondary btn-lg py-3 px-4">
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
        
        // File validation (jika ada file yang diupload)
        if (logoInput.files.length > 0) {
            const file = logoInput.files[0];
            const maxSize = 2 * 1024 * 1024; // 2MB
            
            if (file.size > maxSize) {
                valid = false;
                alert('Ukuran file terlalu besar. Maksimal 2MB.');
                logoInput.classList.add('is-invalid');
            } else {
                logoInput.classList.remove('is-invalid');
            }
        }
        
        if (!valid) {
            e.preventDefault();
            alert('Harap periksa kembali data yang diisi.');
        }
    });

    // Show current tier in select
    const tierSelect = document.getElementById('tier');
    if (tierSelect) {
        tierSelect.value = '<?php echo e(old('tier', $sponsor->tier)); ?>';
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/admin/sponsors/edit.blade.php ENDPATH**/ ?>