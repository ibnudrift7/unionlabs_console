<?php
$session = new CHttpSession;
$session->open();
$checks_user = $session['login']['group_id'];

$this->breadcrumbs = array(
    'Dashboard',
);

?>

<main id="main" class="main mt-0" style="margin-top: 0px !important;">
    <div class="d-flex justify-content-between">
        <div class="pagetitle mb-0">
            <h1>Dashboard <?= Yii::app()->name ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <div class="right_info">
            <!-- - -->
        </div>
    </div>
    <?php
        $list_shortcut = array(
            // array('name' => 'Media Module', 'url' => Yii::app()->createUrl('SystemLogin/mediaList/index'), 'icon' => 'bi bi-image', 'count' => MediaListItems::model()->count()),
            array('name' => 'Couriers Module', 'url' => Yii::app()->createUrl('SystemLogin/couriers/index'), 'icon' => 'bi bi-truck', 'count' => 0),
            array('name' => 'Order Status Module', 'url' => Yii::app()->createUrl('SystemLogin/orderStatus/index'), 'icon' => 'bi bi-truck', 'count' => 0),
            array('name' => 'Payments Module', 'url' => Yii::app()->createUrl('SystemLogin/payments/index'), 'icon' => 'bi bi-truck', 'count' => 0),
            array('name' => 'Warehouses Module', 'url' => Yii::app()->createUrl('SystemLogin/warehouses/index'), 'icon' => 'bi bi-truck', 'count' => 0),
        );
    ?>
    
    <section class="section dashboard">
        <!-- dashboard awal -->
        <div class="bg-white p-3">
            <div class="row">
                <!-- 3 thumbnail list to link media, artikel, support module -->
                <?php foreach ($list_shortcut as $key => $value): ?>
                <div class="col-md-4">
                    <div class="card info-card sales-card">
                      <div class="card-body">
                        <h5 class="card-title"><?= $value['name'] ?> <span>| Shortcut</span></h5>
                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="<?= $value['icon'] ?>"></i>
                          </div>
                          <div class="ps-3">
                            <h6><?= $value['count'] ?></h6>
                            <a href="<?= $value['url'] ?>" class="text-muted small pt-2 ps-1">Detail</a>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <?php endforeach ?>
                <!-- end items -->
                
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- end dashboard awal -->

        <div class="py-5"></div>
    </section>

</main>
<!-- End #main -->

<script type="text/javascript">
    jQuery(document).ready(function($) {
        // list
    });
</script>