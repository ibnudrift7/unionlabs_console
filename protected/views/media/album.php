<div class="py-7"></div>

    <!-- Start contents -->
     <div class="main-contents">
        <!-- Sub Navigation -->
        <div class="bg-white">
            <div class="container mx-auto px-4">
                <?php $this->renderPartial('//layouts/_top_mediafilter', [
                    'active' => 'album'
                ]); ?>
            </div>
        </div>
        <div class="py-5"></div>

        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-purple-900 via-purple-800 to-blue-900 text-white py-16 relative overflow-hidden">
            <!-- Background silhouettes -->
            <div class="absolute inset-0 opacity-30">
                <div class="absolute bottom-0 left-0 w-full h-full bg-gradient-to-t from-black/50 to-transparent" style="background-image: url('../asset/images/musik/cover-p-musik.jpg');"></div>
            </div>
            
            <div class="container mx-auto px-4 relative z-10">
                <div class="flex items-center justify-between max-w-6xl mx-auto">
                    <!-- Album Cover -->
                    <div class="flex-shrink-0">
                        <img src="../asset/images/musik/in-cov-rise.jpg" 
                            alt="Rise Album Cover" 
                            class="w-72 h-72 rounded-lg shadow-2xl">
                    </div>

                    <!-- Content -->
                    <div class="ml-16 flex-1">
                        <h1 class="text-4xl font-bold mb-4 leading-tight">
                            DENGARKAN ALBUM TERBARU<br>
                            DI PLATFORM MUSIK KESAYANGANMU
                        </h1>
                        
                        <!-- Music Platform Icons -->
                        <div class="flex items-center space-x-6 mt-8">
                            <img src="../asset/images/musik/icn-spotify.png" alt="Spotify" class="h-6">
                            <img src="../asset/images/musik/icn-ytbmusic.png" alt="Music" class="h-6">
                            <img src="../asset/images/musik/icn-apple.png" alt="Apple Music" class="h-6">
                            <img src="../asset/images/musik/icn-deezer.png" alt="Deezer" class="h-6">
                            <img src="../asset/images/musik/icn-playmusic.png" alt="Google Play" class="h-6">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Search Section -->
        <section class="bg-white py-8">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <div class="flex items-center justify-between">
                        <!-- Search Bar -->
                        <div class="relative flex-1 max-w-md">
                            <input type="text" 
                                placeholder="Ingin dengar lagu apa?" 
                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <button class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Filter Buttons -->
                        <div class="flex space-x-4 ml-8">
                            <button class="px-6 py-2 border border-gray-300 rounded-full text-gray-600 hover:bg-gray-50 transition-colors">
                                Album
                            </button>
                            <button class="px-6 py-2 border border-gray-300 rounded-full text-gray-600 hover:bg-gray-50 transition-colors">
                                Single & EP
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Albums Grid -->
        <section class="bg-white py-12">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php for ($i = 1; $i <= 3; $i++) { ?>
                        <!-- Album 1: Rise -->
                        <div class="group cursor-pointer">
                            <div class="relative overflow-hidden rounded-lg shadow-lg group-hover:shadow-xl transition-shadow">
                                <a href="<?php echo CHtml::normalizeUrl(array('/media/music')) ?>">
                                    <img src="../asset/images/musik/p-m1.jpg" 
                                        alt="Rise Album" 
                                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                                </a>
                            </div>
                            <div class="mt-4">
                                <h3 class="font-bold text-lg text-gray-900">Rise</h3>
                                <p class="text-gray-500">2025</p>
                            </div>
                        </div>

                        <!-- Album 2: Blessed -->
                        <div class="group cursor-pointer">
                            <div class="relative overflow-hidden rounded-lg shadow-lg group-hover:shadow-xl transition-shadow">
                                <a href="<?php echo CHtml::normalizeUrl(array('/media/music')) ?>">
                                    <img src="../asset/images/musik/p-m2.jpg" 
                                        alt="Blessed Album" 
                                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                                </a>
                            </div>
                            <div class="mt-4">
                                <h3 class="font-bold text-lg text-gray-900">Blessed</h3>
                                <p class="text-gray-500">2025</p>
                            </div>
                        </div>

                        <!-- Album 3: Kubersorak dan Bersyukur -->
                        <div class="group cursor-pointer">
                            <div class="relative overflow-hidden rounded-lg shadow-lg group-hover:shadow-xl transition-shadow">
                                <a href="<?php echo CHtml::normalizeUrl(array('/media/music')) ?>">
                                    <img src="../asset/images/musik/p-m3.jpg" 
                                        alt="Kubersorak dan Bersyukur Album" 
                                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                                </a>
                            </div>
                            <div class="mt-4">
                                <h3 class="font-bold text-lg text-gray-900">Kubersorak dan Bersyukur</h3>
                                <p class="text-gray-500">2025</p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="py-8"></div>
                </div>
            </div>
        </section>
     </div>
    <!-- End contents -->