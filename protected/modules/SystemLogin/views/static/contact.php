<?php
$this->breadcrumbs = array(
	'setting' => array('/SystemLogin/setting/index'),
	'Contact Edit',
);

$this->pageHeader = array(
	'icon' => 'fa fa-home',
	'title' => 'Contact Us',
	'subtitle' => 'Contact Edit',
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

<div class="card mt-3 customs_page_statics">
	<div class="card-body">
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
		<div class="widget">
			<div class="card">
				<h4 class="card-header">Section 1</h4>
				<div class="card-body px-4">
					<div class="multilang pj-form-langbar">
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl . '/asset/backend/language/' . $value->code . '.png' ?>" class="pj-form-langbar-item <?php if ($value->code == $this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl . '/asset/backend/language/' . $value->code . '.png' ?>);"></abbr></a>
						<?php endforeach ?>
					</div>
					<div class="divider5"></div>

					<div class="row">
						<div class="col-sm-6">
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

							<?php $type = 'contact_hero_content'; ?>
							<?php Common::createSetting($type, 'Content', 'text', 'y') ?>
							<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
								<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code == $this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
									<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
									<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span12 redactor" rows="2"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

									<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl . '/asset/backend/language/' . $value->code . '.png' ?>"></span>
									<span class="help-inline _em_" style="display: none;">Please correct the error</span>
								</div>
							<?php endforeach ?>
						</div>
						<div class="col-sm-6">
						<?php $type = 'contact_hero_cover'; ?>
						<?php Common::createSetting($type, 'Picture', 'image', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::fileField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')) ?>
						<p class="help-block">NOTE: Picture size 709 x 450px, Larger image will be automatically cropped.</p>
						<?php if ($model[$type]['data']->value): ?>
							<div style="">
								<img style="height: auto; max-width: 150px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
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

		<?php /*
		<div class="widget">
			<h4 class="widgettitle">SEO Page</h4>
			<div class="widgetcontent">
				<?php $type = 'contact_meta_title'; ?>
				<?php Common::createSetting($type, 'Meta Title', 'text', 'y') ?>
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
						<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span12" rows="2"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

					    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
					    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>
				<?php endforeach ?>	
				<div class="divider5"></div>
				<?php $type = 'contact_meta_keyword'; ?>
				<?php Common::createSetting($type, 'Meta Keywords', 'text', 'y') ?>
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
						<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span12" rows="3"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

					    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
					    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>
				<?php endforeach ?>	
				<div class="divider5"></div>
				<?php $type = 'contact_meta_description'; ?>
				<?php Common::createSetting($type, 'Meta Description', 'text', 'y') ?>
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
						<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span12" rows="4"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

					    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
					    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>
				<?php endforeach ?>	
				<div class="divider5"></div>
				<p class="help-block">*) If not setting seo page, will be use seo setting from general setup</p>
				<div class="divider5"></div>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
						'buttonType'=>'submit',
						'type'=>'primary',
						'label'=>'Save',
					)); ?>
				<div class="clearfix"></div>				
			</div>
		</div>
		<!-- end seo -->
		*/ ?>

		<div class="card">
			<h4 class="card-title p-3">Section Info</h4>
			<div class="card-body">

				<?php if (Yii::app()->user->hasFlash('success')): ?>
					<?php $this->widget('bootstrap.widgets.TbAlert', array(
						'alerts' => array('success'),
					)); ?>
				<?php endif; ?>

				<?php $type = 'contact2_content'; ?>
				<?php Common::createSetting($type, 'Content 2', 'text', 'y') ?>
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code == $this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
						<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span12 redactor" rows="2"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

						<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl . '/asset/backend/language/' . $value->code . '.png' ?>"></span>
						<span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>
				<?php endforeach ?>
				<div class="py-2">
					<hr />
				</div>

				<div class="row">
					<div class="col-sm-4">
						<div class="d-flex flex-column">
							<?php $type = 'contact_phone'; ?>
							<?php Common::createSetting($type, 'Contact Phone', 'text', 'n') ?>
							<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
							<?php echo CHtml::textField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')) ?>
						</div>
					</div>
					<div class="col-sm-4">
						<div>
							<?php $type = 'contact_email'; ?>
							<?php Common::createSetting($type, 'Contact Email', 'text', 'n') ?>
							<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
							<?php echo CHtml::textField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')) ?>
						</div>
					</div>
					<div class="col-sm-4">
						<div>
							<?php $type = 'contact_whatsapp'; ?>
							<?php Common::createSetting($type, 'Contact Whatsapp', 'text', 'n') ?>
							<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
							<?php echo CHtml::textField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')) ?>
						</div>
					</div>
				</div>
				<div class="py-2">
					<hr>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="data_fx_flex_stcContact">
							<div class="">
								<?php $type = 'social_facebook'; ?>
								<?php Common::createSetting($type, 'Social Facebook', 'text', 'n') ?>
								<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<?php echo CHtml::textField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')); ?>
							</div>
							<div class="">
								<?php $type = 'social_instagram'; ?>
								<?php Common::createSetting($type, 'Social Instagram', 'text', 'n') ?>
								<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<?php echo CHtml::textField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')); ?>
							</div>
							<div class="">
								<?php $type = 'social_youtube'; ?>
								<?php Common::createSetting($type, 'Social Youtube', 'text', 'n') ?>
								<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<?php echo CHtml::textField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')); ?>
							</div>
							<div class="">
								<?php $type = 'social_twitter'; ?>
								<?php Common::createSetting($type, 'Social Twitter', 'text', 'n') ?>
								<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<?php echo CHtml::textField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')); ?>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
					<div class="data_fx_flex_stcContact">
							<div class="">
								<?php $type = 'social_spotify'; ?>
								<?php Common::createSetting($type, 'Social Spotify', 'text', 'n') ?>
								<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<?php echo CHtml::textField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')) ?>
							</div>
							<div class="">
								<?php $type = 'social_applemusic'; ?>
								<?php Common::createSetting($type, 'Social Apple Music', 'text', 'n') ?>
								<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<?php echo CHtml::textField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')) ?>
							</div>
							<div class="">
								<?php $type = 'social_youtubemusic'; ?>
								<?php Common::createSetting($type, 'Social Youtube Music', 'text', 'n') ?>
								<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<?php echo CHtml::textField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')) ?>
							</div>
							<div class="">
								<?php $type = 'social_astreaming'; ?>
								<?php Common::createSetting($type, 'Social A Streaming', 'text', 'n') ?>
								<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<?php echo CHtml::textField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')) ?>
							</div>
						</div>
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