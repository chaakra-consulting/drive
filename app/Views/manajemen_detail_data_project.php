<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('template/content') ?>

<?php $this->section('content');

function file_size($file)
{
	if ($file >= 1073741824) {
		$file = number_format($file / 1073741824, 2) . ' GB';
	} else if ($file >= 1048576) {
		$file = number_format($file / 1048576, 2) . ' MB';
	} else if ($file >= 1024) {
		$file = number_format($file / 1024, 2) . ' KB';
	} else if ($file >= 1) {
		$file = $file . ' Bytes';
	}
	return $file;
}

?>

<!-- main-content opened -->
<div class="main-content horizontal-content">

	<!-- container opened -->
	<div class="container-fluid">

		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between">
			<div class="my-auto">
				<div class="d-flex">
					<?php if ($menu != 'detail_project_saya') { ?>
						<h4 class="content-title mb-0 my-auto">Manajemen Detail Data Perusahaan</h4><span
							class="text-muted mt-1 tx-13 ms-2 mb-0">/ Daftar Detail Proyek</span>
					<?php } else { ?>
						<h4 class="content-title mb-0 my-auto">Data Saya</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
							Daftar Detail Proyek</span>
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
							<h4 class="card-title mg-b-0">Daftar Data Proyek <?= $data_project[0]->nama; ?>
								(<?= $data_project[0]->tahun; ?>) </h4>
							<i class="mdi mdi-dots-horizontal text-gray"></i>
						</div>
					</div>
					<div class="card-body">
						<?php if (session()->getFlashdata('pesan')) { ?>
							<div class="alert alert-primary" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
						<?php } elseif (session()->getFlashdata('pesan-danger')) { ?>
							<div class="alert alert-danger" role="alert"><?= session()->getFlashdata('pesan-danger'); ?>
							</div>
						<?php } ?>
						<div class="modal fade" id="modaladd">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content modal-content-demo">
									<div class="modal-header">
										<h6 class="modal-title">Tambah File Pada Proyek <?= $data_project[0]->nama; ?>
										</h6><button aria-label="Close" class="close" data-bs-dismiss="modal"
											type="button"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<?php if ($menu == 'detail_project_saya') { ?>
											<form action="<?php base_url() ?>/add_file_project_saya" method="POST">
											<?php } else { ?>
												<form action="<?php base_url() ?>/add_file_project" method="POST">
												<?php } ?>
												<div class="form-group">
													<label for="judul">Judul</label>
													<input type="text" name="judul" class="form-control" id="judul"
														placeholder="Judul File">
												</div>
												<div class="form-group">
													<label for="Password">Upload File</label>
													<input type="text" name="file_project" id="File"
														class="filepond" required>
												</div>
												<div class="form-group">
													<label for="pesan">Pesan</label>
													<textarea class='form-control' name="pesan"
														placeholder="Tulis Pesan Disini . . ."></textarea>
												</div>
									</div>
									<div class="modal-footer">
										<button class="btn ripple btn-primary" type="submit">Tambah</button>
										<button class="btn ripple btn-secondary" data-bs-dismiss="modal"
											type="button">Batal</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<div class="row row-xs wd-sm-40p">
							<div class="col-3"><button class="btn btn-sm btn-secondary btn-rounded btn-block"
									data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
									data-bs-target="#modaladd">Tambah</button></div>
							<div class="col-6"><a class="btn btn-sm btn-primary btn-rounded btn-block"
									href="/downloads_file_project">Download Semua</a></div>
						</div>
						<br>
						<div class="table-responsive">
							<table class="table text-md-nowrap" id="example1">
								<thead>
									<tr>
										<th class=""><span>No.</span></th>
										<th class=""><span>Judul</span></th>
										<th class=""><span>File</span></th>
										<th class=""><span>Ukuran</span></th>
										<th class=""><span>Dibuat Pada</span></th>
										<th class=""><span>Pembuat</span></th>
										<th class="">Aksi</th>
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
														<h6 class="modal-title">Hapus File Dari Proyek
															<?= $data_project[0]->nama; ?></h6><button aria-label="Close"
															class="close" data-bs-dismiss="modal" type="button"><span
																aria-hidden="true">&times;</span></button>
													</div>
													<div class="modal-body">
														<p>Anda yakin akan mengahapus proyek <b><?= $a->judul; ?>
																(<?= $a->nama_file; ?>)</b> ?</p>
													</div>
													<?php if ($menu == 'detail_project_saya') { ?>
														<form action="<?php base_url() ?>/delete_file_project_saya"
															method="POST">
														<?php } else { ?>
															<form action="<?php base_url() ?>/delete_file_project"
																method="POST">
															<?php } ?>
															<input type="hidden" name='id_file' value="<?= $a->id ?>">
															<div class="modal-footer">
																<button class="btn ripple btn-primary"
																	type="submit">Hapus</button>
																<button class="btn ripple btn-secondary"
																	data-bs-dismiss="modal" type="button">Batal</button>
															</div>
															</form>
												</div>
											</div>
										</div>
										<div class="modal" id="modaldownload<?= $no; ?>">
											<div class="modal-dialog" role="document">
												<div class="modal-content modal-content-demo">
													<div class="modal-header">
														<h6 class="modal-title">Download File Dari Proyek
															<?= $data_project[0]->nama; ?></h6><button aria-label="Close"
															class="close" data-bs-dismiss="modal" type="button"><span
																aria-hidden="true">&times;</span></button>
													</div>
													<div class="modal-body">
														<p><b>Nama File :</b> <?= $a->nama_file; ?></p>
														<p><b>PESAN :</b> <?= $a->pesan; ?></p>
													</div>
													<?php if ($menu == 'detail_project_saya') { ?>
														<form action="<?php base_url() ?>/download_file_project_saya"
															method="POST">
														<?php } else { ?>
															<form action="<?php base_url() ?>/download_file_project"
																method="POST">
															<?php } ?>
															<input type="hidden" name='id_file' value="<?= $a->id ?>">
															<div class="modal-footer">
																<button class="btn ripple btn-primary"
																	data-bs-dismiss="modal" type="submit">DOWNLOAD</button>
																<button class="btn ripple btn-secondary"
																	data-bs-dismiss="modal">Batal</button>
															</div>
															</form>
												</div>
											</div>
										</div>
										<tr>
											<td><?= $no; ?>
											</td>
											<td><?= $a->judul ?></td>
											<td>
												<?= $a->nama_file; ?>
											</td>
											<td>
												<?= file_size($a->ukuran_file ?? 0) ?>
											</td>
											<td>
												<?= $a->create_at; ?>
											</td>
											<td>
												<a><?= $a->fullname; ?></a>
											</td>
											<td>
												<div class='row'>
													<div class="col col-md-4">
														<a href="#" class="btn btn-sm btn-primary"
															data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
															data-bs-target="#modaldownload<?= $no; ?>">
															<i class="las la-download"></i>
														</a>
													</div>
													<?php
													if ($menu == 'detail_project_saya') {
														if (($a->id_pembuat) == (user()->id)) {
													?>
															<div class="col col-md-4">
																<a href="#" class="btn btn-sm btn-danger"
																	data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
																	data-bs-target="#modaldelete<?= $no; ?>">
																	<i class="las la-trash"></i>
																</a>
															</div>
														<?php
														}
													} else { ?>
														<div class="col col-md-4">
															<a href="#" class="btn btn-sm btn-danger"
																data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
																data-bs-target="#modaldelete<?= $no; ?>">
																<i class="las la-trash"></i>
															</a>
														</div>
													<?php
													}
													?>
												</div>
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

<?php $this->section('script'); ?>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		// Ambil elemen input file
		const inputElement = document.querySelector('.filepond');

		// Inisialisasi FilePond
		const pond = FilePond.create(inputElement, {
			labelFileProcessingComplete: `Upload Berhasil`,
			labelTapToUndo: `ketuk untuk membatalkan`,
			labelTapToCancel: `ketuk untuk membatalkan`,
			labelFileProcessingError: `Gagal Memproses`,
			labelTapToRetry: `ketuk untuk coba lagi`,
			labelFileProcessing: `Sedang memproses`,
			labelIdle: `Seret dan tempel atau <span class="filepond--label-action">Pilih dokumen</span>`,
			allowMultiple: false,
			credits: false,
			labelIdle: 'Seret & Lepas file Anda atau <span class="filepond--label-action"> Telusuri </span>',
			server: {
				process: {
					url: '<?= base_url("file/upload") ?>',
					headers: {
						'X-CSRF-TOKEN': '<?= csrf_hash() ?>' // Kirim CSRF token
					}
				},
				revert: {
					url: '<?= base_url("file/delete") ?>',
					headers: {
						'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
					}
				}
			}
		});
		pond.on('processfileprogress', (file, progress) => {
			if (progress == 1) {
				document.getElementById('btn-submit').removeAttribute("disabled");
			}
		});
		pond.on('processfilerevert', (file) => {
			document.getElementById('btn-submit').setAttribute("disabled", "true");
		});
	});
</script>
<?= $this->endSection(); ?>