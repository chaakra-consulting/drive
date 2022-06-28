<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="/"><img src="<?= base_url(); ?>/assets-themes/img/brand/logo-chaakra.png"
						class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark active" href="/"><img
						src="<?= base_url(); ?>/assets-themes/img/brand/logo-white.png" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="/"><img
						src="<?= base_url(); ?>/assets-themes/img/brand/favicon-chaakra.png" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="/"><img
						src="<?= base_url(); ?>/assets-themes/img/brand/favicon-chaakra.png" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="user-info">
							<h3 class="fw-semibold mt-3 mb-0">Drive Chaakra Consulting</h3>
						</div>
					</div>
				</div><br>
				<ul class="side-menu">
					<li class="slide">
						<a class="side-menu__item" href="/"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
</svg>&nbsp;&nbsp;&nbsp;
<span class="side-menu__label">Beranda</span>
						</a>
					</li>

					<li class="side-item side-item-category">Manajemen Data</li>
					<li class="slide">
						<a class="side-menu__item" data-bs-toggle="slide" href="#"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M13 19C13 19.34 13.04 19.67 13.09 20H4C2.9 20 2 19.11 2 18V6C2 4.89 2.89 4 4 4H10L12 6H20C21.1 6 22 6.89 22 8V13.81C21.12 13.3 20.1 13 19 13C15.69 13 13 15.69 13 19M17 15L14.5 18H16V22H18V18H19.5L17 15M22 20V16H20V20H18.5L21 23L23.5 20H22Z" />
</svg>&nbsp;&nbsp;&nbsp;
<span class="side-menu__label">Data Saya</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-bs-toggle="slide" href="#">
						<svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M19,20H4C2.89,20 2,19.1 2,18V6C2,4.89 2.89,4 4,4H10L12,6H19A2,2 0 0,1 21,8H21L4,8V18L6.14,10H23.21L20.93,18.5C20.7,19.37 19.92,20 19,20Z" />
</svg>&nbsp;&nbsp;&nbsp;
							<span class="side-menu__label">Data Perusahaan</span></a>
					</li>
<?php if(in_groups('admin') || in_groups('super admin')) : ?>
					<li class="side-item side-item-category">Manajemen User</li>
					<li class="slide">
						<a class="side-menu__item" data-bs-toggle="slide" href="#">
						<svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M10 4A4 4 0 0 0 6 8A4 4 0 0 0 10 12A4 4 0 0 0 14 8A4 4 0 0 0 10 4M17 12C16.87 12 16.76 12.09 16.74 12.21L16.55 13.53C16.25 13.66 15.96 13.82 15.7 14L14.46 13.5C14.35 13.5 14.22 13.5 14.15 13.63L13.15 15.36C13.09 15.47 13.11 15.6 13.21 15.68L14.27 16.5C14.25 16.67 14.24 16.83 14.24 17C14.24 17.17 14.25 17.33 14.27 17.5L13.21 18.32C13.12 18.4 13.09 18.53 13.15 18.64L14.15 20.37C14.21 20.5 14.34 20.5 14.46 20.5L15.7 20C15.96 20.18 16.24 20.35 16.55 20.47L16.74 21.79C16.76 21.91 16.86 22 17 22H19C19.11 22 19.22 21.91 19.24 21.79L19.43 20.47C19.73 20.34 20 20.18 20.27 20L21.5 20.5C21.63 20.5 21.76 20.5 21.83 20.37L22.83 18.64C22.89 18.53 22.86 18.4 22.77 18.32L21.7 17.5C21.72 17.33 21.74 17.17 21.74 17C21.74 16.83 21.73 16.67 21.7 16.5L22.76 15.68C22.85 15.6 22.88 15.47 22.82 15.36L21.82 13.63C21.76 13.5 21.63 13.5 21.5 13.5L20.27 14C20 13.82 19.73 13.65 19.42 13.53L19.23 12.21C19.22 12.09 19.11 12 19 12H17M10 14C5.58 14 2 15.79 2 18V20H11.68A7 7 0 0 1 11 17A7 7 0 0 1 11.64 14.09C11.11 14.03 10.56 14 10 14M18 15.5C18.83 15.5 19.5 16.17 19.5 17C19.5 17.83 18.83 18.5 18 18.5C17.16 18.5 16.5 17.83 16.5 17C16.5 16.17 17.17 15.5 18 15.5Z" />
</svg>&nbsp;&nbsp;&nbsp;
							<span class="side-menu__label"> Users</span></a>
					</li>
					<?php endif; ?>
				</ul>
			</div>
		</aside>
		<!-- main-sidebar -->
    
		<!-- main-content -->
		<div class="main-content app-content">