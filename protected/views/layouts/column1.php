<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

	<div class="wrapper">
		<div class="bg-home-section1 relative hm-gradient-c2 !z-[10]">
			<div class="head_home z-[10]">
				<?php echo $this->renderPartial('//layouts/_header', array()); ?>
			</div>

			<!-- Hero Section -->
			<section id="home" class="relative h-[50vh] md:h-[80vh] flex items-center justify-center overflow-hidden">
				<div class="container mx-auto px-0 relative z-10 md:px-6">
					<!-- <div class="absolute inset-0 hero-gradient opacity-80 z-10"></div> -->
					<?php
					 $slides = Slides::model()->findAll(array('order' => 'sorts ASC'));

					 foreach ($slides as $slide) {
					 ?>
					<div class="pictures relative customs-shadow">
						<img src="<?php echo Yii::app()->baseUrl . ImageHelper::thumb(1280, 1279, '/images/slide/' . $slide->image2, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="Buddhist Worship" class="w-full h-full object-cover object-center z-10 md:hidden">
						<img src="<?php echo Yii::app()->baseUrl . ImageHelper::thumb(1670, 735, '/images/slide/' . $slide->image, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="Buddhist Worship" class="w-full h-full object-cover object-center z-10 hidden md:block">
						<div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 z-20 text-center text-white px-6 md:px-6 max-w-[1306px] md:max-w-full w-[80%] animate-slide-up">
							<h1 class="text-[20px] md:text-[35px] font-bold leading-tight bottom-6 md:bottom-12 animate-float">
								"<?php echo $slide->contents ?>"
							</h1>
						</div>
					</div>
					<?php } ?>

				</div>
			</section>
			<!-- end hero section -->
		</div>
		
		<?php echo $content ?>

		<?php echo $this->renderPartial('//layouts/_footer', array()); ?>
	</div>
	
<?php $this->endContent(); ?>