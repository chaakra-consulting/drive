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
      <h4 class="content-title mb-0 my-auto">Manajemen Pengguna</h4>
      <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Detail / <?= $details[0]->fullname ;?></span>
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
              <img alt="" src="<?= base_url(); ?>/foto/<?= $details[0]->image ;?>">
            </div>
            <div class="d-flex justify-content-between mg-b-20">
              <div>
                <h5 class="main-profile-name"><?= $details[0]->fullname ;?></h5>
                <p class="main-profile-name-text"><?= $details[0]->jabatan ;?></p>
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
                  <span>Email</span> <a href="<?= $details[0]->email; ?>"><?= $details[0]->email; ?></a>
                </div>
              </div>  
            <div class="media">
                <div class="media-icon bg-primary-transparent text-primary">
                  <i class="icon ion-logo-github"></i>
                </div>
                <div class="media-body">
                  <span>Github</span> <a href="<?= $details[0]->github; ?>"><?= $details[0]->github; ?></a>
                </div>
              </div>
              <div class="media">
                <div class="media-icon bg-success-transparent text-success">
                  <i class="icon ion-logo-twitter"></i>
                </div>
                <div class="media-body">
                  <span>Twitter</span> <a href="<?= $details[0]->twitter; ?>"><?= $details[0]->twitter; ?></a>
                </div>
              </div>
              <div class="media">
                <div class="media-icon bg-info-transparent text-info">
                  <i class="icon ion-logo-linkedin"></i>
                </div>
                <div class="media-body">
                  <span>Linkedin</span> <a href="<?= $details[0]->linkedin; ?>"><?= $details[0]->linkedin; ?></a>
                </div>
              </div>
              <div class="media">
                <div class="media-icon bg-danger-transparent text-danger">
                  <i class="icon ion-md-link"></i>
                </div>
                <div class="media-body">
                  <span>Portfolio</span> <a href="<?= $details[0]->portofolio; ?>"><?= $details[0]->portofolio; ?></a>
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
                <h5 class="tx-13">Data User</h5>
                <h2 class="mb-0 tx-22 mb-1 mt-1"><?= $jumlah_data_user[0]->jumlah; ?></h2>
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
                <h5 class="tx-13">Data Proyek User</h5>
                <h2 class="mb-0 tx-22 mb-1 mt-1"><?= $jumlah_proyek[0]->jumlah; ?></h2>
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
              <i class="icon-folder text-success"></i>
              </div>
              <div class="ms-auto">
                <h5 class="tx-13">Jumlah Data Perusahaan</h5>
                <h2 class="mb-0 tx-22 mb-1 mt-1"><?= $jumlah_semua_data[0]->jumlah; ?></h2>
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
											<a href="#home" data-bs-toggle="tab" class="active" aria-expanded="true">
                        <span class="visible-xs">
                          <i class="las la-user-circle tx-16 me-1"></i>
                        </span>
                        <span	class="hidden-xs">Detail Profil</span> 
                      </a>
										</li>
										<li class="">
											<a href="#permisionproject" data-bs-toggle="tab" aria-expanded="false"> <span
													class="visible-xs"><i class="las la-cog tx-16 me-1"></i></span>
												<span class="hidden-xs">Proyek Diizinkan</span> </a>
										</li>
									</ul>
								</div>
								<div class="tab-content border-start border-bottom border-right border-top-0 p-4 br-dark">
									<div class="tab-pane active" id="home">
                    <h4 class="tx-15 text-uppercase mb-3">Grub Akses</h4>
										<p class="m-b-5"><?= $details[0]->name ;?></p>
                    <h4 class="tx-15 text-uppercase mb-3">Status</h4>
										<p class="m-b-5"><?php if($details[0]->deleted_at==''){if($details[0]->active=='1'){echo 'Aktif';}else{echo 'Belum Verifikasi';}}else{echo 'Tidak Aktif';} ;?></p>
                    <h4 class="tx-15 text-uppercase mb-3">Ditambahkan</h4>
										<p class="m-b-5"><?= $details[0]->created_at ;?></p>
                    <h4 class="tx-15 text-uppercase mb-3">Dinonaktifkan</h4>
										<p class="m-b-5"><?php if($details[0]->deleted_at==''){echo '-';}else{echo $details[0]->deleted_at;}?></p>
									</div>
                  <div class="tab-pane" id="permisionproject">
										<div class="modal fade" id="modaladd">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content modal-content-demo">
                          <div class="modal-header">
                            <h6 class="modal-title">Tambah Izin Proyek</h6><button aria-label="Close" class="close"
                              data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                          </div>											
                          <div class="modal-body">
                          <form action="<?php base_url()?>/add_permision_project" method="POST">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Proyek</label>
                              <select class="form-control" id="exampleFormControlSelect1" name="id_proyek">
                                <?php foreach($data_project as $a){?>
                                <option value="<?= $a->id ?>"><?= $a->tahun.' - '.$a->nama ?></option>
                                <?php }?>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">Tambah</button>
                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Batal</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="modal" id="modaldeleteall">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                              <div class="modal-header">
                                <h6 class="modal-title">Hapus Semua Izin Proyek</h6><button aria-label="Close" class="close"
                                  data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <p>Anda yakin akan mengahapus izin semua proyek ?</p>
                              </div>
                              <form action="<?php base_url()?>/delete_all_permision_project" method="POST">
                                <input type="hidden" name='id_user' value="<?= user()->id ?>">
                                <div class="modal-footer">
                                  <button class="btn ripple btn-primary" type="submit">Hapus Semua</button>
                                  <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Batal</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      <button class="d-inline btn btn-secondary btn-rounded btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal"  data-bs-target="#modaladd">Tambah</button>
                      <button class="d-inline btn btn-danger btn-rounded btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal"  data-bs-target="#modaldeleteall">Hapus Semua</button><br>
                    <br>
                    <div class="table-responsive">
                      <table class="table text-md-nowrap" id="example1">
                        <thead>
                          <tr>
                              <th><span>No.</span></th>
                              <th><span>Tahun</span></th>
                              <th><span>Nama Proyek</span></th>
                              <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1; 
                        foreach($data_permision as $a){ ?>
                        <div class="modal" id="modaldelete<?= $no;?>">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                              <div class="modal-header">
                                <h6 class="modal-title">Hapus Izin Proyek</h6><button aria-label="Close" class="close"
                                  data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <p>Anda yakin akan mengahapus Izin proyek <b><?= $a->nama ;?> ?</b></p>
                              </div>
                              <form action="<?php base_url()?>/delete_permision_project" method="POST">
                                <input type="hidden" name='id_permision' value="<?= $a->id ?>">
                                <div class="modal-footer">
                                  <button class="btn ripple btn-primary" type="submit">Hapus</button>
                                  <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Batal</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                            <tr>
                              <td><?= $no ;?>
                              </td>
                              <td><?= $a->tahun ?></td>
                              <td>
                                <?= $a->nama ;?>
                              </td>
                              <td>
                                <div class='row'>
                                  <div class="col col-md-4">
                                    <a href="#" class="btn btn-sm btn-danger"  data-bs-effect="effect-super-scaled" data-bs-toggle="modal"  data-bs-target="#modaldelete<?= $no;?>">
                                      <i class="las la-trash"></i>
                                    </a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <?php $no++;} ?>
                        </tbody>
                      </table>
                    </div>
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