<?php
$this->breadcrumbs = array(
    'setting' => array('/SystemLogin/setting/index'),
    'Setups Edit',
);

$this->pageHeader = array(
    'icon' => 'fa fa-home',
    'title' => 'Setups Us',
    'subtitle' => 'Setups Edit',
);
?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'setting-form',
    // 'type'=>'horizontal',
    'enableAjaxValidation' => false,
    'clientOptions' => array(
        'validateOnSubmit' => false,
    ),
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        'class' => 'form-horizontal',
    ),
)); ?>
<?php if (Yii::app()->user->hasFlash('success')): ?>
    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts' => array('success'),
    )); ?>
<?php endif; ?>
<div class="card mt-3 customs_page_statics">
    <div class="card-body">
        <div class="widget">
            <div class="hidden hide">
                <h4 class="widgettitle">Section 1</h4>
                <div class="widgetcontent">
                    <div class="multilang pj-form-langbar">
                        <?php foreach (Language::model()->getLanguage() as $key => $value): ?>
                            <a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl . '/asset/backend/language/' . $value->code . '.png' ?>" class="pj-form-langbar-item <?php if ($value->code == $this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl . '/asset/backend/language/' . $value->code . '.png' ?>);"></abbr></a>
                        <?php endforeach ?>
                    </div>
                    <div class="divider5"></div>

                    <?php if (Yii::app()->user->hasFlash('success')): ?>
                        <?php $this->widget('bootstrap.widgets.TbAlert', array(
                            'alerts' => array('success'),
                        )); ?>
                    <?php endif; ?>

                    <?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
                    <?php $this->widget('ImperaviRedactorWidget', array(
                        'selector' => '.redactor',
                        'options' => array(
                            'imageUpload' => $this->createUrl('admin/setting/uploadimage', array('type' => 'image')),
                            'clipboardUploadUrl' => $this->createUrl('admin/setting/uploadimage', array('type' => 'clip')),
                        ),
                        'plugins' => array(
                            'clips' => array(),
                        ),
                    )); ?>

                    <?php $type = 'contact_hero_cover'; ?>
                    <?php Common::createSetting($type, 'Picture', 'image', 'n') ?>
                    <label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
                    <?php echo CHtml::fileField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')) ?>
                    <p class="help-block">NOTE: Picture size 709 x 450px, Larger image will be automatically cropped.</p>
                    <?php if ($model[$type]['data']->value): ?>
                        <div style="">
                            <img style="height: auto; max-width: 550px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
                        </div>
                        <div class="clearfix" style="height: 10px;"></div>
                    <?php endif ?>
                    <div class="divider5"></div>
                    <?php $type = 'contact_hero_title'; ?>
                    <?php Common::createSetting($type, 'Title', 'text', 'y') ?>
                    <?php foreach (Language::model()->getLanguage() as $key => $value): ?>
                        <div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code == $this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
                            <label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
                            <input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

                            <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl . '/asset/backend/language/' . $value->code . '.png' ?>"></span>
                            <span class="help-inline _em_" style="display: none;">Please correct the error</span>
                        </div>
                    <?php endforeach ?>

                    <?php $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType' => 'submit',
                        'type' => 'primary',
                        'label' => 'Save',
                    )); ?>
                </div>
            </div>
        </div>

        <div class="card">
            <h4 class="card-title p-3">Section Info</h4>
            <div class="card-body">

                <?php if (Yii::app()->user->hasFlash('success')): ?>
                    <?php $this->widget('bootstrap.widgets.TbAlert', array(
                        'alerts' => array('success'),
                    )); ?>
                <?php endif; ?>

                <div class="data_fx_flex_stcContact">
                    <div class="itm">
                        <?php $type = 'setups_preffix_no_po' ?>
                        <?php Common::createSetting($type, 'Preffix No PO.', 'text', 'n') ?>
                        <label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
                        <?php echo CHtml::textField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12', 'rows' => '3'))
                        ?>
                    </div>
                </div>

                <?php /*
				<?php $type = 'social_twitter'; ?>
				<?php Common::createSetting($type, 'Social Twitter', 'text', 'n') ?>
				<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')); ?>

				<?php $type = 'social_youtube'; ?>
				<?php Common::createSetting($type, 'Social Youtube', 'text', 'n') ?>
				<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')); ?>
				*/ ?>

                <div class="py-3"></div>
                <?php $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'type' => 'primary',
                    'label' => 'Save',
                )); ?>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

    RedactorPlugins.advanced = {
        init: function() {
            alert(1);
        }
    }
    jQuery(function($) {
        $('.multilang').multiLang({});
    })
</script>
<?php $this->endWidget(); ?>
<style type="text/css" media="screen">
    .row-fluid.list_data {
        margin: 0 -0.8em;
    }

    .row-fluid.list_data .span4 {
        margin-left: 0;
        padding: 0 0.8em;
    }
</style>