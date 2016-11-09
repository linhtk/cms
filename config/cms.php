<?php

return [

    'theme' => [

        'folder' => 'themes',
        'active' => 'default'

    ],

    'templates' => [

        'home' => cms\Templates\HomeTemplate::class,
        'blog' => cms\Templates\BlogTemplate::class,
        'blog.post' => cms\Templates\BlogPostTemplate::class,

    ]

];
