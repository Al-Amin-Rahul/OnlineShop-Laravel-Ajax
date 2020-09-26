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
            'description'  => 'Halal Ghor is an Islamic online shop in Bangladesh. We sell almost all Islamic products. One of our main objectives is to provide organic and fresh products Alhamdulillah. Halal Ghor have a own honey collector team, own various of oil production team and also a packaging team. Halal Ghor support cash on delivery of anywhere in Bangladesh. We are work for premium quality products and ensure lower product cost.', // set false to total remove
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
            'title'       => 'Halal Ghor - An Islamic Online Shop In Bangladesh', // set false to total remove
            'description' => 'Halal Ghor is an Islamic online shop in Bangladesh. We sell almost all Islamic products. One of our main objectives is to provide organic and fresh products Alhamdulillah. Halal Ghor have a own honey collector team, own various of oil production team and also a packaging team. Halal Ghor support cash on delivery of anywhere in Bangladesh. We are work for premium quality products and ensure lower product cost.', // set false to total remove
            'url'         =>  null, // Set null for using Url::current(), set false to total remove
            'type'        => 'Website',
            'site_name'   => 'Halal Ghor',
            'images'      => ['https://halalghor.com/front/images/home.PNG'],
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
            'title'       => 'Halal Ghor - An Islamic Online Shop In Bangladesh', // set false to total remove
            'description' => 'Halal Ghor is an Islamic online shop in Bangladesh. We sell almost all Islamic products. One of our main objectives is to provide organic and fresh products Alhamdulillah. Halal Ghor have a own honey collector team, own various of oil production team and also a packaging team. Halal Ghor support cash on delivery of anywhere in Bangladesh. We are work for premium quality products and ensure lower product cost.', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => ['https://halalghor.com/front/images/home.PNG'],
        ],
    ],
];
