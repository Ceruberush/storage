<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <?php echo $__env->yieldPushContent('prepend-style'); ?>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    <?php echo $__env->yieldPushContent('addon-style'); ?>
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="/images/dashboard-store-logo.svg" alt="" class="my-4" />
          </div>
          <div class="list-group list-group-flush">
            <a
              href="<?php echo e(route ('dashboard')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('dashboard')) ? 'active' : ''); ?>"
            >
              Dashboard
            </a>
            <a
              href="<?php echo e(route ('dashboard-product')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('dashboard/products*')) ? 'active' : ''); ?>"
            >
              My Products
            </a>
            <a
              href="<?php echo e(route ('dashboard-transaction')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('dashboard/transactions*')) ? 'active' : ''); ?>"
            >
              Transaction
            </a>
            <a
              href="<?php echo e(route ('dashboard-settings-store')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('dashboard/settings*')) ? 'active' : ''); ?>"
            >
              Store Settings
            </a>
            <a
              href="<?php echo e(route ('dashboard-settings-account')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('dashboard/account*')) ? 'active' : ''); ?>"
            >
              My Account
            </a>
            <a
              href="<?php echo e(route('logout')); ?>"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
              class="list-group-item list-group-item-action"
            >
              Sign Out
            </a>
          </div>
        </div>

        <!-- Page Contents -->
        <div id="page-content-wrapper">
          <nav
            class="navbar navbar-expand-lg navbar-light navbar-store fixed-top"
            data-aos="fade-down"
          >
            <div class="container-fluid">
              <button
                class="btn btn-secondary d-md-none mr-auto mr-2"
                id="menu-toggle"
              >
                &laquo; Menu
              </button>
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Desktop Menu -->
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link"
                      href="#"
                      id="navbarDropdown"
                      role="button"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <img
                        src="/images/icon-user.png"
                        alt=""
                        class="rounded-circle mr-2 profile-picture"
                      />
                      Hi, <?php echo e(Auth::user()->name); ?>

                    </a>
                    <div class="dropdown-menu">
                        <a href="<?php echo e(route('dashboard')); ?>" class="dropdown-item">Dashboard</a>
                        <a href="<?php echo e(route('dashboard-settings-account')); ?>" class="dropdown-item"
                          >Settings</a
                        >
                      <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                          </a>
                          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                          </form>
                    </div>
                  <li class="nav-item">
                      <a href="<?php echo e(route ('cart')); ?>" class="nav-link d-inline-block mt-2">
                        <?php 
                          $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                        ?>
                      <?php if($carts > 0): ?>
                          <img src="/images/icon-cart-filled.svg" alt="" />
                          <div class="card-badge"><?php echo e($carts); ?></div>
                      <?php else: ?>
                          <img src="/images/icon-cart-empty.svg" alt="" />
                      <?php endif; ?>
                    </a>
                  </li>
                </ul>

                <!-- Mobile Menu -->
                <ul class="navbar-nav d-block d-lg-none">
                  <li class="nav-item">
                    <a class="nav-link" href="#"> Hi,<?php echo e(Auth::user()->name); ?></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link d-inline-block" href="#"> Cart </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          
          <?php echo $__env->yieldContent('content'); ?>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <?php echo $__env->yieldPushContent('prepend-script'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    <?php echo $__env->yieldPushContent('addon-script'); ?>
  </body>
</html>
<?php /**PATH C:\laragon\www\bwastore-laravel\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>