<?php
$e_activemenu = $this->action->id;
$controllers_ac = $this->id;
$session = new CHttpSession;
$session->open();
$login_member = $session['login_member'];

$active_menu_pg = $controllers_ac . '/' . $e_activemenu;

// echo CHtml::normalizeUrl(array('/home/index'));
// echo ($active_menu_pg == 'home/index')? 'homes_pg':'inside_pg'; 
?>

<!-- Header -->
<header class="hero-gradient text-white fixed w-full top-0 z-[10] animate-fade-in bg-opacity-30" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-0 md:px-4 py-4">
        <div class="flex items-center justify-between px-4">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="text-sm">
                    <a href="<?php echo CHtml::normalizeUrl(array('/home/index')) ?>">
                        <img src="<?php echo $this->assetBaseurl ?>logo-header.png" alt="Logo" class="md:ml-0 l-[-10px] md:l-0 w-[150px]">
                    </a>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8 text-sm font-medium">
                <a href="<?php echo CHtml::normalizeUrl(array('/home/index')) ?>" class="hover:text-purple-200 transition-colors">BERANDA</a>
                <a href="<?php echo CHtml::normalizeUrl(array('/media/index')) ?>" class="hover:text-purple-200 transition-colors">MEDIA</a>
                <a href="<?php echo CHtml::normalizeUrl(array('/blog/index/', 'type' => 'artikel')) ?>" class="hover:text-purple-200 transition-colors">ARTIKEL</a>
                <a href="<?php echo CHtml::normalizeUrl(array('/blog/index/', 'type' => 'berita')) ?>" class="hover:text-purple-200 transition-colors">BERITA & ACARA</a>
                <a href="<?php echo CHtml::normalizeUrl(array('/home/contact')) ?>" class="hover:text-purple-200 transition-colors">KONTAK</a>
            </nav>

            <!-- Login Button -->
            <div class="hidden md:block">
                <a href="https://buddhist-worship.vercel.app/login" class="bg-white text-purple-600 px-4 py-2 rounded-full text-sm font-semibold hover:bg-purple-50 transition-all">
                    MASUK / DAFTAR
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition class="md:hidden mt-4 pb-4 bg-black bg-opacity-20 px-4 py-2">
            <nav class="flex flex-col space-y-3 text-sm">
                <a href="<?php echo CHtml::normalizeUrl(array('/home/index')) ?>">BERANDA</a>
                <a href="<?php echo CHtml::normalizeUrl(array('/media/index')) ?>">MEDIA</a>
                <a href="<?php echo CHtml::normalizeUrl(array('/blog/index/', 'type' => 'artikel')) ?>">ARTIKEL</a>
                <a href="<?php echo CHtml::normalizeUrl(array('/blog/index/', 'type' => 'berita')) ?>">BERITA & ACARA</a>
                <a href="<?php echo CHtml::normalizeUrl(array('/home/contact')) ?>">KONTAK</a>
                <a href="https://buddhist-worship.vercel.app/login" class="bg-white text-purple-600 px-4 py-2 rounded-full text-sm font-semibold w-fit">
                    MASUK / DAFTAR
                </a>
            </nav>
        </div>
    </div>
</header>
<!-- End Header -->