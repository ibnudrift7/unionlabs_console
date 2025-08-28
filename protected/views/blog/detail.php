<!-- Start contents -->
<main class="container mx-auto py-8 max-w-4xl">
        <div class="py-6"></div>
        <!-- Article Header -->
        <article class="bg-white">
            <header class="mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-4">
                    <?php echo $dataBlog->title; ?>
                </h1>
                <p class="text-gray-500 text-sm"><?php echo date('d F Y', strtotime($dataBlog->dates)); ?></p>
            </header>

            <!-- Featured Image -->
            <div class="mb-8">
                <img src="<?php echo $this->assetBaseurl ?>../../images/blog/<?php echo $dataBlog->image ?>" 
                     alt="<?php echo $dataBlog->title ?>" 
                     class="w-full max-w-xl rounded-lg shadow-lg">
            </div>

            <!-- Article Content -->
            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                <?php echo $dataBlog->content; ?>

                <div class="text-start pt-5">
                    <div class="flex space-x-2">
                        <a href="#"
                        onclick="history.back()"
                         class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Kembali ke daftar artikel
                        </a>
                        <a href="#" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Daftar
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.buddhistworship.org/hangout-5-celebration-of-faith/" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Bagikan
                        </a>
                    </div>

                </div>

                <div class="py-8"></div>
            </div>
        </article>
    </main>
    <!-- End contents -->