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
];
