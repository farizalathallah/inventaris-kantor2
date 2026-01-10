<?php

return [

    'title' => 'Sistem Inventaris Kantor',
    'title_prefix' => '',
    'title_postfix' => '',

    'use_route_url' => false,
    'use_ico_only' => false,
    'use_full_favicon' => false,

    'google_fonts' => [
        'allowed' => true,
    ],

    'logo' => '<b>Inventaris</b>Barang',
    'logo_img' => 'vendor/adminlte/dist/img/LogoKantor.png',
    'logo_img_class' => 'brand-image elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Logo Kantor',

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => false,

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_btn' => 'btn-flat btn-primary',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_nav_accordion' => true,

    'auth' => [
        'login_url'    => 'login',
        'logout_url'   => 'logout',
        'register_url' => 'register',
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Items (INI BAGIAN YANG SAYA PERBAIKI TOTAL)
    |--------------------------------------------------------------------------
    */

    'menu' => [
        ['header' => 'MAIN NAVIGATION'],
        [
            'text' => 'Dashboard',
            'url'  => 'dashboard',
            'icon' => 'fas fa-fw fa-tachometer-alt',
        ],
        [
            'text' => 'Data Barang',
            'url'  => 'barang',
            'icon' => 'fas fa-fw fa-box',
        ],
        [
            'text' => 'Data Supplier',
            'url'  => 'supplier',
            'icon' => 'fas fa-fw fa-truck',
        ],
        [
            'text'    => 'Transaksi Barang',
            'icon'    => 'fas fa-fw fa-exchange-alt',
            'submenu' => [
                [
                    'text' => 'Barang Masuk',
                    'url'  => 'transaksi/masuk',
                    'icon' => 'fas fa-fw fa-arrow-down text-success',
                ],
                [
                    'text' => 'Barang Keluar',
                    'url'  => 'transaksi/keluar',
                    'icon' => 'fas fa-fw fa-arrow-up text-danger',
                ],
                [
                    'text' => 'Laporan',
                    'url'  => 'laporan', // Sesuai web.php kamu
                    'icon' => 'fas fa-fw fa-file-alt',
                ],
            ],
        ],
        ['header' => 'ACCOUNT'],
        [
            'text' => 'Manajemen User',
            'url'  => 'users', // Sesuai resource 'users' di web.php kamu
            'icon' => 'fas fa-fw fa-users-cog',
        ],
    ],

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    'plugins' => [
        'Datatables' => [
            'active' => true, // Saya aktifkan karena biasanya inventaris butuh tabel
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
    ],

    'livewire' => false,
];
