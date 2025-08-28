<?php
$this->breadcrumbs=array(
	'setting'=>array('/SystemLogin/setting/index'),
	'Home Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-home',
	'title'=>'Home',
	'subtitle'=>'Home Edit',
);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'setting-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<div class="card mt-3 customs_page_statics">
	<div class="card-body p-4">
		<div class="widget border-bottom pb-4">
			<h5 class="widgettitle">Section 1</h5>
			<div class="widgetcontent">
				<div class="multilang pj-form-langbar">
					<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
					<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
					<?php endforeach ?>
				</div>
				<div class="divider5"></div>

					<?php if(Yii::app()->user->hasFlash('success')): ?>
						<?php $this->widget('bootstrap.widgets.TbAlert', array(
							'alerts'=>array('success'),
						)); ?>
					<?php endif; ?>

					<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
					<?php $this->widget('ImperaviRedactorWidget', array(
						'selector' => '.redactor',
						'options' => array(
							'imageUpload'=> $this->createUrl('admin/setting/uploadimage', array('type'=>'image')),
							'clipboardUploadUrl'=> $this->createUrl('admin/setting/uploadimage', array('type'=>'clip')),
						),
						'plugins' => array(
							'clips' => array(
							),
						),
					)); ?>


					<div class="row-fluid">
						<div class="span12">
							<?php $type = 'static_hm1_smalltitle'; ?>
							<?php Common::createSetting($type, 'Small Title', 'text', 'y') ?>
							<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
								<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
									<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
									<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

									<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
									<span class="help-inline _em_" style="display: none;">Please correct the error</span>
								</div>
							<?php endforeach ?>
							<?php $type = 'static_hm1_title'; ?>
							<?php Common::createSetting($type, 'Title', 'text', 'y') ?>
							<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
								<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
									<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
									<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

									<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
									<span class="help-inline _em_" style="display: none;">Please correct the error</span>
								</div>
							<?php endforeach ?>

							<div class="divider5"></div>
							<?php $type = 'static_hm1_content' ?>
							<?php Common::createSetting($type, 'Contents', 'text', 'y') ?>
							<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
								<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
									<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
									<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10 redactor"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>
									<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
									<span class="help-inline _em_" style="display: none;">Please correct the error</span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<?php $this->widget('bootstrap.widgets.TbButton', array(
						'buttonType'=>'submit',
						'type'=>'primary',
						'label'=>'Save',
					)); ?>
			</div>
		</div>

		<div class="widget mt-4">
			<h5 class="widgettitle">Section 2</h5>
			<div class="widgetcontent">
					<div class="row">
						<div class="col-md-6">
							<?php $type = 'static_hm2_smalltitle'; ?>
							<?php Common::createSetting($type, 'Small Title', 'text', 'y') ?>
							<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
								<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
									<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
									<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

									<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
									<span class="help-inline _em_" style="display: none;">Please correct the error</span>
								</div>
							<?php endforeach ?>
						</div>
						<div class="col-md-6">
							<?php $type = 'static_hm2_title'; ?>
							<?php Common::createSetting($type, 'Title', 'text', 'y') ?>
							<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
								<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
									<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
									<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

									<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
									<span class="help-inline _em_" style="display: none;">Please correct the error</span>
								</div>
							<?php endforeach ?>
						</div>
					</div>
					<div class="py-2"></div>

					<div class="row">
						<?php for ($i=1; $i < 4; $i++) { ?>
						<div class="col-sm-4">
							<?php $type = 'static_hm2_data_image_'.$i; ?>
							<?php Common::createSetting($type, 'Picture '.$i, 'image', 'n') ?>
							<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
							<?php echo CHtml::fileField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12')) ?>
							<p class="help-block">NOTE: Picture size 709 x 450px, Larger image will be automatically cropped.</p>
							<?php if ($model[$type]['data']->value): ?>
								<div style="">
									<img style="height: auto; max-width: 150px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
								</div>
								<div class="clearfix" style="height: 10px;"></div>
							<?php endif ?>
							<div class="divider5"></div>
							<?php $type = 'static_hm2_data_title_'.$i; ?>
						<?php Common::createSetting($type, 'Title '.$i, 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code == $this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

								<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl . '/asset/backend/language/' . $value->code . '.png' ?>"></span>
								<span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
						<div class="divider5"></div>
						<?php $type = 'static_hm2_data_content_'.$i; ?>
						<?php Common::createSetting($type, 'Content '.$i, 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code == $this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

								<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl . '/asset/backend/language/' . $value->code . '.png' ?>"></span>
								<span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach; ?>

						<!-- static_hm2_data_link_1 -->
						 <?php /*
						<div class="df mb-2 d-flex flex-column control-group">
							<?php $type = 'static_hm2_data_link_'.$i ?>
							<?php Common::createSetting($type, 'Link '.$i, 'text', 'n') ?>
							<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
							<?php echo CHtml::textField('Setting[' . $model[$type]['data']->name . ']', $model[$type]['data']->value, array('class' => 'span12'))
							?>
						</div>*/ ?>

					</div>
					<?php } ?>
					</div>
					<div class="clear py-4"></div>
					<?php $this->widget('bootstrap.widgets.TbButton', array(
						'buttonType'=>'submit',
						'type'=>'primary',
						'label'=>'Save',
					)); ?>
			</div>
		</div>
		<!-- end section 1 -->

		<div class="widget hide hidden">
			<h4 class="widgettitle">SEO Page</h4>
			<div class="widgetcontent">
				<?php $type = 'home_meta_title'; ?>
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
				<?php $type = 'home_meta_keyword'; ?>
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
				<?php $type = 'home_meta_description'; ?>
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

	</div>
</div>

<script type="text/javascript">
if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.advanced = {
    init: function()
    {
        alert(1);
    }
}
jQuery(function( $ ) {
	$('.multilang').multiLang({
	});
})
</script>
<?php $this->endWidget(); ?>

<style type="text/css">
	.row-fluid.multiple_section [class*="span"] {
		margin: 0;
		padding: 0 10px;
	}
	.row-fluid.multiple_section input[class*="span"]{
		padding: 0;
	}
</style>