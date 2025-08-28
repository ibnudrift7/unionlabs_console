<!-- Start contents -->
<div class="py-7"></div>
    <!-- Media Tabs -->
    <div class="bg-white shadow-sm">
        <div class="container mx-auto px-4">
        <?php $this->renderPartial('//layouts/_top_mediafilter', [
                'active' => strtolower($type) ?? 'video'
            ]); ?>
        </div>
    </div>
    <div class="py-5"></div>

    <?php
    $coverImage = 'cover-video.jpg';
        if(!empty($type_model->image)){
            $coverImage = Yii::app()->baseUrl.ImageHelper::thumb(1921,466, '/images/media_types/'.$type_model->image , array('method' => 'adaptiveResize', 'quality' => '90'));
        }    
    ?>
    <!-- Hero Section -->
    <div class="relative h-80 bg-gradient-to-r from-purple-900 via-purple-800 to-purple-700 overflow-hidden">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="absolute inset-0 bg-cover bg-no-repeat md:bg-contain md:bg-center" style="background-image: url('../asset/images/cover-video.jpg')"></div>
        <div class="relative z-10 h-full flex items-center justify-center">
            <div class="text-center text-white">
                <!-- Hero content can be added here if needed -->
            </div>
        </div>
    </div>
    <div class="py-5"></div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar -->
            <div class="lg:w-1/4">
                <!-- Search Section -->
                <div class="bg-white rounded-lg shadow-sm p-3 md:p-6 mb-6">
                    <h3 class="font-bold text-lg mb-4">CARI</h3>
                    <form action="<?= Yii::app()->createUrl('media/index', ['type' => $type]) ?>" method="get">
                        <div class="relative">
                            <input type="text" name="q" placeholder="Apa yang ingin kamu cari?" class="w-full pl-5 pr-4 py-3 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 border border-gray-300" />
                            <button type="submit" class="absolute top-1 right-1 px-2 py-2 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                                <i class="fas fa-search text-gray-600"></i>
                            </button>
                        </div>
                    </form>
                    
                    <div class="mb-6 mt-10">
                        <?php
                        $crtn2 = new CDbCriteria;
                        $crtn2->addCondition('deleted_at IS NULL');
                        $categoryList = MediaListCategory::model()->findAll($crtn2);
                        ?>
                        <h4 class="font-semibold mb-3">FILTER</h4>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <?php foreach ($categoryList as $data) { ?>
                            <a href="<?= Yii::app()->createUrl('media/index', ['type' => strtolower($type), 'category' => $data->id, 'category_name' => strtolower($data->name)]) ?>" class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm"><?= $data->name ?></a>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- <div class="mb-6">
                        <h4 class="font-semibold mb-3">TANGGAL</h4>
                        <div class="flex gap-2">
                            <input type="text" placeholder="DD/MM/YYYY" class="border border-gray-300 rounded px-3 py-2 text-sm flex-1">
                            <input type="text" placeholder="DD/MM/YYYY" class="border border-gray-300 rounded px-3 py-2 text-sm flex-1">
                        </div>
                    </div> -->

                    <!-- <button class="bg-purple-primary text-white px-6 py-2 rounded-lg font-semibold w-full hover:bg-purple-600 transition-colors">
                        Terapkan
                    </button> -->
                </div>
            </div>
            <!-- end sidebar -->

            <?php
                /*
                $listDataSide = [
                    [
                        'title' => 'Grow Glow Go',
                        'date' => '29 Okt 2021',
                        'image' => 'pc-video-1.jpg',
                    ],
                    [
                        'title' => 'Buddha Bersama Kita',
                        'date' => '20 Jul 2021',
                        'image' => 'pc-video-2.jpg',
                    ],
                    [
                        'title' => 'Buddha Bersama Kita',
                        'date' => '20 Jul 2021',
                        'image' => 'pc-video-3.jpg',
                    ],
                    [
                        'title' => 'Buddha Bersama Kita',
                        'date' => '20 Jul 2021',
                        'image' => 'pc-video-4.jpg',
                    ],
                    [
                        'title' => 'Buddha Bersama Kita',
                        'date' => '20 Jul 2021',
                        'image' => 'pc-video-5.jpg',
                    ],
                    [
                        'title' => 'Buddha Bersama Kita',
                        'date' => '20 Jul 2021',
                        'image' => 'pc-video-6.jpg',
                    ],
                ];
                */ 
            ?>
            <!-- Video Grid -->
            <div class="lg:w-3/4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php 
                    if(count($model->getData()) > 0) { ?>
                        <?php foreach ($model->getData() as $data) { ?>
                        <!-- Video 1 -->
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                            <div class="relative">
                                <?php
                            // musicDetail, detail
                            $strDetail = 'detail';
                            if($data->type_media_id == 2) {
                                $strDetail = 'music';
                            }
                            ?>
                            <a href="<?php echo CHtml::normalizeUrl(array('/media/'.$strDetail, 'id' => $data->id, 'slug' => Slug::Create($data->title))) ?>">
                            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(500,500, '/images/media/'.$data->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?= $data->title ?>" class="w-full object-cover max-w-[450px]">
                            </a>
                            <!-- <div class="absolute bottom-2 right-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">25:20</div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-2"><?= $data->title ?></h3>
                            <div class="flex items-center text-gray-600 text-sm">
                                <?php 
                                if($data->type_media_id == 2) {
                                ?>
                                <i class="fas fa-music mr-2"></i>
                                <span><?= $data->content ?></span>
                                <?php 
                                } else {
                                ?>
                                <i class="far fa-calendar mr-2"></i>
                                <span><?= date('d F Y', strtotime($data->date_event)) ?></span>
                                <?php 
                                } 
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } else { ?>
                        <div class="col-span-2">
                            <div class="text-center py-10">
                                <p class="text-gray-500">Tidak ada data</p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- end grid data -->

                <!-- Pagination -->
                <div class="flex justify-center items-center space-x-2 mt-8">
                    <!-- <button class="text-purple-primary hover:text-purple-600">‹ Prev</button>
                    <button class="text-gray-400">1</button>
                    <button class="text-gray-400">2</button>
                    <button class="bg-purple-primary text-white w-8 h-8 rounded-full">3</button>
                    <button class="text-gray-400">4</button>
                    <button class="text-gray-400">5</button>
                    <button class="text-purple-primary hover:text-purple-600">Next ›</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- End contents -->