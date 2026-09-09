<?= $this->extend('template/content') ?>

<?= $this->section('content') ?>
<div class="content-wrapper mt-3">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-primary">
                        <?php echo session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-body">
                        <?php if ($sso_data == null || $sso_data->success == false): ?>
                            <div class="mb-2">
                                <div class="alert alert-warning">
                                    Silahkan sync menggunakan akun SSO yang terdaftar
                                </div>
                            </div>
                            <div class="py-2">
                                <h4>Sync Akun SSO Chaakra</h4>
                            </div>
                            <form action="<?= route_to('sync-sso') ?>" method="post">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-sync"></i> Sync</button>
                                </div>
                            </form>
                        <?php else: ?>
                            <div class="mb-2 text-center">
                                <img src="https://cdni.iconscout.com/illustration/premium/thumb/check-list-illustration-download-in-svg-png-gif-file-formats--business-task-daily-work-management-pack-people-illustrations-4452998.png?f=webp" alt="" srcset="" width="200">
                                <div class="mt-2">
                                    <h4>Sync Akun SSO Chaakra Sudah Terkait</h4>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>