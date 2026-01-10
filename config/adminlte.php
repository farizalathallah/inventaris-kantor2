<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title & Logo
    |--------------------------------------------------------------------------
    */
    'title' => 'Sistem Inventaris Kantor',
    'title_prefix' => '',
    'title_postfix' => '',

    'logo' => '<b>Inventaris</b>Barang',
    'logo_img' => 'vendor/adminlte/dist/img/Logo.png',
    'logo_img_class' => 'brand-image elevation-3',
    'logo_img_alt' => 'Logo Kantor',

    /*
|--------------------------------------------------------------------------
| User Menu
|--------------------------------------------------------------------------
*/
'usermenu_enabled' => true,
'usermenu_header' => true,
'usermenu_header_class' => 'bg-primary',
'usermenu_image' => true, // Set ke true agar foto profil muncul
'usermenu_desc' => true,
'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Authentication & Layout
    |--------------------------------------------------------------------------
    */
    'auth_logo' => [
        'enabled' => false,
    ],
    
    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,

    'classes_auth_card' => 'card-outline card-primary',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_topnav' => 'navbar-white navbar-light',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    */
    'auth' => [
        'login_url' => 'login',
        'logout_url' => 'logout',
        'register_url' => 'register',
    ],

    'dashboard_url' => 'dashboard',
    'logout_method' => null,

    /*
    |--------------------------------------------------------------------------
    | Menu Items (Navigasi Sidebar)
    |--------------------------------------------------------------------------
    */
    'menu' => [
        // Bagian Pencarian
        [
            'type' => 'navbar-search',
            'text' => 'search',
            'topnav_right' => true,
        ],
        [
            'type' => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Menu Utama
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
                    'url'  => 'laporan',
                    'icon' => 'fas fa-fw fa-file-alt',
                ],
            ],
        ],

        // Bagian Admin (Hanya muncul jika User memiliki role 'admin')
        ['header' => 'ADMIN AREA'],
        [
            'text' => 'Manajemen User',
            'url'  => 'users',
            'icon' => 'fas fa-fw fa-users-cog',
            'can'  => 'admin-only', // Terhubung dengan Gate di AuthServiceProvider
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    */
    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins
    |--------------------------------------------------------------------------
    */
    'plugins' => [
        'Datatables' => [
            'active' => true,
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
