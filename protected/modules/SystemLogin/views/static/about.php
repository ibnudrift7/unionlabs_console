<?php
$this->breadcrumbs = array(
	'setting' => array('/SystemLogin/setting/index'),
	'About Edit',
);

$this->pageHeader = array(
	'icon' => 'fa fa-home',
	'title' => 'About',
	'subtitle' => 'About Edit',
);
?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'setting-form',
	// 'type'=>'horizontal',
	'enableAjaxValidation' => false,
	'clientOptions' => array(
		'validateOnSubmit' => false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
<?php $this->widget('ImperaviRedactorWidget', array(
	'selector' => '.redactor',
	'options' => array(
		'imageUpload' => $this->createUrl('setting/uploadimage', array('type' => 'image')),
		'clipboardUploadUrl' => $this->createUrl('setting/uploadimage', array('type' => 'clip')),
	),
	'plugins' => array(
		'clips' => array(),
	),
)); ?>

<div class="card mt-3 customs_page_statics">
	<div class="card-body">
		<h5 class="card-title">
			<?=
			$this->pageHeader['subtitle'] ?>
		</h5>

		<div class="card">
			<h4 class="card-title p-3">Section Hero</h4>
			<div class="card-body">
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
				<div class="d-flex flex-row fxn_basis">
					<div>
						<?php $type = 'about_hero_cover'; ?>
						<?php Common::createSetting($type, 'Picture', 'image', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::fileField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')) ?>
						<p class="help-block">NOTE: Picture size 709 x 450px, Larger image will be automatically cropped.</p>
						<?php if ($model[$type]['data']->value): ?>
							<div style="">
								<img style="height: auto; max-width: 450px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
							</div>
							<div class="clearfix" style="height: 15px;"></div>
							<div class="clearfix" style="height: 1px;"></div>
						<?php endif ?>
					</div>
					<div>
						<?php $type = 'about_hero_title'; ?>
						<?php Common::createSetting($type, 'Title', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group cstn" style="display: <?php if ($value->code == $this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="col-sm-9">
							</div>
							<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl . '/asset/backend/language/' . $value->code . '.png' ?>"></span>
							<span class="help-inline _em_" style="display: none;">Please correct the error</span>
						<?php endforeach ?>
					</div>
				</div>




				<div class="divider5"></div>

				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType' => 'submit',
					'type' => 'primary',
					'label' => 'Save',
				)); ?>
			</div>
		</div>

		<div class="card">
			<h4 class="card-title p-3">Section About 1</h4>
			<div class="card-body">
				<div class="multilang pj-form-langbar">
					<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
						<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl . '/asset/backend/language/' . $value->code . '.png' ?>" class="pj-form-langbar-item <?php if ($value->code == $this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl . '/asset/backend/language/' . $value->code . '.png' ?>);"></abbr></a>
					<?php endforeach ?>
				</div>
				<div class="divider5"></div>

				<?php $type = 'about_history_content'; ?>
				<?php Common::createSetting($type, 'Content History', 'text', 'y') ?>
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code == $this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
						<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span12 redactor" rows="4"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

						<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl . '/asset/backend/language/' . $value->code . '.png' ?>"></span>
						<span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>
				<?php endforeach ?>

				<?php $type = 'about_history_banner_picture'; ?>
				<?php Common::createSetting($type, 'Picture', 'image', 'n') ?>
				<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<?php echo CHtml::fileField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')) ?>
				<p class="help-block">NOTE: Picture size 867 x 486px, Larger image will be automatically cropped.</p>
				<?php if ($model[$type]['data']->value): ?>
					<div style="">
						<img style="height: auto; max-width: 250px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
					</div>
					<div class="clearfix" style="height: 10px;"></div>
				<?php endif ?>

				<div class="divider15"></div>
				<hr>
				<div class="divider15"></div>

				<?php $type = 'about_why_content'; ?>
				<?php Common::createSetting($type, 'Content Why About', 'text', 'y') ?>
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code == $this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
						<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span12 redactor" rows="4"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

						<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl . '/asset/backend/language/' . $value->code . '.png' ?>"></span>
						<span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>
				<?php endforeach ?>

				<div class="row">
					<div class="col-md-12">
						<?php $type = 'about_why_banner_picture_1'; ?>
						<?php Common::createSetting($type, 'Picture Banner', 'image', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::fileField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')) ?>
						<p class="help-block">NOTE: Picture size 690 x 450px, Larger image will be automatically cropped.</p>
						<?php if ($model[$type]['data']->value): ?>
							<div style="">
								<img style="height: auto; max-width: 250px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
							</div>
							<div class="clearfix" style="height: 10px;"></div>
						<?php endif ?>
					</div>
				</div>


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
<style type="text/css">
	.row-fluid.lists_cont {
		width: 100%;
		margin: 0 -1em;
		display: block;
	}

	.row-fluid.lists_cont .span6,
	.row-fluid.lists_cont .span4 {
		width: 33%;
		padding: 0 1em;
		margin: 0;
		margin-left: 0;
		float: none;
		display: inline-block;
	}

	.row-fluid.lists_cont .span6 {
		width: 48%;
	}
</style>