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
								<h4 class="content-title mb-0 my-auto">Manajemen Data Perusahaan</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Daftar Proyek</span>
							</div>
						</div>
					</div>
					<!-- breadcrumb -->

					<!--Row-->
					<div class="row row-sm">
						<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">Daftar Data Perusahaan</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
							<div class="modal fade" id="modaladd">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content modal-content-demo">
										<div class="modal-header">
											<h6 class="modal-title">Tambah Proyek</h6><button aria-label="Close" class="close"
												data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
										</div>											
										<div class="modal-body">
										<form action="<?php base_url()?>/add_project" method="POST">
											<div class="form-group">
												<label for="tahun_proyek">Tahun Proyek</label>
												<input type="text" name='tahun_proyek' class="form-control" id="tahun_proyek" placeholder="Tahun Proyek">
											</div>
											<div class="form-group">
												<label for="nama_proyek">Nama Proyek</label>
												<textarea class='form-control' name="nama_proyek"  placeholder="Nama Proyek"></textarea>
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
							<div class="row row-xs wd-sm-40p">
								<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><button class="btn btn-secondary btn-rounded btn-block" data-bs-effect="effect-super-scaled" data-bs-toggle="modal"  data-bs-target="#modaladd">Tambah</button></div>
							</div>
							<br>
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
													<th class="wd-lg-8p"><span>No.</span></th>
													<th class="wd-lg-10p"><span>Tahun</span></th>
													<th class="wd-lg-40p"><span>Nama Proyek</span></th>
													<th class="wd-lg-15p"><span>Dibuat Pada</span></th>
													<th class="wd-lg-10p"><span>Pembuat</span></th>
													<th class="wd-lg-20p">Aksi</th>
											</tr>
										</thead>
										<tbody>
										<?php
										$no=1; 
										foreach($data as $a){ ?>
										<div class="modal fade" id="modalupdate<?= $no;?>">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content modal-content-demo">
													<div class="modal-header">
														<h6 class="modal-title">Update Proyek</h6><button aria-label="Close" class="close"
															data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
													</div>
													<div class="modal-body">
													<form action="<?php base_url()?>/update_project" method="POST">
														<div class="form-group">
															<input type="hidden" name='id_proyek' value="<?= $a->id ?>">
															<label for="tahun_proyek">Tahun Proyek</label>
															<input type="text" name='tahun_proyek' class="form-control" id="tahun_proyek" value="<?= $a->tahun ;?>">
														</div>
														<div class="form-group">
															<label for="nama_proyek">Nama Proyek</label>
															<textarea class='form-control' name="nama_proyek"><?= $a->nama ;?></textarea>
														</div>
													</div>
													<div class="modal-footer">
														<button class="btn ripple btn-primary" type="submit">Perbarui</button>
														<button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Batal</button>
													</div>
													</form>
												</div>
											</div>
										</div>
										<div class="modal" id="modaldelete<?= $no;?>">
											<div class="modal-dialog" role="document">
												<div class="modal-content modal-content-demo">
													<div class="modal-header">
														<h6 class="modal-title">Hapus Proyek</h6><button aria-label="Close" class="close"
															data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
													</div>
													<div class="modal-body">
														<p>Anda yakin akan mengahapus proyek <b><?= $a->nama ;?> ?</b></p>
													</div>
													<form action="<?php base_url()?>/delete_project" method="POST">
														<input type="hidden" name='id_proyek' value="<?= $a->id ?>">
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
														<?= $a->create_at ;?>
													</td>
													<td>
														<a ><?= $a->fullname ;?></a>
													</td>
													<td>
														<div class='row'>
															<div class="col col-md-4">
																<form action="<?php base_url()?>/detail_data_project/" method="POST">
																	<input type="hidden" name='id_proyek' value="<?= $a->id ?>">
																	<button class="btn btn-sm btn-primary">
																		<i class="las la-search" type='submit'></i>
																	</button>
																</form>
															</div>
															<div class="col col-md-4">
																<a href="#" class="modal-effect btn btn-sm btn-info btn-b" data-bs-effect="effect-super-scaled" data-bs-toggle="modal"  data-bs-target="#modalupdate<?= $no;?>">
																	<i class="las la-pen"></i>
																</a>
															</div>
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
					<!-- row closed  -->
				</div>
				<!-- Container closed -->
			</div>
			<!-- main-content closed -->
			<!-- <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
			<script> CKEDITOR.replace( 'ckeditor' ); </script> -->
      <?= $this->endSection(); ?>