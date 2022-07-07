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
								<?php if($menu!='detail_project_saya'){ ?>
								<h4 class="content-title mb-0 my-auto">Manajemen Detail Data Perusahaan</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Daftar Detail Proyek</span>
								<?php }else{?>
								<h4 class="content-title mb-0 my-auto">Data Saya</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Daftar Detail Proyek</span>
								<?php } ?>
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
									<h4 class="card-title mg-b-0">Daftar Data Proyek <?= $data_project[0]->nama ;?> (<?= $data_project[0]->tahun ;?>) </h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
							<?php if(session()->getFlashdata('pesan')) { ?>
								<div class="alert alert-primary" role="alert"><?= session()->getFlashdata('pesan');?></div>
							<?php }elseif(session()->getFlashdata('pesan-danger')){ ?>
								<div class="alert alert-danger" role="alert"><?= session()->getFlashdata('pesan-danger');?></div>
							<?php } ?>
							<div class="modal fade" id="modaladd">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content modal-content-demo">
										<div class="modal-header">
											<h6 class="modal-title">Tambah File Pada Proyek <?= $data_project[0]->nama ;?></h6><button aria-label="Close" class="close"
												data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
										</div>											
										<div class="modal-body">
										<form action="<?php base_url()?>/add_file_project_saya" method="POST" enctype="multipart/form-data">
											<div class="form-group">
												<label for="judul">Judul</label>
												<input type="text" name="judul" class="form-control" id="judul" placeholder="Judul File">
											</div>
											<div class="form-group">
												<label for="Password">Upload File</label>
												<input type="file" name="file_project" id="File" class="form-control">
											</div>
											<div class="form-group">
												<label for="pesan">Pesan</label>
												<textarea class='form-control' name="pesan"  placeholder="Tulis Pesan Disini . . ."></textarea>
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
													<th class="wd-lg-40p"><span>Judul</span></th>
													<th class="wd-lg-20p"><span>File</span></th>
													<th class="wd-lg-15p"><span>Dibuat Pada</span></th>
													<th class="wd-lg-10p"><span>Pembuat</span></th>
													<th class="wd-lg-20p">Aksi</th>
											</tr>
										</thead>
										<tbody>
										<?php
										$no=1; 
										foreach($data as $a){ ?>
										<div class="modal" id="modaldelete<?= $no;?>">
											<div class="modal-dialog" role="document">
												<div class="modal-content modal-content-demo">
													<div class="modal-header">
														<h6 class="modal-title">Hapus File Dari Proyek <?= $data_project[0]->nama ;?></h6><button aria-label="Close" class="close"
															data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
													</div>
													<div class="modal-body">
														<p>Anda yakin akan mengahapus proyek <b><?= $a->judul ;?> (<?= $a->nama_file ;?>)</b> ?</p>
													</div>
													<form action="<?php base_url()?>/delete_file_project_saya" method="POST">
														<input type="hidden" name='id_file' value="<?= $a->id ?>">
														<div class="modal-footer">
															<button class="btn ripple btn-primary" type="submit">Hapus</button>
															<button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Batal</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<div class="modal" id="modaldownload<?= $no;?>">
											<div class="modal-dialog" role="document">
												<div class="modal-content modal-content-demo">
													<div class="modal-header">
														<h6 class="modal-title">Download File Dari Proyek <?= $data_project[0]->nama ;?></h6><button aria-label="Close" class="close"
															data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
													</div>
													<div class="modal-body">
														<p><b>Nama File :</b> <?= $a->nama_file ;?></p>
														<p><b>PESAN :</b> <?= $a->pesan ;?></p>
													</div>
													<form action="<?php base_url()?>/download_file_project" method="POST">
														<input type="hidden" name='id_file' value="<?= $a->id ?>">
														<div class="modal-footer">
															<button class="btn ripple btn-primary" data-bs-dismiss="modal" type="submit">DOWNLOAD</button>
															<button class="btn ripple btn-secondary" data-bs-dismiss="modal">Batal</button>
														</div>
													</form>
												</div>
											</div>
										</div>
												<tr>
													<td><?= $no ;?>
													</td>
													<td><?= $a->judul ?></td>
													<td>file-
														<?= $a->nama_file ;?>
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
																<a href="#" class="btn btn-sm btn-primary"  data-bs-effect="effect-super-scaled" data-bs-toggle="modal"  data-bs-target="#modaldownload<?= $no;?>">
																	<i class="las la-download"></i>
																</a>
															</div>
															<?php 
															if(($a->id_pembuat)==(user()->id)){
																?>
															<div class="col col-md-4">
																<a href="#" class="btn btn-sm btn-danger"  data-bs-effect="effect-super-scaled" data-bs-toggle="modal"  data-bs-target="#modaldelete<?= $no;?>">
																	<i class="las la-trash"></i>
																</a>
															</div>
															<?php 
														}
														?>
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