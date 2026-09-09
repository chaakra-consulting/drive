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
					<h4 class="content-title mb-0 my-auto">Manajemen Pengguna</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Daftar Pengguna</span>
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
							<h4 class="card-title mg-b-0">Daftar Pengguna</h4>
							<i class="mdi mdi-dots-horizontal text-gray"></i>
						</div>
					</div>
					<div class="card-body">
						<div class="modal fade" id="modaladd">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content modal-content-demo">
									<div class="modal-header">
										<h6 class="modal-title">Tambah User</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
									</div>
									<form action="<?= route_to('register') ?>" method="post">
										<?= csrf_field() ?>
										<div class="modal-body">

											<div class="form-group">
												<label for="email"><?= lang('Auth.email') ?></label>
												<input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
												<small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
											</div>

											<div class="form-group">
												<label for="username"><?= lang('Auth.username') ?></label>
												<input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
											</div>

											<div class="form-group">
												<label for="password"><?= lang('Auth.password') ?></label>
												<input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
											</div>

											<div class="form-group">
												<label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
												<input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
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
						<?php if (session()->getFlashdata('pesan')) { ?>
							<div class="alert alert-primary" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
						<?php } elseif (session()->getFlashdata('pesan-danger')) { ?>
							<div class="alert alert-danger" role="alert"><?= session()->getFlashdata('pesan-danger'); ?></div>
						<?php } ?>
						<div class="table-responsive">
							<table class="table text-md-nowrap" id="example1">
								<thead>
									<tr>
										<th class="wd-lg-8p"><span>&nbsp;</span></th>
										<th class="wd-lg-10p"><span>Pengguna</span></th>
										<th class="wd-lg-15p"><span>Jabatan</span></th>
										<th class="wd-lg-15p"><span>Status</span></th>
										<th class="wd-lg-10p"><span>Groub</span></th>
										<th class="wd-lg-20p"><span>Email</span></th>
										<th class="wd-lg-20p">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data_users as $a) { ?>
										<tr>
											<td>
												<img alt="avatar" class="rounded-circle avatar-md me-2" src="<?php base_url() ?>foto/<?= $a->image ?>">
											</td>
											<td><?= $a->fullname ?></td>
											<td>
												<?= $a->jabatan; ?>
											</td>
											<td class="text-center">
												<?php if (is_null($a->deleted_at)) { ?>
													<?php if ($a->active == 1) { ?>
														<span class="label text-success d-flex">
						</div> Aktif</span>
					<?php } else { ?>
						<span class="label text-warning d-flex">
					</div> Belum Verifikasi</span>
				<?php } ?>
			<?php } else { ?>
				<span class="label text-danger d-flex">
				</div> Nonaktif</span>
			<?php } ?>
			</td>
			<td>
				<a><?= $a->name; ?></a>
			</td>
			<td>
				<a href="mailto:<?= $a->email ?>"><?= $a->email; ?></a>
			</td>
			<td>
				<div class='row'>
					<div class="col col-md-4">
						<form action="/detailsuser" method="post">
							<input type="hidden" value="<?= $a->id; ?>" name="id-detail" class="form-control">
							<button class="btn btn-sm btn-primary" type="submit">
								<i class="las la-search"></i>
							</button>
						</form>
					</div>
					<div class="col  col-md-4">
						<form action="/reaktifusers" method="post">
							<input type="hidden" value="<?= $a->id; ?>" name="id-aktif" class="form-control">
							<button class="btn btn-sm btn-info btn-b" type="submit">
								<i class="las la-check"></i>
							</button>
						</form>
					</div>
					<div class="col  col-md-4">
						<form action="/nonaktifusers" method="post">
							<input type="hidden" value="<?= $a->id; ?>" name="id-nonaktif" class="form-control">
							<button class="btn btn-sm btn-danger" type="submit">
								<i class="las la-times"></i>
							</button>
						</form>
					</div>
				</div>
			</td>
			</tr>
		<?php } ?>
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

<?= $this->endSection(); ?>