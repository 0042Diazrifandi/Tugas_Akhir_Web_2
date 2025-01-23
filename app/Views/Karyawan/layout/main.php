<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KARYAWAN</title>
    <link href="<?= base_url('sbadmin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('sbadmin/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <style>
        .sidebar {
            background-color: #4e73df;
        }

        .sidebar-brand {
            font-size: 1.2rem;
            color: white;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .card-header {
            background: none;
            font-weight: bold;
            font-size: 1.2rem;
        }
    </style>
</head>

<body id="page-top">

    <div id="wrapper">
        <!-- Sidebar -->
        <?= $this->include('Karyawan/layout/sidebar') ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Header -->
                <?= $this->include('Karyawan/layout/header') ?>

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