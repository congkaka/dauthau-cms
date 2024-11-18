<?php

return [
    [
        'text' => 'Dashboard',
        'icon' => 'bi bi-grid',
        'route' => 'admin.dashboard',
        'activeIs' => 'admin.dashboard',
    ],
    [
        'text' => 'User manager',
        'icon' => 'bi bi-people',
        'route' => 'admin.user.index',
        'activeIs' => 'admin.user.*',
    ],

    [
        'text' => 'Blogs manager',
        'icon' => 'bi bi-book',
        'route' => 'admin.blogs.index',
        'activeIs' => 'admin.blogs.*',
    ],

    [
        'text' => 'Slides manager',
        'icon' => 'bi bi-book',
        'route' => 'admin.slides.index',
        'activeIs' => 'admin.slides.*',
    ],

    [
        'text' => 'Expert manager',
        'icon' => 'bi bi-book',
        'route' => 'admin.expert.index',
        'activeIs' => 'admin.expert.*',
    ],

    [
        'text' => 'Partner manager',
        'icon' => 'bi bi-book',
        'route' => 'admin.partner.index',
        'activeIs' => 'admin.partner.*',
    ],

    [
        'text' => 'Category manager',
        'route' => 'admin.categories.index',
        'activeIs' => 'admin.categories.*',
        'icon' => 'bi bi-card-list'
    ],

    // [
    //     'text' => 'Stores manager',
    //     'route' => 'admin.stores.index',
    //     'activeIs' => 'admin.stores.*',
    //     'icon' => 'bi bi-shop'
    // ],

    [
        'text' => 'Permissions manager',
        'route' => 'admin.permissions.index',
        'activeIs' => 'admin.permissions.*',
        'icon' => 'bi bi-file-earmark-lock'
    ],

    [
        'text' => 'Cài đặt trang',
        'icon' => 'bi bi-gear',
        'activeIs' => 'admin.setting.*',
        'children' => [
            [
                'text' => 'Cài đặt liên hệ',
                'route' => 'admin.setting.contact',
                'activeIs' => 'admin.setting.contact',
                'icon' => 'bi bi-circle'
            ],
            // [
            //     'text' => 'Thông báo telegram',
            //     'route' => 'admin.setting.telegram',
            //     'activeIs' => 'admin.setting.telegram',
            //     'icon' => 'bi bi-circle'
            // ],
            // [
            //     'text' => 'Cài đặt ngân hàng',
            //     'route' => 'admin.setting.pay',
            //     'activeIs' => 'admin.setting.pay',
            //     'icon' => 'bi bi-circle'
            // ]
        ],
    ]
];
