<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => false, // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['halalghor', 'halal ghor', 'HalalGhor', 'Halal Ghor', 'halal', 'Online Shopping'],
            'canonical'    => null, // Set null for using Url::current(), set false to total remove
            'robots'       => 'all', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Halal Ghor - Halal Perfume, Book, Fashion & Food', // set false to total remove
            'description' => 'আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।', // set false to total remove
            'url'         =>  null, // Set null for using Url::current(), set false to total remove
            'type'        => 'Website',
            'site_name'   => 'Halal Ghor',
            'images'      => ['http://halalghor.com/front/images/home.PNG'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Halal Ghor - Halal Perfume, Book, Fashion & Food', // set false to total remove
            'description' => 'আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => ['http://halalghor.com/front/images/home.PNG'],
        ],
    ],
];
