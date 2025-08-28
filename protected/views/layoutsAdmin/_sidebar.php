<?php

$session = new CHttpSession;
$session->open();
$checks_user = $session['login']['group_id'];
$user = User::model()->findByAttributes(array('email' => Yii::app()->user->id));

$arrUser = array(
    '0' => 'Direktur / Manager',
    '1' => 'Admin',
);

/**
 * List Modules Data
 * Master, couriers, order_status, payments, warehouses
 * products: brands, categories, subcategories, products
 * orders: orders, order_items, order_reviews,
 * users: users, user_address_lists, users_orders, users_whislists
 * memberships: promotions, membership_level_master
 */

$menuLists = [
    // [
    //     'label' => 'Home',
    //     'menus' => [
    //         [
    //             'label' => 'Home',
    //             'icons' => 'bi bi-house',
    //             'menus' => [
    //                 'Slider List' => '/SystemLogin/slides/index',
    //                 'Static Home' => '/SystemLogin/static/home',
    //             ],
    //         ],
    //     ],
    // ],
    [
        'label' => 'Master Data',
        'menus' => [
            [
                'label' => 'Master Data',
                'icons' => 'bi bi-box',
                'menus' => [
                    'Couriers' => '/SystemLogin/couriers/index',
                    'Order Status' => '/SystemLogin/orderStatus/index',
                    // 'Payments' => '/SystemLogin/payments/index',
                    'Warehouses' => '/SystemLogin/warehouses/index',
                    'Promotions' => '/SystemLogin/promotions/index',
                    'Membership Level' => '/SystemLogin/membershipLevelMaster/index',
                ],
            ],
        ],
    ],
    [
        'label' => 'Orders Data',
        'menus' => [
            [
                'label' => 'Orders',
                'icons' => 'bi bi-box',
                'menus' => [
                    'Orders' => '/SystemLogin/orders/index',
                    'Order Reviews' => '/SystemLogin/reviews/index',
                ],
            ],
        ],
    ],
    [
        'label' => 'Customer Data',
        'menus' => [
            [
                'label' => 'Customer',
                'icons' => 'bi bi-box',
                'menus' => [
                    'Customers' => '/SystemLogin/customer/index',
                    'Addresses' => '/SystemLogin/customerAddresses/index',
                    'Wishlists' => '/SystemLogin/wishlists/index',
                ],
            ],
        ],
    ],
    [
        'label' => 'Products Data',
        'menus' => [
            [
                'label' => 'Products',
                'icons' => 'bi bi-box',
                'menus' => [
                    'Brands' => '/SystemLogin/masterBrands/index',
                    'Categories' => '/SystemLogin/masterCategories/index',
                    'Products' => '/SystemLogin/products/index',
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