<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('template/content') ?>

<?= $this->section('content') ?>

<!-- main-content opened -->
<div class="main-content horizontal-content">

	<!-- container opened -->
	<div class="container-fluid">

		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between">
			<div class="my-auto">
				<div class="d-flex">
					<?php if ($menu != 'proyek_saya') {; ?>
						<h4 class="content-title mb-0 my-auto">Manajemen Data Perusahaan</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Daftar Proyek</span>
					<?php } else {; ?>
						<h4 class="content-title mb-0 my-auto">Data Saya</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Daftar Proyek</span>
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
							<?php if ($menu != 'proyek_saya') {; ?>
								<h4 class="card-title mg-b-0">Daftar Data Perusahaan</h4>
							<?php } else {; ?>
								<h4 class="card-title mg-b-0">Daftar Data Proyek</h4>
							<?php } ?>
							<i class="mdi mdi-dots-horizontal text-gray"></i>
						</div>
					</div>
					<div class="card-body">
						<?php if (session()->getFlashdata('pesan')) { ?>
							<div class="alert alert-primary" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
						<?php } elseif (session()->getFlashdata('pesan-danger')) { ?>
							<div class="alert alert-danger" role="alert"><?= session()->getFlashdata('pesan-danger'); ?></div>
						<?php } ?>
						<div class="modal fade" id="modaladd">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content modal-content-demo">
									<div class="modal-header">
										<h6 class="modal-title">Tambah Permision</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
									</div>
									<form action="<?php base_url() ?>/add_permision_project_saya" method="POST">
										<div class="modal-body">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Anggota</label>
												<select class="form-control" id="exampleFormControlSelect1" name="id_users">
													<?php
													// if (in_groups('user') == user_id()) {
													// foreach ($users1 as $a) { 
													?>
													<!-- <option value="<?php
																		// echo $a->id 
																		?>"><?php
														// echo $a->fullname 
														?></option> -->
													<?php
													// }
													// } else {
													foreach ($users2 as $a) { ?>
														<option value="<?= $a->id ?>"><?= $a->fullname ?></option>
													<?php
													}
													// } 
													?>
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
						<div class="row row-xs wd-sm-40p">
							<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><button class="btn btn-secondary btn-rounded btn-block" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" data-bs-target="#modaladd">Tambah</button></div>
						</div>
						<br>
						<div class="table-responsive">
							<table class="table text-md-nowrap" id="example1">
								<thead>
									<tr>
										<th><span>No.</span></th>
										<th><span>Nama</span></th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($data as $a) { ?>
										<div class="modal" id="modaldelete<?= $no; ?>">
											<div class="modal-dialog" role="document">
												<div class="modal-content modal-content-demo">
													<div class="modal-header">
														<h6 class="modal-title">Hapus Permision</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
													</div>
													<div class="modal-body">
														<p>Anda yakin akan mengahapus <b><?= $a->fullname; ?> pada akses projek ini ?</b></p>
													</div>
													<form action="<?php base_url() ?>/delete_permision_project_saya" method="POST">
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
											<td><?= $no; ?></td>
											<td><?= $a->fullname ?></td>
											<td>
												<?php
												if (in_groups('user') == user_id()) {
													if (user_id() == $proyek[0]->id_pembuat) {
														if ($a->id_users != $proyek[0]->id_pembuat) { ?>
															<div class='row'>
																<div class="col col-md-3">
																	<a href="#" class="btn btn-sm btn-danger" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" data-bs-target="#modaldelete<?= $no; ?>">
																		<i class="las la-trash"></i>
																	</a>
																</div>
															</div>
													<?php }
													}
												} else { ?>
													<div class='row'>
														<div class="col col-md-3">
															<a href="#" class="btn btn-sm btn-danger" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" data-bs-target="#modaldelete<?= $no; ?>">
																<i class="las la-trash"></i>
															</a>
														</div>
													</div>
												<?php } ?>
											</td>
										</tr>
									<?php $no++;
									} ?>
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