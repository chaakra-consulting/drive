<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('template/content') ?>

<?= $this->section('content') ?>

			<!-- main-content opened -->
			<div class="main-content horizontal-content">

				<!-- container opened -->
				<div class="container">

					<!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto">Advanced ui</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Userlist</span>
							</div>
						</div>
					</div>
					<!-- breadcrumb -->

					<!--Row-->
					<div class="row row-sm">
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
							<div class="card">
								<div class="card-header pb-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-0">Tabel Pengguna</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive border-top userlist-table">
										<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
											<thead>
												<tr>
													<th class="wd-lg-8p"><span>Pengguna</span></th>
													<th class="wd-lg-20p"><span></span></th>
													<th class="wd-lg-20p"><span>Jabatan</span></th>
													<th class="wd-lg-10p"><span>Status</span></th>
													<th class="wd-lg-10p"><span>Groub</span></th>
													<th class="wd-lg-20p"><span>Email</span></th>
													<th class="wd-lg-20p">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($data_users as $a){ ?>

												<tr>
													<td>
														<img alt="avatar" class="rounded-circle avatar-md me-2" src="<?php base_url() ?>foto/<?= $a->image ?>">
													</td>
													<td><?= $a->fullname ?></td>
													<td>
														<?= $a->jabatan ;?>
													</td>
													<td class="text-center">
														<?php if(is_null($a->deleted_at)){ ?>
															<?php  if($a->active == 1){?>
																<span class="label text-success d-flex"><div class="dot-label bg-success me-1"></div>Aktif</span>
														<?php }else{ ?>
															<span class="label text-warning d-flex"><div class="dot-label bg-warning me-1"></div>Belum Verifikasi</span>
															<?php }?>
														<?php }else{ ?>
															<span class="label text-danger d-flex"><div class="dot-label bg-danger me-1"></div>Nonaktif</span>
														<?php }?>
													</td>
													<td>
														<a href="mailto:<?=$a->email?>"><?= $a->email ;?></a>
													</td>
													<td>
														<a ><?= $a->name ;?></a>
													</td>
													<td>
														<a href="#" class="btn btn-sm btn-primary">
															<i class="las la-search"></i>
														</a>
														<a href="#" class="btn btn-sm btn-info btn-b">
															<i class="las la-pen"></i>
														</a>
														<a href="#" class="btn btn-sm btn-danger">
															<i class="las la-trash"></i>
														</a>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div><!-- COL END -->
					</div>
					<!-- row closed  -->
				</div>
				<!-- Container closed -->
			</div>
			<!-- main-content closed -->

      <?= $this->endSection(); ?>