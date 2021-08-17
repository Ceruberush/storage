

<?php $__env->startSection('title'); ?>
    Store Dashboard Product Detail
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Section Content -->
          <div
            class="section-content section-dashboard_home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboaard-heading">
                <h2 class="dashboard-title">Create New Product</h2>
                <p class="dashboard-subtitle">Create your own product</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('dashboard-product-store')); ?>" method="POST" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="users_id" value="<?php echo e(Auth::user()->id); ?>">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="name" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price" />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Category</label>
                                <select name="categories_id" class="form-control">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="editor"></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Thumbnails</label>
                                <input type="file" name="photo" class="form-control" />
                                <p class="text-muted">
                                  Kamu dapat memilih dari satu file
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                  <div class="col text-right">
                      <button
                          type="submit"
                          class="btn btn-success px-5"
                          >
                            Save Now
                      </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace("editor");
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bwastore-laravel\resources\views/pages/dashboard-products-create.blade.php ENDPATH**/ ?>