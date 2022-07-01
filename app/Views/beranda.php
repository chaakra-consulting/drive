<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('template/content') ?>

<?= $this->section('content') ?>

<!-- container -->
<div class="container-fluid">

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
  <div class="my-auto">
    <div class="d-flex">
      <h4 class="content-title mb-0 my-auto">Pages</h4><span
        class="text-muted mt-1 tx-13 ms-2 mb-0">/ Profile / User</span>
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
              <img alt="" src="<?= base_url(); ?>/foto/<?= user()->image?>">
            </div>
            <div class="d-flex justify-content-between mg-b-20">
              <div>
                <h5 class="main-profile-name"><?= user()->fullname; ?></h5>
                <p class="main-profile-name-text"><?= user()->jabatan; ?></p>
              </div>
            </div>
            <hr class="mg-y-30">
            <label class="main-content-label tx-13 mg-b-20">Social</label>
            <div class="main-profile-social-list">
            <div class="media">
                <div class="media-icon bg-danger-transparent text-danger">
                <ion-icon name="mail"></ion-icon>
                </div>
                <div class="media-body">
                  <span>Email</span> <a href="<?= user()->email; ?>"><?= user()->email; ?></a>
                </div>
              </div>  
            <div class="media">
                <div class="media-icon bg-primary-transparent text-primary">
                  <i class="icon ion-logo-github"></i>
                </div>
                <div class="media-body">
                  <span>Github</span> <a href="<?= user()->github; ?>"><?= user()->github; ?></a>
                </div>
              </div>
              <div class="media">
                <div class="media-icon bg-success-transparent text-success">
                  <i class="icon ion-logo-twitter"></i>
                </div>
                <div class="media-body">
                  <span>Twitter</span> <a href="<?= user()->twitter; ?>"><?= user()->twitter; ?></a>
                </div>
              </div>
              <div class="media">
                <div class="media-icon bg-info-transparent text-info">
                  <i class="icon ion-logo-linkedin"></i>
                </div>
                <div class="media-body">
                  <span>Linkedin</span> <a href="<?= user()->linkedin; ?>"><?= user()->linkedin; ?></a>
                </div>
              </div>
              <div class="media">
                <div class="media-icon bg-danger-transparent text-danger">
                  <i class="icon ion-md-link"></i>
                </div>
                <div class="media-body">
                  <span>Portfolio</span> <a href="<?= user()->portofolio; ?>"><?= user()->portofolio; ?></a>
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
                <h5 class="tx-13">Data Saya</h5>
                <h2 class="mb-0 tx-22 mb-1 mt-1">1,587</h2>
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
                <i class="icon-folder text-danger"></i>
              </div>
              <div class="ms-auto">
                <h5 class="tx-13">Data Perusahaan</h5>
                <h2 class="mb-0 tx-22 mb-1 mt-1">46,782</h2>
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
              <i class="icon-folder-open text-success"></i>
              </div>
              <div class="ms-auto">
                <h5 class="tx-13">Total Penyimpanan Data Saya</h5>
                <h2 class="mb-0 tx-22 mb-1 mt-1">1,890</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
    
    <div class="card-body">
      <?php if(session()->getFlashdata('pesan')) { ?>
    <div class="alert alert-primary" role="alert"><?= session()->getFlashdata('pesan');?></div>
<?php }elseif(session()->getFlashdata('pesan-danger')){ ?>
  <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('pesan-danger');?></div>
  <?php } ?>
    <div class="tabs-menu ">
									<!-- Tabs -->
									<ul class="nav nav-tabs profile navtab-custom panel-tabs">
										<li class="">
											<a href="#home" data-bs-toggle="tab" class="active" aria-expanded="true"> <span
													class="visible-xs"><i
														class="las la-user-circle tx-16 me-1"></i></span> <span
													class="hidden-xs">Profil</span> </a>
										</li>
										<li class="">
											<a href="#settings" data-bs-toggle="tab" aria-expanded="false"> <span
													class="visible-xs"><i class="las la-cog tx-16 me-1"></i></span>
												<span class="hidden-xs">Sosial Media</span> </a>
										</li>
									</ul>
								</div>
								<div class="tab-content border-start border-bottom border-right border-top-0 p-4 br-dark">
									<div class="tab-pane active" id="home">
                  <form action="<?php base_url()?>/ubahprofil" method="POST" enctype="multipart/form-data">
											<div class="form-group">
												<label for="FullName">Nama Lengkap</label>
                        <input type="hidden" value="<?= user()->id; ?>" name="id" class="form-control">
												<input type="text" value="<?= user()->fullname; ?>" name="fullname" id="FullName" class="form-control">
											</div>
											<div class="form-group">
												<label for="Email">Email</label>
												<input type="email" value="<?= user()->email; ?>" id="Email" name="email"
													class="form-control">
											</div>
											<div class="form-group">
												<label for="Username">Username</label>
												<input type="text" value="<?= user()->username; ?>" id="Username" name="username" class="form-control">
											</div>
                      <div class="form-group">
												<label for="Username">Jabatan</label>
												<input type="text" value="<?= user()->jabatan; ?>" id="Username" name="jabatan" class="form-control">
											</div>
											<div class="form-group">
												<label for="Password">Ubah Foto</label>
												<input type="file" name="foto" id="File" class="form-control">
											</div>
											<button class="btn btn-primary waves-effect waves-light w-md" type="submit">Simpan</button>
									</form>
									</div>
									<div class="tab-pane" id="settings">
                  <form action="<?php base_url()?>/ubahsosmed" method="POST">
											<div class="form-group">
												<label for="instagram">Instagram</label>
                        <input type="hidden" value="<?= user()->id; ?>" name="id" class="form-control">
												<input type="text" id="instagram" name="instagram" class="form-control" value="<?= user()->instagram; ?>">
											</div>
											<div class="form-group">
												<label for="github">Github</label>
												<input type="text" id="github" name="github" class="form-control" value="<?= user()->github; ?>">
											</div>
											<div class="form-group">
												<label for="twitter">Twitter</label>
												<input type="text" value="<?= user()->twitter; ?>" name="twitter" id="twitter" class="form-control">
											</div>
											<div class="form-group">
												<label for="linkedin">LinkedIn</label>
												<input type="text" id="linkedin" value="<?= user()->linkedin; ?>" name="linkedin" class="form-control">
											</div>
											<div class="form-group">
												<label for="portofolio">Portofolio</label>
												<input type="text" id="portofolio" name="portofolio" value="<?= user()->portofolio; ?>"
													class="form-control">
											</div>
											<button class="btn btn-primary waves-effect waves-light w-md"
												type="submit">Simpan</button>
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