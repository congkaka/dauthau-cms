<?php

return [
    [
        'text' => 'Bảng điều khiển',
        'icon' => 'bi bi-grid',
        'route' => 'admin.dashboard',
        'activeIs' => 'admin.dashboard',
    ],
    [
        'text' => 'Thi thử',
        'icon' => 'bi bi-award-fill',
        'route' => 'admin.practice.index',
        'activeIs' => 'admin.practice.*',
    ],

    [
        'text' => 'Quản lý nhân viên',
        'icon' => 'bi bi-people',
        'route' => 'admin.user.index',
        'activeIs' => 'admin.user.*',
    ],

    [
        'text' => 'Tin tức & sự kiện',
        'icon' => 'bi bi-megaphone',
        'route' => 'admin.blogs.index',
        'activeIs' => 'admin.blogs.*',
    ],

    [
        'text' => 'Phản hồi bài viết',
        'icon' => 'bi bi-chat-right-quote-fill',
        'route' => 'admin.comments.index',
        'activeIs' => 'admin.comments.*',
    ],

    [
        'text' => 'Thảo luận cùng chuyên gia',
        'icon' => 'bi bi-send-plus',
        'route' => 'admin.discussions.index',
        'activeIs' => 'admin.discussions.*',
    ],

    // [
    //     'text' => 'Slides manager',
    //     'icon' => 'bi bi-book',
    //     'route' => 'admin.slides.index',
    //     'activeIs' => 'admin.slides.*',
    // ],

    [
        'text' => 'Chuyên gia',
        'icon' => 'bi bi-person-badge-fill',
        'route' => 'admin.expert.index',
        'activeIs' => 'admin.expert.*',
    ],

    [
        'text' => 'Đối tác',
        'icon' => 'bi bi-link',
        'route' => 'admin.partner.index',
        'activeIs' => 'admin.partner.*',
    ],

    [
        'text' => 'Dịch vụ đào tạo',
        'icon' => 'bi bi-person-video3',
        'route' => 'admin.training.index',
        'activeIs' => 'admin.training.*',
    ],

    // [
    //     'text' => 'Dịch vụ Tư vấn',
    //     'icon' => 'bi bi-book',
    //     'route' => 'admin.partner.index',
    //     'activeIs' => 'admin.partner.*',
    // ],

    [
        'text' => 'Văn bản pháp quy',
        'icon' => 'bi bi-book',
        'route' => 'admin.regulation.index',
        'activeIs' => 'admin.regulation.*',
    ],

    [
        'text' => 'Quản lý đăng ký',
        'icon' => 'bi bi-pencil-fill',
        'route' => 'admin.booking.index',
        'activeIs' => 'admin.booking.*',
    ],

    [
        'text' => 'Danh mục',
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
        'text' => 'Phân quyền',
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
            [
                'text' => 'Cài đặt footer',
                'route' => 'admin.setting.footer',
                'activeIs' => 'admin.setting.footer',
                'icon' => 'bi bi-circle'
            ],
            [
                'text' => 'Giới thiệu',
                'route' => 'admin.setting.info',
                'activeIs' => 'admin.setting.info',
                'icon' => 'bi bi-circle'
            ],
            [
                'text' => 'Cài đặt menu',
                'route' => 'admin.setting.menu',
                'activeIs' => 'admin.setting.menu',
                'icon' => 'bi bi-circle'
            ],
            [
                'text' => 'Cài đặt image',
                'route' => 'admin.setting.image',
                'activeIs' => 'admin.setting.image',
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
