<?php

return [
    [
        'title' => 'Dashboard',
        'route' => 'dashboard.index',     // الاسم الكامل مع dashboard.
        'icon' => 'nav-icon fas fa-tachometer-alt',
    ],
    [
        'title' => 'Categories',
        'route' => 'dashboard.categories.index',  // الاسم الكامل
        'icon' => 'nav-icon fas fa-list',
    ],
    [
        'title' => 'Stores',
        'route' => 'dashboard.stores.index',  // الاسم الكامل
        'icon' => 'nav-icon fas fa-store',
    ],
    [
        'title' => 'Products',
        'route' => 'dashboard.products.index',  // الاسم الكامل
        'icon' => 'nav-icon fas fa-box',
    ],
    [
        'title' => 'Two Factor Auth',
        'route' => 'dashboard.admin.2fa',  // الاسم الكامل
        'icon' => 'nav-icon fas fa-shield-alt',
    ],
];