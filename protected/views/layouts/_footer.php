<!-- Footer -->
<footer id="kontak" class="media-gradient text-white pt-16 pb-8">
        <div class="container mx-auto px-6">
            <div class="text-center">
                <div class="flex items-center logo-middles_data justify-center">
                    <a href="#">
                        <img src="<?php echo $this->assetBaseurl ?>logo-footer.png" alt="Logo" class="w-[160px] object-contain">
                    </a>
                </div>
                <div class="py-3"></div>
                <div class="text-center text-[13px] text-[#fff] font-medium">
                    <p>Generasi muda yang belajar & berbagi ajaran Buddha melalui seni & musik.</p>
                </div>

                <div class="box-socmeds pt-6 flex md:flex-row flex-col justify-center gap-x-14">
                    <div class="left_side">
                        <span class="title_ftnm text-[15px] font-medium">TEMUKAN KAMI DI</span>
                        <div class="flex justify-center space-x-4 mb-8 pt-3">
                            <a target="_blank" href="<?php echo $this->setting['social_instagram'] ?>" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                <i class="fab fa-instagram text-white"></i>
                            </a>
                            <a target="_blank" href="<?php echo $this->setting['social_facebook'] ?>" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                <i class="fab fa-facebook text-white"></i>
                            </a>
                            <a target="_blank" href="<?php echo $this->setting['social_youtube'] ?>" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                <i class="fab fa-youtube text-white"></i>
                            </a>
                            <a target="_blank" href="<?php echo $this->setting['social_twitter'] ?>" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                <i class="fab fa-twitter text-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="right_side">
                        <span class="title_ftnm text-[15px] font-medium">DENGARKAN KAMI DI</span>
                        <div class="flex justify-center space-x-4 mb-8 pt-3">
                            <a target="_blank" href="<?php echo $this->setting['social_spotify'] ?>" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                <img src="<?php echo $this->assetBaseurl ?>n-spotify.png" alt="Spotify">
                            </a>
                            <a target="_blank" href="<?php echo $this->setting['social_applemusic'] ?>" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                <img src="<?php echo $this->assetBaseurl ?>n-music.png" alt="Apple Music">
                            </a>
                            <a target="_blank" href="<?php echo $this->setting['social_youtubemusic'] ?>" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                <img src="<?php echo $this->assetBaseurl ?>n-ytbmusic.png" alt="Youtube">
                            </a>
                            <a target="_blank" href="<?php echo $this->setting['social_astreaming'] ?>" class="w-10 h-10 bg-white/0 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                <img src="<?php echo $this->assetBaseurl ?>n-listbkk.png" alt="Twitter">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lines-white h-[1px] bg-white/50"></div>
        <div class="container mx-auto px-6">
            <div class="text-xs opacity-70 pt-6 text-center">
                <p>&copy; 2024 Buddhist Worship. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <button type="button" class="fixed z-10 bottom-4 right-4 p-3 bg-white rounded-md shadow-lg hover:bg-gray-200 transition-all" id="back-to-top">
        <i class="fas fa-chevron-up text-lg"></i>
    </button>

    <script>
        const backToTopButton = document.getElementById('back-to-top');

        window.addEventListener('scroll', function () {
            if (document.body.scrollHeight > 500 && window.scrollY > 500) {
                backToTopButton.style.display = 'block';
            } else {
                backToTopButton.style.display = 'none';
            }
        });

        backToTopButton.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        const header = document.querySelector('header');
        const headerHeight = header.offsetHeight;
        window.addEventListener('scroll', function () {
            console.log(headerHeight);
            console.log(window.scrollY);
            if (window.scrollY > headerHeight) {
                header.classList.add('z-[200]', 'customAffixHeader');
            } else {
                header.classList.remove('z-[200]', 'customAffixHeader');
            }
        });

    </script>
