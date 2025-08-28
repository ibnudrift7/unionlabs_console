<?php

$session = new CHttpSession;
$session->open();
$checks_user = $session['login']['group_id'];


$menuLists = [
    [
        'label' => 'Modules Membership',
        'menus' => [
            [
                'label' => 'Membership',
                'menus' => [
                    'Master Type User Agents' => '/SystemLogin/membership/type',
                    'Master Group User Agents' => '/SystemLogin/membership/group',
                    'View Level Membership' => '/SystemLogin/membership/level-view',
                ],
            ],
        ],
    ],
    [
        'label' => 'Modules Bookings',
        'menus' => [
            [
                'label' => 'Bookings',
                'menus' => [
                    'Get List Bookings' => '/SystemLogin/bookings',
                    'Report Booking Real' => '/SystemLogin/bookings/report',
                    'Get List Surveys' => '/SystemLogin/bookings/survey',
                    'Get List SLick ACC' => '/SystemLogin/bookings/slick-acc',
                ],
            ],
        ],
    ],
    [
        'label' => 'Modules Komisi',
        'menus' => [
            [
                'label' => 'Komisi',
                'menus' => [
                    'List Komisi User' => '/SystemLogin/komisi',
                    'List Request Penarikan' => '/SystemLogin/komisi/withdraw',
                    'Report Komisi User' => '/SystemLogin/komisi/report',
                ],
            ],
        ],
    ],
    [
        'label' => 'Reports',
        'menus' => [
            [
                'label' => 'Report',
                'menus' => [
                    'Report Booking' => '/SystemLogin/report/booking',
                    'Report Komisi' => '/SystemLogin/report/komisi',
                ],
            ],
        ],
    ],
    [
        'label' => 'Master Data',
        'menus' => [
            [
                'label' => 'Proyek',
                'menus' => [
                    'Proyek' => '/SystemLogin/proyek',
                    'List Proyek Strategis' => '/SystemLogin/proyek/strategis',
                    'List Project Facilities' => '/SystemLogin/proyek/facilities',
                    'List Photo Projects' => '/SystemLogin/proyek/photo',
                ],
            ],
            [
                'label' => 'Cluster',
                'menus' => [
                    'Cluster' => '/SystemLogin/cluster',
                    'Banner Clusters' => '/SystemLogin/cluster',
                ],
            ],
            [
                'label' => 'Landing Pages',
                'menus' => [
                    'Landing Pages' => '/SystemLogin/static',
                    'About Us' => '/SystemLogin/static/about',
                    'Contact Us' => '/SystemLogin/static/contact',
                    'Faq' => '/SystemLogin/static/faq',
                    'Promo List' => '/SystemLogin/static/promo',
                    'FAQ List' => '/SystemLogin/static/faq',
                ],
            ],
        ],
    ],
    [
        'label' => 'Siteplans Managements',
        'menus' => [
            [
                'label' => 'Siteplans',
                'menus' => [
                    'List Siteplans' => '/SystemLogin/siteplans',
                    'Input Siteplans Cluster' => '/SystemLogin/siteplans/cluster',
                ],
            ],
        ],
    ],

    [
        'label' => 'User Data',
        'menus' => [
            [
                'label' => 'User',
                'menus' => [
                    'List User Agents' => '/SystemLogin/user/agents',
                    'List User Customers' => '/SystemLogin/user/customers',
                    'List Admin' => '/SystemLogin/administrator/index',
                ],
            ],
        ],
    ],
];

// $checks_user

?>
<div class="leftmenu">
    <ul class="nav nav-tabs nav-stacked">
        <?php
        foreach ($menuLists as $menuList) {
            echo '<li class="nav-header text-uppercase">' . $menuList['label'] . '</li>';
            foreach ($menuList['menus'] as $menu) {
                echo '<li class="dropdown"><a href="#"><span class="fa fa-folder"></span> ' . $menu['label'] . '</a>';
                echo '<ul>';
                foreach ($menu['menus'] as $key => $value) {
                    echo '<li><a href="' . CHtml::normalizeUrl(array($value)) . '">' . $key . '</a></li>';
                }
                echo '</ul>';
                echo '</li>';
            }
        }
        ?>
        <!-- <li class="nav-header">Navigation</li> -->
        <!-- <li class="dropdown"><a href="#"><span class="fa fa-folder"></span> <?php // echo Tt::t('admin', 'Master Unit') 
                                                                                    ?></a>
            <ul>
                <li><a href="<?php // echo CHtml::normalizeUrl(array('/SystemLogin/unitMaster/index')); 
                                ?>">List Unit</a></li>
                <li><a href="<?php // echo CHtml::normalizeUrl(array('/SystemLogin/unitMaster/csv')); 
                                ?>">Import CSV - Unit</a></li>
            </ul>
        </li> -->

        <!-- <li><a href="<?php // echo CHtml::normalizeUrl(array('/SystemLogin/administrator/index')); 
                            ?>"><span class="fa fa fa-users"></span> Admin</a></li> -->
        <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/home/logout')); ?>"><span class="fa fa fa-sign-out"></span> Logout</a></li>
    </ul>
</div><!--leftmenu-->