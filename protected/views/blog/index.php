    <?php
    $getsUrl = Yii::app()->request->getQuery('type');

    $criteria = new CDbCriteria;
    $criteria->compare('LOWER(name)', strtolower($getsUrl));
    $typeArtic = TypeArtikel::model()->find($criteria);

    $crt3 = new CDbCriteria;
    $crt3->addCondition('t.deleted_at IS NULL');
    $listCategory = ArticlesCategory::model()->findAll($crt3);
    ?>
    <!-- Hero Section -->
    <div class="relative h-80 bg-gradient-to-r from-purple-600 via-purple-500 to-blue-500 overflow-hidden z-0">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <img src="<?php echo $this->assetBaseurl.'../../images/type_artikel/'.$typeArtic->image ?>" alt="Group Photo" class="absolute inset-0 w-full h-full object-cover mix-blend-overlay">
        <div class="relative z-10 flex items-center justify-center h-full">
            <h1 class="md:text-6xl text-3xl font-bold text-white tracking-wider"><?php echo strtoupper($typeArtic->name) ?></h1>
        </div>
    </div>
    <div class="py-4"></div>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex gap-8">
            <!-- Sidebar -->
            <div class="w-80 flex-shrink-0">
                <!-- Search Section -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">CARI</h3>
                    <form action="<?php echo CHtml::normalizeUrl(array('/blog/index/', 'type' => 'artikel')) ?>" method="GET">
                        <input type="text" name="q" placeholder="Apa yang ingin kamu cari?" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <button type="submit" class="absolute right-3 top-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Filter Section -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">FILTER</h3>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <?php foreach ($listCategory as $category) { ?>
                            <a href="<?php echo CHtml::normalizeUrl(array('/blog/index/', 'type' => 'artikel', 'category' => strtolower($category->name))) ?>" class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm cursor-pointer hover:bg-purple-100"><?php echo $category->name ?></a>
                        <?php } ?>
                    </div>
                </div>

                <!-- Date Filter -->
                <!-- <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">TANGGAL</h3>
                    <div class="space-y-3">
                        <input type="date" placeholder="DD/MM/YYYY" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 max-w-[200px] text-[14px]">
                        <input type="date" placeholder="DD/MM/YYYY" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 max-w-[200px] text-[14px]">
                        <button class="w-full bg-purple-600 text-white py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors">
                            Terapkan
                        </button>
                    </div>
                </div> -->
            </div>

            <?php
            // convert all to data array, and loop foreach
            $articles = [
                [
                    'title' => 'HANGOUT 5: A Celebration of Faith (Let\'s Make a Wish and Live in Buddha Dhamma)',
                    'date' => '22 Agustus 2022',
                    'image' => $this->assetBaseurl.'pc-artikel-1.jpg',
                    'category' => 'hangout',
                ],
                [
                    'title' => 'HANGOUT 4: The Ripple Effect of Giving',
                    'date' => '22 Agustus 2022',
                    'image' => $this->assetBaseurl.'pc-artikel-2.jpg',
                    'category' => 'hangout',
                ],
                [
                    'title' => 'Ngobrol Pintar: Menawan Diri',
                    'date' => '22 Agustus 2022',
                    'image' => $this->assetBaseurl.'pc-artikel-3.jpg',
                    'category' => 'ngobrol',
                ],
                [
                    'title' => '#BWgoestoBogor',
                    'date' => '22 Agustus 2022',
                    'image' => $this->assetBaseurl.'pc-artikel-4.jpg',
                    'category' => 'bwgoesto',
                ],
                [
                    'title' => 'HANGOUT 5: A Celebration of Faith (Let\'s Make a Wish and Live in Buddha Dhamma)',
                    'date' => '22 Agustus 2022',
                    'image' => $this->assetBaseurl.'pc-artikel-1.jpg',
                    'category' => 'hangout',
                ],
                [
                    'title' => 'Ngopi Santai: Digitalisasi Dhamma',
                    'date' => '22 Agustus 2022',
                    'image' => $this->assetBaseurl.'pc-artikel-2.jpg',
                    'category' => 'ngopi',
                ],
            ];
            ?>

            <!-- Main Content -->
            <div class="flex-1">
                <!-- Articles Grid -->
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <?php foreach ($dataBlog->data as $article) { ?>
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                        <div class="relative">
                            <a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id' => $article->id, 'title' => Slug::Create($article->title))) ?>">
                            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(500,500, '/images/blog/'.$article->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo $article->title; ?>" class="w-full object-cover">
                            </a>
                            <?php if ($article->articles_category_id !== null) { ?>
                            <div class="absolute top-4 left-4 bg-orange-500 text-white px-2 py-1 rounded text-xs font-semibold">
                                <?php echo $article->category->name; ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="p-4">
                            <div class="text-xs text-gray-500 mb-2"><?php echo date('d F Y', strtotime($article->dates)); ?></div>
                            <h3 class="font-semibold text-gray-800 mb-2"><?php echo $article->title; ?></h3>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- end data -->

                <!-- Pagination -->
                <div class="flex justify-center items-center space-x-2 pagination-wrap">
                    <!-- <button class="px-3 py-2 text-purple-600 hover:bg-purple-50 rounded">Prev</button>
                    <button class="px-3 py-2 text-gray-600 hover:bg-gray-50 rounded">1</button>
                    <button class="px-3 py-2 bg-purple-600 text-white rounded">2</button>
                    <button class="px-3 py-2 text-purple-600 hover:bg-purple-50 rounded">Next</button> -->
                    <?php $this->widget('CLinkPager', array(
                        'pages' => $dataBlog->getPagination(),
                        'header' => '',
                        'htmlOptions' => array('class' => 'pagination'),
                    )) ?>
                </div>
            </div>
        </div>
    </div>
    <style>
        .pagination-wrap {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>