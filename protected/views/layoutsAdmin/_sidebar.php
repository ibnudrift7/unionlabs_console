<?php

$session = new CHttpSession;
$session->open();
$checks_user = $session['login']['group_id'];
$user = User::model()->findByAttributes(array('email' => Yii::app()->user->id));

$arrUser = array(
    '0' => 'Direktur / Manager',
    '1' => 'Admin',
);

$menuLists = [
    [
        'label' => 'Home',
        'menus' => [
            [
                'label' => 'Home',
                'icons' => 'bi bi-house',
                'menus' => [
                    'Slider List' => '/SystemLogin/slides/index',
                    'Static Home' => '/SystemLogin/static/home',
                ],
            ],
        ],
    ],
    [
        'label' => 'Media',
        'menus' => [
            [
                'label' => 'Media Module',
                'icons' => 'bi bi-newspaper',
                'menus' => [
                    'Type Media List' => '/SystemLogin/mediaTypes/index',
                    'Kategori Media List' => '/SystemLogin/mediaCategory/index',
                    'Data Media List' => '/SystemLogin/mediaList/index',
                    'Data Music List' => '/SystemLogin/musicList/index',
                ],
            ],
        ],
    ],

    [
        'label' => 'Artikel',
        'menus' => [
            [
                'label' => 'Artikel / News Module',
                'icons' => 'bi bi-signal',
                'menus' => [
                    'Type Artikel List' => '/SystemLogin/typeArtikel/index',
                    'Kategori Artikel List' => '/SystemLogin/articlesCategory/index',
                    'Data Artikel List' => '/SystemLogin/artikelList/index',
                ],
            ],
        ],
    ],

    [
        'label' => 'Support Module',
        'menus' => [
            [
                'label' => 'Support Module',
                'icons' => 'bi bi-headset',
                'menus' => [
                    'Bank Rekening' => '/SystemLogin/rekeningList/index',
                    'Static Page' => '/SystemLogin/static/support',
                ],
            ],
        ],
    ],
    [
        'label' => 'Membership Module',
        'menus' => [
            [
                'label' => 'Membership Module',
                'icons' => 'bi bi-envelope',
                'menus' => [
                    'Member User List' => '/SystemLogin/memberList/index',
                    'Member Post List' => '/SystemLogin/postItems/index',
                    'Member Post Comment' => '/SystemLogin/postComments/index',
                    'Member Post Types Data' => '/SystemLogin/postTypes/index',
                    'Member Post Like' => '/SystemLogin/postLikes/index',
                ],
            ],
        ],
    ],

    [
        'label' => 'Contact Module',
        'menus' => [
            [
                'label' => 'Contact Module',
                'icons' => 'bi bi-envelope',
                'menus' => [
                    'Static Page' => '/SystemLogin/static/contact',
                    'Enquire Form' => '/SystemLogin/enquire/index',
                ],
            ],
        ],
    ],

    [
        'label' => 'Settings',
        'menus' => [
            [
                'label' => 'Settings',
                'icons' => 'bi bi-gear',
                'menus' => [
                    'List Admin' => '/SystemLogin/administrator/index',
                    // 'General Setting' => '/SystemLogin/static/setups',
                ],
            ],
        ],
    ],
];

if (intval($user->group_id) == 1) {
    unset($menuLists[6]['menus'][0]['menus']['Company Lists']);
    // unset($menuLists[7]);
    // unset($menuLists[0]);
}

$arr_notShow = ['Support Module', 'Artikel', 'Media', 'Home', 'Settings'];
// $checks_user
?>

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="<?php echo CHtml::normalizeUrl(array('site/index')); ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        <?php
        foreach ($menuLists as $keys => $menuList) {
            if (!in_array($menuList['label'], $arr_notShow)) {
                echo '<li class="nav-item ps-3" style="background-color: #efefef; padding-top: 0.05rem; padding-bottom: 0.1rem; padding-left: 0.5rem !important;"><small style="font-size: 9px;">' . $menuList['label'] . '</small></li>';
            }

            if (count($menuList['menus']) > 0) {
                foreach ($menuList['menus'] as $key2 => $menu) {
                    echo '<li class="nav-item"><a class="nav-link collapsed" data-bs-target="#' . $keys . '_' . $key2 . '-nav" data-bs-toggle="collapse" href="#"><i class="' . $menu['icons'] . '"></i><span>' . $menu['label'] . '</span><i class="bi bi-chevron-down ms-auto"></i></a>';
                    echo '<ul id="' . $keys . '_' . $key2 . '-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">';
                    foreach ($menu['menus'] as $key => $value) {
                        echo '<li><a class="pe-3" href="' . CHtml::normalizeUrl(array($value)) . '"><i class="bi bi-circle"></i><span><small>' . $key . '</small></span></a></li>';
                    }
                    echo '</ul>';
                    echo '</li>';
                }
            }
        }
        ?>

        <li class="nav-item">
            <a class="nav-link " href="<?php echo CHtml::normalizeUrl(array('home/logout')); ?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </li>

    </ul>

</aside>