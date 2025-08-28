<header id="header" class="header fixed-top d-flex align-items-center">
    <?php
    $user = User::model()->findByAttributes(array('email' => Yii::app()->user->id));
    $strNames = 'BUDHIST WRS';
    ?>
    <div class="d-flex align-items-center justify-content-between">
        <a href="<?php echo \CHtml::normalizeUrl(array('/SystemLogin/site/index')); ?>" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block"><?= $strNames ?></span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle" href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="<?php echo $this->assetAdminUrl ?>/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo Yii::app()->user->name ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php echo Yii::app()->user->name ?> </h6>
                        <span>Admin</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/setting/index')); ?>">
                            <i class="bi bi-gear"></i>
                            <span>List Administrator</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/home/logout')); ?>">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>