<?= $this->extend('template/content') ?>

<?= $this->section('content') ?>

<!-- container -->
<div class="container-fluid">

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
  <div class="my-auto">
    <div class="d-flex">
      <h4 class="content-title mb-0 my-auto">Pages</h4><span
        class="text-muted mt-1 tx-13 ms-2 mb-0">/ Profile</span>
    </div>
  </div>
</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row row-sm">
  <div class="col-lg-4">
    <div class="card mg-b-20">
      <div class="card-body">
        <div class="ps-0">
          <div class="main-profile-overview">
            <div class="main-img-user profile-user">
              <img alt="" src="<?= base_url(); ?>/assets-themes/img/faces/6.jpg"><a
                class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
            </div>
            <div class="d-flex justify-content-between mg-b-20">
              <div>
                <h5 class="main-profile-name">Petey Cruiser</h5>
                <p class="main-profile-name-text">Web Designer</p>
              </div>
            </div>
            <hr class="mg-y-30">
            <label class="main-content-label tx-13 mg-b-20">Social</label>
            <div class="main-profile-social-list">
              <div class="media">
                <div class="media-icon bg-primary-transparent text-primary">
                  <i class="icon ion-logo-github"></i>
                </div>
                <div class="media-body">
                  <span>Github</span> <a href="">github.com/spruko</a>
                </div>
              </div>
              <div class="media">
                <div class="media-icon bg-success-transparent text-success">
                  <i class="icon ion-logo-twitter"></i>
                </div>
                <div class="media-body">
                  <span>Twitter</span> <a href="">twitter.com/spruko.me</a>
                </div>
              </div>
              <div class="media">
                <div class="media-icon bg-info-transparent text-info">
                  <i class="icon ion-logo-linkedin"></i>
                </div>
                <div class="media-body">
                  <span>Linkedin</span> <a href="">linkedin.com/in/spruko</a>
                </div>
              </div>
              <div class="media">
                <div class="media-icon bg-danger-transparent text-danger">
                  <i class="icon ion-md-link"></i>
                </div>
                <div class="media-body">
                  <span>My Portfolio</span> <a href="">spruko.com/</a>
                </div>
              </div>
            </div>
          </div><!-- main-profile-overview -->
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-8">
    <div class="row row-sm">
      <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
        <div class="card ">
          <div class="card-body">
            <div class="counter-status d-flex md-mb-0">
              <div class="counter-icon bg-primary-transparent">
                <i class="icon-layers text-primary"></i>
              </div>
              <div class="ms-auto">
                <h5 class="tx-13">Orders</h5>
                <h2 class="mb-0 tx-22 mb-1 mt-1">1,587</h2>
                <p class="text-muted mb-0 tx-11"><i
                    class="si si-arrow-up-circle text-success me-1"></i>increase</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
        <div class="card ">
          <div class="card-body">
            <div class="counter-status d-flex md-mb-0">
              <div class="counter-icon bg-danger-transparent">
                <i class="icon-paypal text-danger"></i>
              </div>
              <div class="ms-auto">
                <h5 class="tx-13">Revenue</h5>
                <h2 class="mb-0 tx-22 mb-1 mt-1">46,782</h2>
                <p class="text-muted mb-0 tx-11"><i
                    class="si si-arrow-up-circle text-success me-1"></i>increase</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
        <div class="card ">
          <div class="card-body">
            <div class="counter-status d-flex md-mb-0">
              <div class="counter-icon bg-success-transparent">
                <i class="icon-rocket text-success"></i>
              </div>
              <div class="ms-auto">
                <h5 class="tx-13">Product sold</h5>
                <h2 class="mb-0 tx-22 mb-1 mt-1">1,890</h2>
                <p class="text-muted mb-0 tx-11"><i
                    class="si si-arrow-up-circle text-success me-1"></i>increase</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="tabs-menu ">
          <!-- Tabs -->
          <ul class="nav nav-tabs profile navtab-custom panel-tabs">
            <li class="">
              <a href="#settings" data-bs-toggle="tab" class='active' aria-expanded="true"> <span
                  class="visible-xs"><i class="las la-cog tx-16 me-1"></i></span>
                <span class="hidden-xs">SETTINGS</span> </a>
            </li>
            <li class="">
              <a href="#sosmed" data-bs-toggle="tab" aria-expanded="false"> <span
                  class="visible-xs"><i class="las la-cog tx-16 me-1"></i></span>
                <span class="hidden-xs">SOCIAL MEDIA</span> </a>
            </li>
          </ul>
        </div>
        <div class="tab-content border-start border-bottom border-right border-top-0 p-4 br-dark">
          <div class="tab-pane active" id="settings">
            <form role="form">
              <div class="form-group">
                <label for="FullName">Full Name</label>
                <input type="text" value="John Doe" id="FullName" class="form-control">
              </div>
              <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" value="first.last@example.com" id="Email"
                  class="form-control">
              </div>
              <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" value="john" id="Username" class="form-control">
              </div>
              <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" placeholder="6 - 15 Characters" id="Password"
                  class="form-control">
              </div>
              <div class="form-group">
                <label for="RePassword">Re-Password</label>
                <input type="password" placeholder="6 - 15 Characters" id="RePassword"
                  class="form-control">
              </div>
              <button class="btn btn-primary waves-effect waves-light w-md"
                type="submit">Save</button>
            </form>
          </div>
          <div class="tab-pane active" id="sosmed">
            <form role="form">
              <div class="form-group">
                <label for="FullName">Github</label>
                <input type="text" value="John Doe" id="FullName" class="form-control">
              </div>
              <div class="form-group">
                <label for="Email">Twitterl</label>
                <input type="email" value="first.last@example.com" id="Email"
                  class="form-control">
              </div>
              <div class="form-group">
                <label for="Username">Instagram</label>
                <input type="text" value="john" id="Username" class="form-control">
              </div>
              <div class="form-group">
                <label for="Password">LinkedIn</label>
                <input type="password" placeholder="6 - 15 Characters" id="Password"
                  class="form-control">
              </div>
              <div class="form-group">
                <label for="RePassword">Link Portofolio</label>
                <input type="password" placeholder="6 - 15 Characters" id="RePassword"
                  class="form-control">
              </div>
              <button class="btn btn-primary waves-effect waves-light w-md"
                type="submit">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
<?= $this->endSection(); ?>