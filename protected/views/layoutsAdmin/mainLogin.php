<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= $this->assetAdminUrl ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $this->assetAdminUrl ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= $this->assetAdminUrl ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= $this->assetAdminUrl ?>/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= $this->assetAdminUrl ?>/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= $this->assetAdminUrl ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= $this->assetAdminUrl ?>/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <!-- <link href="<?php // echo $this->assetAdminUrl 
                    ?>/css/style.css" rel="stylesheet"> -->
</head>

<body>
  <?php echo $content ?>

  <!-- Vendor JS Files -->
  <script src="<?= $this->assetAdminUrl ?>/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= $this->assetAdminUrl ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= $this->assetAdminUrl ?>/vendor/chart.js/chart.umd.js"></script>
  <script src="<?= $this->assetAdminUrl ?>/vendor/echarts/echarts.min.js"></script>
  <script src="<?= $this->assetAdminUrl ?>/vendor/quill/quill.js"></script>
  <script src="<?= $this->assetAdminUrl ?>/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= $this->assetAdminUrl ?>/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= $this->assetAdminUrl ?>/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= $this->assetAdminUrl ?>/js/main.js"></script>
</body>

</html>