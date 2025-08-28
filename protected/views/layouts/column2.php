<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php echo $this->renderPartial('//layouts/_header', array()); ?>
<div class="py-9"></div>
<?php echo $content ?>
<?php echo $this->renderPartial('//layouts/_footer', array()); ?>
<?php $this->endContent(); ?>