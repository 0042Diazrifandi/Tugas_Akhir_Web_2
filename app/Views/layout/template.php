<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?></title>
    
    <!-- SB Admin 2 CSS -->
    <link href="<?= base_url('sbadmin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('sbadmin/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?= $this->include('layout/sidebar') ?>
        
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <?= $this->include('layout/topbar') ?>

                <!-- Content -->
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>
        </div>
    </div>

    <!-- SB Admin 2 JS -->
    <script src="<?= base_url('sbadmin/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('sbadmin/js/sb-admin-2.min.js') ?>"></script>
</body>

</html>
