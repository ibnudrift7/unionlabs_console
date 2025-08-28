<div class="py-7"></div>
<!-- Start contents -->
<div class="main-contents">
        <main class="bg-white min-h-screen">
            <div class="container mx-auto px-8 py-8">
                <!-- Back Button and Title -->
                <div class="flex items-center mb-8">
                    <button onclick="history.back()" class="mr-4 p-2 hover:bg-gray-100 rounded-full transition-colors">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <h1 class="text-2xl font-bold text-gray-900"><?php echo $data->names; ?></h1>
                </div>

                <!-- Content Grid -->
                <div class="grid grid-cols-1 px-20 mx-auto">
                    <img src="<?php echo Yii::app()->request->hostInfo . Yii::app()->baseUrl. '/images/music/'.$data->image_lyric ?>" alt="<?php echo $data->names; ?>" class="w-full object-cover">
                    <div class="clear"></div>
                </div>

                <!-- Additional Controls -->
                <div class="mt-12 max-w-7xl mx-auto">
                    <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                        
                        <button class="flex items-center space-x-2 bg-gray-100 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-200 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                            </svg>
                            <span>Bagikan</span>
                        </button>
                        
                    </div>
                </div>
            </div>
        </main>
        <div class="clear"></div>
     </div>
    <!-- End contents -->