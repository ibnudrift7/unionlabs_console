<?php /* @var $this Controller */
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="<?php // echo Yii::app()->baseUrl; 
                                        ?>/asset/backend/css/style.default.css" type="text/css" />
    <link rel="stylesheet" href="<?php // echo Yii::app()->baseUrl; 
                                    ?>/asset/backend/css/styles.css" type="text/css" /> -->

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- // favicon -->
    <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/asset/images/favicon.png" type="image/x-pngn">
    <link rel="icon" href="<?php echo Yii::app()->baseUrl; ?>/asset/images/favicon.png" type="image/x-icon">

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
    <link href="<?= $this->assetAdminUrl ?>/css/style.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.1/themes/base/jquery-ui.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.1/themes/base/theme.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <?php
    /*
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/asset/backend/css/responsive-tables.css">
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery-migrate-1.1.1.min.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery-ui-1.10.3.min.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/modernizr.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/responsive-tables.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/custom.js"></script>
    */
    ?>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/my.js"></script>
</head>

<body>
    <!-- ======= Header ======= -->
    <?php echo $this->renderPartial('//layoutsAdmin/_header'); ?>
    <!-- ======= End Header ======= -->


    <!-- ======= Sidebar ======= -->
    <?php echo $this->renderPartial('//layoutsAdmin/_sidebar');
    ?>
    <!-- End Sidebar-->

    <?php echo $content; ?>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <?php
        $strNames = 'UnionLabs';
        ?>
        <div class="copyright">
            &copy; Copyright <?= date("Y"); ?> <strong><span><?= $strNames ?></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- Designed by <a href="https://ammarindo.net/">ammarindo.net</a> -->
        </div>
    </footer>
    <!-- End Footer -->

    <?php
    $e_activemenu = $this->action->id;
    $controllers_ac = $this->id;
    $active_menu_pg = $controllers_ac . '/' . $e_activemenu;
    ?>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php
    $tsn_arrys = ['site/index', 'komisi/index'];
    if (in_array($active_menu_pg, $tsn_arrys)) :
    ?>
        <script src="<?= $this->assetAdminUrl ?>/vendor/apexcharts/apexcharts.min.js"></script>
        <!-- <script src="<?php // echo $this->assetAdminUrl 
                            ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
        <script src="<?= $this->assetAdminUrl ?>/vendor/chart.js/chart.umd.js"></script>
        <script src="<?= $this->assetAdminUrl ?>/vendor/echarts/echarts.min.js"></script>
        <script src="<?= $this->assetAdminUrl ?>/vendor/quill/quill.js"></script>
        <script src="<?= $this->assetAdminUrl ?>/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="<?= $this->assetAdminUrl ?>/vendor/tinymce/tinymce.min.js"></script>
        <script src="<?= $this->assetAdminUrl ?>/vendor/php-email-form/validate.js"></script>
    <?php endif; ?>

    <script src="<?= $this->assetAdminUrl ?>/js/main.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.grid-view').addClass('table-responsive');

            // select2
            $('.select2').select2();

            // simple chart
            var flash = [
                [0, 11],
                [1, 9],
                [2, 12],
                [3, 8],
                [4, 7],
                [5, 3],
                [6, 1]
            ];
            var html5 = [
                [0, 5],
                [1, 4],
                [2, 4],
                [3, 1],
                [4, 9],
                [5, 10],
                [6, 13]
            ];
            var css3 = [
                [0, 6],
                [1, 1],
                [2, 9],
                [3, 12],
                [4, 10],
                [5, 12],
                [6, 11]
            ];

            function showTooltip(x, y, contents) {
                $('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css({
                    position: 'absolute',
                    display: 'none',
                    top: y + 5,
                    left: x + 5
                }).appendTo("body").fadeIn(200);
            }

            //datepicker
            $('#datepicker').datepicker();
            $('.datepicker, .datepicker_st').datepicker({
                dateFormat: "yy-mm-dd",
                // minDate: 0,
            });

            $('.daterange').daterangepicker({
                opens: 'right',
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });

            $('.datepicker_time').datetimepicker({
                allowTimes: [
                    '08:00',
                    '09:00',
                    '10:00',
                    '11:00',
                    '13:00',
                    '14:00',
                    '15:00',
                    '16:00',
                    '14:00',
                ],
                minDate: '<?php echo date("Y/m/d"); ?>',
            });

            $('.numberAllow').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            // allow decimal
            $('.decimalAllow').on('input', function() {
                this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
                var val = parseFloat(this.value);
                if (isNaN(val)) {
                    this.value = '';
                } else if (val % 0.5 !== 0) {
                    this.value = (Math.round(val * 2) / 2).toFixed(1);
                }
            });

            // .defaultFormatMoney setting add keyup 1.000.000 and add outer form.. add span info Rupiah
            // function formatRupiahHolder(numbers, el) {
            //     let nVal = numbers.replace(/[^0-9]/g, '');
            //     nVal = parseFloat(nVal);
            //     if (isNaN(nVal)) {
            //         nVal = '';
            //     } else {
            //         nVal = nVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            //     }
            //     // find parent .controls and add span info
            //     let $parent = $(el).closest('.controls');
            //     // if ($parent.find('.infoRupiah').length === 0) {
            //     if (nVal.length === 0) {
            //         $parent.append('<span class="infoRupiah badge bg-light text-dark mt-1">-</span>');
            //     } else {
            //         $parent.find('.infoRupiah').remove();
            //         $parent.append('<span class="infoRupiah badge bg-light text-dark mt-1"><small>Rp.' + nVal + '</small></span>');
            //     }
            // }

            function formatRupiahHolder(numbers, el) {
                if (numbers == '') {
                    numbers = '0';
                }
                // Remove all except digits and dot (to preserve decimals)
                let cleanVal = numbers.replace(/[^0-9.]/g, '');
                let nVal = parseFloat(cleanVal);

                let formatted = '-';
                if (!isNaN(nVal)) {
                    // Convert to fixed 2 decimal places
                    let parts = nVal.toFixed(2).split('.');
                    let integerPart = parts[0];
                    let decimalPart = parts[1];

                    // Add thousand separator to integer part
                    integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

                    // Combine with comma decimal separator
                    formatted = 'Rp.' + integerPart + ',' + decimalPart;
                }

                // Find parent and inject label
                let $parent = $(el).closest('.controls');
                $parent.find('.infoRupiah').remove();
                $parent.append('<span class="infoRupiah badge bg-light text-dark mt-1"><small>' + formatted + '</small></span>');
            }


            $('.defaultFormatMoney').on('keyup', function() {
                // console.log(this.value, '$(this)');
                formatRupiahHolder(this.value, $(this));
            });

            $(window).on('load', function() {
                $('.defaultFormatMoney').trigger('keyup');
            });

            // change_act_projects
            $('.change_act_projects').on('change', function() {
                var project_id = $(this).find('.form-select').val();
                console.log(project_id);

                var url = '<?php echo CHtml::normalizeUrl(array('site/changeProjects')); ?>';
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        project_id: project_id
                    },
                    success: function(data) {
                        setTimeout(function() {
                            location.reload();
                        }, 750);
                    }
                });
            });

            // tabbed widget
            // jQuery('.tabbedwidget').tabs();
        });
    </script>
    <style>
        .badge {
            line-height: normal !important;
            vertical-align: middle;
        }

        .w-50 {
            width: 50%;
        }

        .w-33 {
            width: 33%;
        }

        .w-25 {
            width: 25%;
        }

        .w-30 {
            width: 30%;
        }

        .w-40 {
            width: 30%;
        }

        small {
            font-size: 0.7rem;
        }

        .table.table-bordered thead tr th {
            font-size: 13px;
        }

        .table.table-bordered tbody tr td input,
        .table.table-bordered tbody tr td select,
        .table.table-bordered tbody tr td {
            font-size: 12px;
        }

        p.help-block {
            margin-bottom: 0;
        }

        .sales-card {
            border-radius: 5px;
            border: none;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        .sales-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            border-radius: 0px;
            z-index: 2;
        }

        .sales-card.head-primary::before {
            background-color: #0dcaf0;
        }

        .sales-card.head-success::before {
            background-color: #198754;
        }

        .sales-card.head-warning::before {
            background-color: #ffc107;
        }

        .sales-card.head-danger::before {
            background-color: #dc3545;
        }

        .sales-card.head-info::before {
            background-color: #0dcaf0;
        }

        .card-green {
            border-top: 4px solid #198754;
        }

        .card-yellow {
            border-top: 4px solid #ffc107;
        }

        .card-purple {
            border-top: 4px solid #6f42c1;
        }

        .card-pink {
            border-top: 4px solid #d63384;
        }

        .card-red {
            border-top: 4px solid #dc3545;
        }

        .card-orange {
            border-top: 4px solid #fd7e14;
        }

        .card-teal {
            border-top: 4px solid #20c997;
        }

        .btn_hov_disable:hover {
            background-color: transparent !important;
            border-color: transparent !important;
        }

        .btn_hov_disable {
            font-size: 12px !important;
        }

        .h-175 {
            height: 175px !important;
        }

        .max-w-100 {
            max-width: 100px !important;
        }

        .max-w-150 {
            max-width: 150px !important;
        }

        .fz-14 {
            font-size: 14px !important;
        }

        .fz-13 {
            font-size: 13px !important;
        }

        .help-inline.error {
            font-size: 13px;
            padding-top: 5px;
            color: red;
            font-weight: 500;
        }
    </style>
</body>

</html>