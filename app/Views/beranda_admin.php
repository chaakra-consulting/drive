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
<!-- container -->
<div class="container-fluid">

	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="left-content">
			<div>
				<h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hai, Selamat Datang Kembali Admin!</h2>
				<p class="mg-b-0">Monitoring Data</p>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->

	<!-- row -->
	<div class="row row-sm">
		<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
			<div class="card overflow-hidden sales-card bg-primary-gradient">
				<div class="ps-3 pt-3 pe-3 pb-2 pt-0">
					<div class="">
						<h6 class="mb-3 tx-12 text-white">Data Proyek</h6>
					</div>
					<div class="pb-0 mt-0">
						<div class="d-flex">
							<div class="">
								<h4 class="tx-20 fw-bold mb-1 text-white"><?= $jumlah_proyek; ?></h4>
								<p class="mb-0 tx-12 text-white op-7">Data jumlah proyek perusahaan</p>
							</div>
						</div>
					</div>
				</div>
				<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
			</div>
		</div>
		<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
			<div class="card overflow-hidden sales-card bg-success-gradient">
				<div class="ps-3 pt-3 pe-3 pb-2 pt-0">
					<div class="">
						<h6 class="mb-3 tx-12 text-white">Penyimpanan Digunanakan</h6>
					</div>
					<div class="pb-0 mt-0">
						<div class="d-flex">
							<div class="">
								<h4 class="tx-20 fw-bold mb-1 text-white"><?= file_size($total_penyimpanan_digunakan); ?></h4>
								<p class="mb-0 tx-12 text-white op-7">Total size seluruh data yang ada</p>
							</div>
						</div>
					</div>
				</div>
				<span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
			</div>
		</div>
		<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
			<div class="card overflow-hidden sales-card bg-danger-gradient">
				<div class="ps-3 pt-3 pe-3 pb-2 pt-0">
					<div class="">
						<h6 class="mb-3 tx-12 text-white">Penyimpanan Maksimal</h6>
					</div>
					<div class="pb-0 mt-0">
						<div class="d-flex">
							<div class="">
								<h4 class="tx-20 fw-bold mb-1 text-white"><?= file_size($maksimal_penyimpanan); ?></h4>
								<p class="mb-0 tx-12 text-white op-7">Maksimal penyimpanan data</p>
							</div>
						</div>
					</div>
				</div>
				<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
			</div>
		</div>
	</div>
	<!-- row closed -->

	<!-- row opened -->
	<div class="row row-sm">
		<div class="col-xl-6 col-md-12 col-lg-12">
			<div class="card">
				<div class="card-header pb-1">
					<h3 class="card-title mb-2">Pengunjung Terakhir</h3>
					<p class="tx-12 mb-0 text-muted">Daftar pengunjung terakhir.</p>
				</div>
				<?php foreach ($pengunjung as $pengun) { ?>
					<div class="card-body p-0 customers mt-1">
						<div class="list-group list-lg-group list-group-flush">
							<div class="list-group-item list-group-item-action">
								<div class="media mt-0">
									<div class="media-body">
										<div class="d-flex align-items-center">
											<div class="mt-0">
												<h5 class="mb-1 tx-15"><?= $pengun->fullname ?></h5>
												<p class="mb-0 tx-13 text-muted">ID: #<?= $pengun->id ?>
													<?php if ($pengun->success == '1') {
														echo "<span class='text-success ms-2'>Login Sukses</span>";
													} else {
														echo "<span class='text-danger ms-2'>Login Gagal</span>";
													}
													?>
												</p>
											</div>
											<span class="ms-auto wd-45p fs-16 mt-2">
												<?= $pengun->date ?>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="col-xl-6 col-md-12 col-lg-6">
			<div class="card card-dashboard-eight pb-2">
				<h6 class="card-title">Daftar Penyimpanan Proyek Terbesar</h6><span class="d-block mg-b-10 text-muted tx-12">Daftar ukuran proyek dari terbesar.</span>
				
			</div>
		</div>
	</div>
	<!-- row close -->

	<!-- row opened -->
	<div class="row row-sm row-deck">
		<div class="col-md-12 col-lg-12 col-xl-12">
			<div class="card card-table-two">
				<div class="d-flex justify-content-between">
					<h4 class="card-title mb-1">Daftar File Terbaru</h4>
					<i class="mdi mdi-dots-horizontal text-gray"></i>
				</div>
				<span class="tx-12 tx-muted mb-3 ">File terbaru per-proyek.</span>
				<div class="table-responsive country-table">
					<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
						<thead>
							<tr>
								<th class="">No.</th>
								<th class="tx-right">Proyek</th>
								<th class="tx-right">Judul File</th>
								<th class="tx-right">Dibuat Pada</th>
								<th class="tx-right">Pembuat</th>
							</tr>
						</thead>
						
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /row -->
</div>
<!-- /Container -->
</div>
<!-- /main-content -->

<?= $this->endSection(); ?>