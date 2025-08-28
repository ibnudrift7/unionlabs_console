    <!-- Social Media Icons -->
    <div class="absolute right-3 md:right-6 top-1/4 md:top-1/2 transform -translate-y-1/2 z-20">
        <div class="flex flex-col space-y-4">
            <a target="_blank" href="<?php echo $this->setting['social_instagram'] ?>" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                <i class="fab fa-instagram text-white"></i>
            </a>
            <a target="_blank" href="<?php echo $this->setting['social_facebook'] ?>" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                <i class="fab fa-facebook text-white"></i>
            </a>
            <a target="_blank" href="<?php echo $this->setting['social_youtube'] ?>" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                <i class="fab fa-youtube text-white"></i>
            </a>
        </div>
    </div>
    <!-- end Social Media Icons -->

    <!-- Buddhist Worship Section -->
    <section class="py-16 md:py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-start md:max-w-[1414px] flex md:flex-row flex-col">
                <div class="md:w-[469px]">
                    <p class="text-[17px] text[#101010] tracking-[0.2rem] mb-4 uppercase font-medium"><?= $this->setting['static_hm1_smalltitle']; ?></p>
                    <h2 class="text-5xl md:text-7xl font-bold text-blue-600 mb-12 leading-tight gradient-c1"><?= $this->setting['static_hm1_title']; ?></h2>
                </div>
                <div class="right-content default_content md:w-[469px]">
                    <div class="text-[#101010] space-y-6 max-w-3xl mx-auto leading-[1.5]">
                        <?= $this->setting['static_hm1_content']; ?>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Media Section -->
    <section id="media" class="py-16 md:py-20 media-gradient add-background-leaf text-white min-h-[1000px] relative">
        <div class="container mx-auto px-6 relative py-10 z-[2]">
            <div class="text-center mb-16">
                <p class="text-xs opacity-80 mb-4 uppercase tracking-widest"><?= $this->setting['static_hm2_smalltitle']; ?></p>
                <h2 class="text-4xl md:text-5xl font-bold"><?= $this->setting['static_hm2_title']; ?></h2>
            </div>

            <!-- Vertical line with dots -->
            <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-white/30 rounded-lg"></div>

            <!-- Timeline items -->
            <div class="space-y-16 md:space-y-20">

                <!-- Item 1: Album -->
                <div class="flex items-center justify-between relative max-w-[907px] mx-auto">
                    <!-- Left card -->
                    <div class="w-1/2 pr-10 text-right">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $this->setting['static_hm2_data_image_1'] ?>" alt="Album"
                            class="mx-auto mb-4 rounded-lg shadow-lg md:max-w-[350px] max-w-[170px] object-cover" />
                    </div>
                    <!-- Dot -->
                    <div
                        class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-5 h-5 bg-white border-4 border-blue-500 rounded-full z-10">
                    </div>
                    <!-- Right card -->
                    <div class="w-1/2 pe-10 max-w-[356px]">
                        <h2 class="text-white font-bold text-md md:text-lg"><?= $this->setting['static_hm2_data_title_1']; ?></h2>
                        <p class="text-white text-xs md:text-sm mt-2"><?= $this->setting['static_hm2_data_content_1']; ?></p>
                        <button
                        onclick="window.location.href='<?php echo CHtml::normalizeUrl(array('/media/index', 'type' => 'album & musik')) ?>'"
                            class="mt-4 bg-white text-xs md:text-sm text-blue-600 px-4 py-1 rounded-full font-semibold hover:bg-gray-200 transition">Cek
                            Selengkapnya</button>
                    </div>
                </div>

                <!-- Item 2: Podcast -->
                <div class="flex items-center justify-between relative max-w-[907px] mx-auto">
                    <!-- Right card -->
                    <div class="w-1/2 pr-10 md:pr-0 md:pl-10 text-right max-w-[356px]">
                        <h2 class="text-white font-bold text-md md:text-lg"><?= $this->setting['static_hm2_data_title_2']; ?></h2>
                        <p class="text-white text-xs md:text-sm mt-2 text-xs md:text-sm"><?= $this->setting['static_hm2_data_content_2']; ?></p>
                        <button
                        onclick="window.location.href='<?php echo CHtml::normalizeUrl(array('/media/index', 'type' => 'podcast')) ?>'"
                            class="mt-4 bg-white text-xs md:text-sm text-blue-600 px-4 py-1 rounded-full font-semibold hover:bg-gray-200 transition">Selengkapnya</button>
                    </div>
                    <!-- Dot -->
                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 w-5 h-5 bg-white border-4 border-blue-500 rounded-full z-10 hidden md:block">
                    </div>
                    <div class="w-1/2 pr-10 md:pr-0 md:pl-10">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $this->setting['static_hm2_data_image_2'] ?>" alt="Video"
                        class="mx-auto mb-4 rounded-lg shadow-lg md:max-w-[350px] max-w-[170px] object-cover" />
                    </div>
                </div>

                <!-- Item 2: Video -->
                <div class="flex items-center justify-between relative max-w-[907px] mx-auto">
                    <!-- Left card -->
                    <div class="w-1/2 pr-10 md:pr-0 md:pl-10 text-right">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $this->setting['static_hm2_data_image_3'] ?>" alt="Video"
                            class="mx-auto mb-4 rounded-lg shadow-lg md:max-w-[350px] max-w-[170px] object-cover" />
                    </div>
                    <!-- Dot -->
                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 w-5 h-5 bg-white border-4 border-blue-500 rounded-full z-10 hidden md:block">
                    </div>
                    <!-- Right card -->
                    <div class="w-1/2 pe-10 max-w-[356px] text-left">
                        <h2 class="text-white font-bold text-md md:text-lg"><?= $this->setting['static_hm2_data_title_3']; ?></h2>
                        <p class="text-white text-sm mt-2 text-xs md:text-sm"><?= $this->setting['static_hm2_data_content_3']; ?></p>
                        <button
                        onclick="window.location.href='<?php echo CHtml::normalizeUrl(array('/media/index')) ?>'"
                            class="mt-4 bg-white text-blue-600 px-4 py-1 md:px-6 md:py-2 rounded-full text-xs md:text-sm font-semibold hover:bg-gray-200 transition">Selengkapnya</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- End Media Section -->

    <!-- Upcoming Events Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 py-6">
            <div class="text-center mb-16">
                <p class="text-xs text-gray-500 mb-4 uppercase tracking-widest">ACARA</p>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800">Acara Mendatang</h2>
            </div>

            <?php
            // get ArtikelList where type_artikel_id = 3
            $model_event = ArtikelList::model()->findAll(array(
                'condition' => 'type_artikel_id = 3',
                'order' => 'id DESC',
                'limit' => 5
            ));
            ?>

            <div class="max-w-4xl mx-auto space-y-7">
                <?php foreach ($model_event as $key => $value1) { ?>
                <!-- Event 1 -->
                <div class="bg-[#F4F4F4] hover:bg-[#ccc] rounded-2xl shadow-sm card-hover flex items-center relative">
                    <div class="relative">
                        <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(500,500, '/images/blog/'.$value1->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="Mengenal Ajaran Buddha" class="w-[200px] md:w-[300px] object-cover mr-6">
                        <div class="absolute top-1/2 transform -translate-y-1/2 right-0">
                            <div class="bg-blue-600 text-white rounded-full w-12 h-12 flex items-center justify-center font-bold text-lg">
                                <?php echo date('d', strtotime($value1->dates)); ?>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 ps-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-1"><?php echo $value1->title; ?></h3>
                        <p class="text-gray-600 text-sm"><?php echo $value1->waktu_acara; ?></p>
                    </div>
                </div>
                <!-- end items Event -->
                <?php } ?>                 
            </div>

            <div class="text-center mt-12">
                <button
                onclick="window.location.href='<?php echo CHtml::normalizeUrl(array('/blog/index/', 'type' => 'event')) ?>'"
                 class="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700 transition-all hover:translate-y-[-5px]">
                    Selengkapnya
                </button>
            </div>
        </div>
    </section>

    <!-- Articles Section -->
    <?php
    // get ArtikelList where type_artikel_id = 1
    $model_artikel = ArtikelList::model()->findAll(array(
        'condition' => 'type_artikel_id = 1',
        'order' => 'id DESC',
        'limit' => 4
    ));

    if($model_artikel){
    ?>
    <section id="artikel" class="py-20 media-gradient text-white bg_articles_home" x-data x-intersect="$el.classList.add('animate-fade-in')">
        <div class="container mx-auto px-6 py-6">
            <div class="text-center mb-16">
                <p class="text-xs opacity-80 mb-4 uppercase tracking-widest">ARTIKEL</p>
                <h2 class="text-4xl md:text-5xl font-bold">Renungan & Artikel</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <?php foreach ($model_artikel as $key => $value2) { ?>
                <!-- Article 1 -->
                <div class="bg-gradient-to-br from-purple-500 to-purple-700 rounded-xl md:rounded-2xl md:p-8 p-4 text-center card-hover animate-slide-in-left">
                    <div class="mb-0 pictures">
                        <a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id' => $value2->id, 'title' => Slug::Create($value2->title))) ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(500,500, '/images/blog/'.$value2->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo $value2->title; ?>" class="w-full rounded-md object-cover"></a>
                    </div>
                </div>
                <?php } ?>

            </div>
            <!-- end listing -->

            <div class="text-center mt-12">
                <button 
                onclick="window.location.href='<?php echo CHtml::normalizeUrl(array('/blog/index')) ?>'"
                class="bg-white text-purple-600 px-8 py-3 rounded-full font-semibold hover:bg-purple-50 transition-all hover:translate-y-[-5px]">
                    Baca Selengkapnya
                </button>
            </div>
        </div>
    </section>
    <?php } ?>
    
    <!-- Latest News Section -->
    <?php
    // get ArtikelList where type_artikel_id = 2
    $model_berita = ArtikelList::model()->findAll(array(
        'condition' => 'type_artikel_id = 2',
        'order' => 'id DESC',
        'limit' => 3
    ));
    if($model_berita){
    ?>
    <section id="berita" class="py-20 bg-white">
        <div class="container mx-auto px-6 py-6">
            <div class="text-center mb-16">
                <p class="text-xs text-gray-500 mb-4 uppercase tracking-widest">BERITA</p>
                <h2 class="text-4xl md:text-5xl font-bold gradient-c1">Berita Terkini</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <?php foreach ($model_berita as $key => $value3) { ?>
                <!-- News 1 -->
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden card-hover p-5 border-[1px] border-[#D9D9D9]">
                    <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(500,500, '/images/blog/'.$value3->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo $value3->title; ?>" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-3 leading-tight"><?php echo $value3->title; ?></h3>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed"><?php echo $value3->content; ?></p>
                        <div class="flex items-center text-xs text-gray-500">
                            <i class="far fa-calendar mr-2"></i>
                            <span><?php echo $value3->dates; ?></span>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="text-center mt-12">
                <button 
                onclick="window.location.href='<?php echo CHtml::normalizeUrl(array('/blog/index', 'type' => 'berita')) ?>'"
                class="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700 transition-all hover:translate-y-[-5px]">
                    Selengkapnya
                </button>
            </div>
        </div>
    </section>
    <?php } ?>