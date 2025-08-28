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
        <div class="pagetitle">
            <h1>Dashboard - <?php echo $data['title']; ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo Yii::app()->createUrl('SystemLogin/site/index'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard <?php echo $data['title']; ?></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="right_info text-end text-right">
            <a href="<?php echo Yii::app()->createUrl('SystemLogin/site/index', ['proyek_id' => $_GET['projects']]); ?>" class="btn btn-primary btn-sm">Kembali</a>
        </div>
    </div>
    <section class="section dashboard_detail">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dashboard - <?php echo $data['title']; ?></h5>
                        <form action="<?php echo Yii::app()->createUrl('SystemLogin/site/detail'); ?>" method="GET">
                            <input type="hidden" name="list_type" value="<?php echo $_GET['list_type']; ?>">
                            <input type="hidden" name="projects" value="<?php echo $_GET['projects']; ?>">
                            <div class="row">
                                <div class="col-md-4">
                                    <?php
                                    $startDate = $_GET['start_date'] ?? null;
                                    ?>
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo $startDate; ?>">
                                </div>
                                <div class="col-md-4">
                                    <?php
                                    $endDate = $_GET['end_date'] ?? null;
                                    ?>
                                    <label for="end_date">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" value="<?php echo $endDate; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label>&nbsp;</label>
                                    <button type="submit" class="btn btn-success form-control">Filter</button>
                                </div>
                            </div>
                        </form>

                        <div class="py-1"></div>
                        <hr>
                        <div class="py-1"></div>

                        <?php if (isset($data['grandTotal'])) { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Data</h5>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Nilai Uang</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $total = 0; ?>
                                                    <?php foreach ($data['data'] as $key => $value) {
                                                        $value = (object)$value;
                                                    ?>
                                                        <?php $total += $value->amount; ?>
                                                        <tr>
                                                            <td><?php echo $key + 1; ?></td>
                                                            <td><?php echo $value->date; ?></td>
                                                            <td><?php echo 'Rp ' . number_format($value->amount, 2, ',', '.'); ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="2"><b>Grand Total</b></td>
                                                        <td><?php echo 'Rp ' . number_format($total, 2, ',', '.'); ?></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Data tidak ditemukan!</strong>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- End #main -->

<script type="text/javascript">
    jQuery(document).ready(function($) {
        // list
    });
</script>