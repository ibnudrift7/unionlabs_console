<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layoutsAdmin/main'); ?>

<main id="main" class="main">
    <?php // echo $this->pageHeader['subtitle'] 
    ?>
    <div class="pagetitle d-flex flex-row justify-content-between mb-0">
        <h1><?php echo $this->pageHeader['title'] ?></h1>
        <nav>
            <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                'links' => $this->breadcrumbs,
                'homeLink' => \CHtml::link('<i class="bx bx-home"></i>', array('/SystemLogin/site/index')),
                'separator' => ' ',
                'htmlOptions' => array(
                    'class' => 'breadcrumb customs_breadcrumb',
                )
            )); ?><!-- breadcrumbs -->
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <!-- start content -->
                <?php echo $content; ?>
                <!-- end content -->
            </div>
        </div>
    </section>
</main>

<script>
    jQuery(document).ready(function($) {
        // .customs_breadcrumb add li class
        $('.customs_breadcrumb li').addClass('breadcrumb-item');

        // find .btn-group and find .btn, add class btn-sm btn-primary
        // .btn-group
        $('.btn-group').addClass('btn-group-sm gap-3');
        $('.btn-group > .btn').addClass('btn-sm btn-primary px-3');

        // td.button-column a add class btn btn-sm
        $('td.button-column a').addClass('btn btn-sm btn-primary');
        $('td.button-column a.delete').addClass('btn btn-sm btn-danger');

        // fa fa-pencil change to bx bx-edit, trash
        $('td.button-column a i.fa.fa-pencil').removeClass('fa fa-pencil').addClass('bx bx-edit');
        $('td.button-column a i.fa.fa-trash-o').removeClass('fa fa-trash-o').addClass('bx bx-trash');

        // .control-group add row, label, input/select
        $('.control-group').addClass('row mb-4');
        $('.control-group label').addClass('col-sm-3 col-form-label');
        $('.control-group .controls').addClass('col-sm-9');
        $('.control-group .controls input, .control-group .controls select, .control-group .controls textarea').addClass('form-control');

        // items table table-bordered add .datatable-table
        $('.items.table.table-bordered').addClass('datatable-table');

        // .pagination > ul >> add class pagination, and li add page-item
        $('.pagination > ul').addClass('pagination pagination-sm');
        $('.pagination > ul li').addClass('page-item');
        $('.pagination > ul li a').addClass('page-link');

        // alert alert-block alert-error
        $('.alert.alert-block.alert-error').addClass('alert alert-danger');
        $('.alert.alert-block.alert-error > ul').addClass('mb-0');
    });
</script>

<?php $this->endContent(); ?>