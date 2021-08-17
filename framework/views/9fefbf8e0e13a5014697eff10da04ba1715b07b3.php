

<?php $__env->startSection('title'); ?>
    Store Dashboard Product Detail
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Shirup Marzan</h2>
                <p class="dashboard-subtitle">Product Details</p>
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
                    <form action="<?php echo e(route ('dashboard-product-update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="users_id" value="<?php echo e(Auth::user()->id); ?>">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="name">Product Name</label>
                                <input
                                  type="text"
                                  name="name"
                                  class="form-control"
                                  aria-describedby="name"
                                  name="storeName"
                                  value="Papel La Casa"
                                  value="<?php echo e($product->name); ?>"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="price">Price</label>
                                <input
                                  type="number"
                                  name="price"
                                  class="form-control"
                                  aria-describedby="price"
                                  name="price"
                                  value="200"
                                  value="<?php echo e($product->price); ?>"
                                />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Category</label>
                                <select name="categories_id" class="form-control">
                                    <option value="<?php echo e($product->categories_id); ?>">Tidak diganti <?php echo e($product->category->name); ?></option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="editor"><?php echo $product->description; ?></textarea>
                              </div>
                            </div>
                            <div class="col">
                              <button
                                type="submit"
                                class="btn btn-success btn-block px-5"
                              >
                                Update Product
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <?php $__currentLoopData = $product->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="col-md-4">
                                <div class="gallery-container">
                                  <img
                                    src="<?php echo e(Storage::url($gallery->photos ?? '')); ?>"
                                    alt=""
                                    class="w-100"
                                  />
                                  <a class="delete-gallery" href="<?php echo e(route ('dashboard-product-gallery-delete', $gallery->id)); ?>">
                                    <img src="/images/icon-delete.svg" alt="" />
                                  </a>
                                </div>
                              </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <div class="col-12">
                            <form action="<?php echo e(route('dashboard-product-gallery-upload')); ?>" method="POST" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="products_id" value="<?php echo e($product->id); ?>">
                              <input
                              type="file"
                              name="photos"
                              id="file"
                              style="display: none"
                              onchange="form.submit()"
                            />
                            <button
                              type="button"
                              class="btn btn-secondary btn-block mt-3"
                              onclick="thisFileUpload();"
                            >
                              Add Photo
                            </button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
      function thisFileUpload() {
        document.getElementById("file").click();
      }
    </script>
    <script>
      CKEDITOR.replace("editor");
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bwastore-laravel\resources\views/pages/dashboard-products-details.blade.php ENDPATH**/ ?>