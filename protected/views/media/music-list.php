<div class="py-7"></div>
<!-- Start contents -->
<div class="main-contents">
    <!-- Media Tabs -->
    <div class="bg-white shadow-sm">
        <div class="container mx-auto px-4">
            <?php $this->renderPartial('//layouts/_top_mediafilter', [
                'active' => 'album & musik'
            ]); ?>
        </div>
    </div>
    <div class="py-5"></div>

    <div class="container mx-auto px-4 py-8">
            <div class="mb-8">
                <button onclick="history.back()" class="flex items-center text-gray-500 hover:text-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span class="text-lg">Kembali</span>
                </button>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 mb-12 max-w-6xl mx-auto">
                <div class="flex-shrink-0">
                    <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(500,500, '/images/media/'.$data->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" 
                         alt="RISE Album Cover" 
                         class="w-80 object-cover rounded-lg shadow-lg">
                </div>

                 <!-- Album Info  -->
                  <div class="div">&nbsp;</div>
                <div class="flex-1 flex flex-col justify-center">
                    <p class="text-gray-500 text-lg mb-2">Album - <?php echo $data->title; ?></p>
                    <h1 class="text-6xl font-bold text-gray-900 mb-4"><?php echo $data->content; ?></h1>
                </div>
            </div>

            <?php

                // $trackingList = [
                //     [
                //         'number' => 1,
                //         'title' => 'Buddha Guruku',
                //         'duration' => '4:27',
                //     ],
                //     [
                //         'number' => 2,
                //         'title' => 'Bimbinglah Aku',
                //         'duration' => '4:38',
                //     ],
                //     [
                //         'number' => 3,
                //         'title' => 'Layak Dimuliakan',
                //         'duration' => '4:15',
                //     ],
                //     [
                //         'number' => 4,
                //         'title' => 'Minus One',
                //         'duration' => '4:27',
                //     ],
                //     [
                //         'number' => 5,
                //         'title' => 'Minus One + Back Vocals',
                //         'duration' => '4:27',
                //     ],
                // ];
            ?>

             <!-- Track Listing  -->
            <div class="max-w-6xl mx-auto">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                     <!-- Table Header  -->
                    <div class="bg-gray-50 border-b border-gray-200">
                        <div class="grid grid-cols-12 gap-4 px-6 py-4 text-sm font-medium text-gray-500">
                            <div class="col-span-1">#</div>
                            <div class="col-span-5">Judul</div>
                            <div class="col-span-2 text-center">Durasi</div>
                            <div class="col-span-2 text-center">Dengarkan Di</div>
                            <div class="col-span-2 text-center">Download</div>
                        </div>
                    </div>

                     <!-- Track Rows  -->
                    <div class="divide-y divide-gray-200">
                        <?php foreach ($musicData as $keys => $t_val): ?>
                        <div class="grid grid-cols-12 gap-4 px-6 py-4 hover:bg-gray-50 transition-colors">
                            <div class="col-span-1 text-gray-500 font-medium"><?php echo $keys + 1; ?></div>
                            <div class="col-span-5 text-gray-900 font-medium">
                                <a href="<?php echo Yii::app()->createUrl('/media/musicLyric', array('id' => $t_val->id, 'slug' => Slug::Create($t_val->names))) ?>" class="hover:text-purple-600 transition-colors">
                                    <?php echo $t_val->names; ?> <span class="hidden md:inline-block text-gray-500 hover:text-purple-600 transition-colors text-xs">- Lihat Nada</span>
                                </a>
                                <!-- <a href="<?php // echo Yii::app()->createUrl('/media/musicLyric', array('id' => $t_val->id, 'slug' => Slug::Create($t_val->names))) ?>" class="hover:text-purple-600 transition-colors">
                                    <span class="hidden md:inline-block text-gray-500 hover:text-purple-600 transition-colors text-xs">- Lihat Nada</span>
                                </a> -->
                            </div>
                            <div class="col-span-2 text-center text-gray-600"><?php echo $t_val->duration; ?></div>
                            <div class="col-span-2 text-center flex items-center justify-center">
                                <button class="w-8 h-8 bg-blue-600 hover:bg-blue-700 rounded-full transition-colors" onclick="playTrack('<?php echo Yii::app()->request->hostInfo . Yii::app()->baseUrl. '/images/music/'.$t_val->source_music; ?>', '<?php echo $t_val->names; ?>')">
                                    <svg class="w-4 h-4 text-white mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="col-span-2 text-center flex items-center justify-center">
                                <button class="w-8 h-8 bg-blue-600 hover:bg-blue-700 rounded-full transition-colors" 
                                onclick="downloadTrack('<?php echo Yii::app()->request->hostInfo . Yii::app()->baseUrl. '/images/music/'.$t_val->source_music; ?>', '<?php echo $t_val->names; ?>')"
                                >
                                    <svg class="w-4 h-4 text-white mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- end list -->

                </div>
                <div class="py-8"></div>
            </div>
        </div>
</div>
<!-- End contents -->

<script type="text/javascript">
    // playTrack
    function playTrack(trackUrl, trackName) {
        console.log(trackUrl, trackName);
        var audio = new Audio(trackUrl);
        audio.play();
    }

    // downloadTrack
    function downloadTrack(trackUrl, trackName) {
        var link = document.createElement('a');
        link.href = trackUrl;
        link.download = trackName;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>
