<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

		<!-- Title -->
		<title> Drive - Chaakra Consulting </title>

		<!-- Favicon -->
		<link rel="icon" href="<?php echo base_url('assets-themes/img/brand/favicon-chaakra.png') ?>" type="image/x-icon"/>

		<!-- Icons css -->
		<link href="<?php echo base_url('assets-themes/css/icons.css') ?>" rel="stylesheet">

		<!-- Bootstrap css -->
		<link href="<?php echo base_url('assets-themes/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

		<!--  Right-sidemenu css -->
		<link href="<?php echo base_url('assets-themes/plugins/sidebar/sidebar.css') ?>" rel="stylesheet">

		<!-- P-scroll bar css-->
		<link href="<?php echo base_url('assets-themes/plugins/perfect-scrollbar/p-scrollbar.css') ?>" rel="stylesheet" />

		<!-- Sidemenu css -->
		<link rel="stylesheet" href="<?php echo base_url('assets-themes/css/sidemenu.css') ?>">

		<!--- Style css --->
		<link href="<?php echo base_url('assets-themes/css/style.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets-themes/css/boxed.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets-themes/css/dark-boxed.css') ?>" rel="stylesheet">

		<!--- Dark-mode css --->
		<link href="<?php echo base_url('assets-themes/css/style-dark.css') ?>" rel="stylesheet">

		<!---Skinmodes css-->
		<link href="<?php echo base_url('assets-themes/css/skin-modes.css') ?>" rel="stylesheet" />

		<!--- Animations css-->
		<link href="<?php echo base_url('assets-themes/css/animate.css') ?>" rel="stylesheet">

	</head>
	<body class="error-page1 main-body bg-light text-dark">

		<!-- Loader -->
		<div id="global-loader">
			<img src="<?php echo base_url('assets-themes/img/loader.svg') ?>" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- Page -->
		<div class="page">

			<div class="container-fluid">
				<div class="row no-gutter">
					<!-- The image half -->
					<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-warning-transparent">
						<div class="row wd-100p mx-auto text-center">
							<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
								<img src="<?php echo base_url('assets-themes/img/brand/logo-chaakra.png') ?>" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
							</div>
						</div>
					</div>
					<!-- The content half -->
					<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
						<div class="login d-flex align-items-center py-2">
							<!-- Demo content-->
							<div class="container p-0">
								<div class="row">
									<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
										<div class="card-sigin">
											<div class="mb-5 d-flex">
												<a href="index.html"><img src="<?php echo base_url('assets-themes/img/brand/favicon-chaakra.png') ?>" class="sign-favicon-a ht-80" alt="logo">
												<img src="<?php echo base_url('assets-themes/img/brand/favicon-white.png') ?>" class="sign-favicon-b ht-40" alt="logo">
												</a>
												<h1 class="main-logo1 ms-1 me-0 my-auto tx-28"><span>Drive Chaakra Consulting</span></h1>
											</div>
											<div class="card-sigin">
												<div class="main-signup-header">
													<h2><?=lang('Auth.loginTitle')?></h2>
													<h5 class="fw-semibold mb-4">Silahkan log in terlebih dahulu untuk melanjutkan.</h5>
													<?= view('Myth\Auth\Views\_message_block') ?>
													
													<form action="<?= route_to('login') ?>" method="post">
						<?= csrf_field() ?>

<?php if ($config->validFields === ['email']): ?>
						<div class="form-group">
							<label for="login"><?=lang('Auth.email')?></label>
							<input type="email" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
								   name="login" placeholder="<?=lang('Auth.email')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
<?php else: ?>
						<div class="form-group">
							<label for="login"><?=lang('Auth.emailOrUsername')?></label>
							<input type="text" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
								   name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
<?php endif; ?>

						<div class="form-group">
							<label for="password"><?=lang('Auth.password')?></label>
							<input type="password" name="password" class="form-control  <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
							<div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
						</div>

<?php if ($config->allowRemembering): ?>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="remember" class="form-check-input" <?php if(old('remember')) : ?> checked <?php endif ?>>
								<?=lang('Auth.rememberMe')?>
							</label>
						</div>
<?php endif; ?>

						<br>

						<button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.loginAction')?></button>
					</form>
					<hr>
					<?php if ($config->activeResetter): ?>
						<div class="main-signin-footer mt-5">
					<p><a href="<?= route_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a></p>
<?php endif; ?>
<?php if ($config->activeResetter): ?>
	<p>Tidak Punya Akun? <a href="<?= route_to('register') ?>"><?=lang('Auth.needAnAccount')?></a></p>
<?php endif; ?>
</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- End -->
						</div>
					</div><!-- End -->
				</div>
			</div>

		</div>
		<!-- End Page -->

		<!-- JQuery min js -->
		<script src="<?php echo base_url('assets-themes/plugins/jquery/jquery.min.js') ?>"></script>

		<!-- Bootstrap Bundle js -->
		<script src="<?php echo base_url('assets-themes/plugins/bootstrap/js/popper.min.js') ?>"></script>
		<script src="<?php echo base_url('assets-themes/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

		<!-- Ionicons js -->
		<script src="<?php echo base_url('assets-themes/plugins/ionicons/ionicons.js') ?>"></script>

		<!-- Moment js -->
		<script src="<?php echo base_url('assets-themes/plugins/moment/moment.js') ?>"></script>

		<!-- P-scroll js -->
		<script src="<?php echo base_url('assets-themes/plugins/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>

		<!-- eva-icons js -->
		<script src="<?php echo base_url('assets-themes/js/eva-icons.min.js') ?>"></script>

		<!-- Rating js-->
		<script src="<?php echo base_url('assets-themes/plugins/rating/jquery.rating-stars.js') ?>"></script>
		<script src="<?php echo base_url('assets-themes/plugins/rating/jquery.barrating.js') ?>"></script>

		<!-- custom js -->
		<script src="<?php echo base_url('assets-themes/js/custom.js') ?>"></script>

	</body>
</html>