<?php

return [
    'plugin' => [
        'name' => 'GdprPlus',
        'description' => 'This plugin adds additional features to the OFFLINE.Gdpr plugin',
    ],
    'components' => [
        'bannerwide' => [
            'name' => 'Cookies banner',
            'description' => 'Displays a wide cookie banner',
            'title' => 'This website uses cookies.',
            'message' => 'This website uses cookies to process personal data. One of the purposes of such processing is the integration of content and services provided by partners with whom we also share information, which they may combine with other information you have provided to them or that they have collected during your use of their services.<br />You are free to accept or refuse. Your consent is optional, not required to use the site, and may be withdrawn or modified at any time.',
            'bg_cookie' => [
                'title' => 'Cookie background',
                'description' => 'Includes cookie banner background image',
            ],
            'buttons' => [
                'accept_all' => 'Accept all',
                'accept_selection' => 'Save my choice',
            ],
            'color_scheme' => [
                'title' => 'Color scheme',
                'description' => 'Colors used to display the cookie banner (toggles and buttons)',
                'colors' => [
                    'red' => 'Red',
                    'orange' => 'Orange',
                    'amber' => 'Amber',
                    'yellow' => 'Yellow',
                    'lime' => 'Lime',
                    'green' => 'Vert',
                    'emerald' => 'Emerald',
                    'teal' => 'Teal',
                    'cyan' => 'Cyan',
                    'sky' => 'Sky',
                    'blue' => 'Blue',
                    'indigo' => 'Indigo',
                    'violet' => 'Violet',
                    'purple' => 'Purple',
                    'fuchsia' => 'Fuchsia',
                    'pink' => 'Pink',
                    'rose' => 'Rose',
                ]
            ],
        ],
    ],
];
