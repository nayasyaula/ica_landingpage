

<?php $__env->startSection('title', 'Tambah Sponsor'); ?>

<?php $__env->startSection('content'); ?>
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
                    <form action="<?php echo e(route('admin.sponsors.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        
                        <div class="form-group-luxury">
                            <label class="form-label">Nama Sponsor *</label>
                            <input type="text" name="name" class="form-control-luxury" value="<?php echo e(old('name')); ?>" required
                                   placeholder="Masukkan nama sponsor">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="error-message"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group-luxury">
                            <label class="form-label">Tier Sponsor *</label>
                            <select name="tier" class="form-control-luxury" required>
                                <option value="">Pilih Tier Sponsor</option>
                                <option value="platinum" <?php echo e(old('tier') == 'platinum' ? 'selected' : ''); ?>>Platinum</option>
                                <option value="gold" <?php echo e(old('tier') == 'gold' ? 'selected' : ''); ?>>Gold</option>
                                <option value="silver" <?php echo e(old('tier') == 'silver' ? 'selected' : ''); ?>>Silver</option>
                                <option value="bronze" <?php echo e(old('tier') == 'bronze' ? 'selected' : ''); ?>>Bronze</option>
                            </select>
                            <?php $__errorArgs = ['tier'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="error-message"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group-luxury">
                            <label class="form-label">Logo Sponsor *</label>
                            <input type="file" name="logo" class="form-control-luxury" accept="image/*" required>
                            <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="error-message"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <small class="text-muted">Format: JPEG, PNG, JPG, GIF (Maksimal 2MB)</small>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn-admin-action flex-fill">
                                <i class="fas fa-save me-2"></i>Simpan Sponsor
                            </button>
                            <a href="<?php echo e(route('admin.sponsors.index')); ?>" class="btn-auth-outline">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/admin/sponsors/create.blade.php ENDPATH**/ ?>