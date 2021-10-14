<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Gravatar Image Settings
    |--------------------------------------------------------------------------
    |
    | Here you may specify the image request settings
    |
    | See https://gravatar.com/site/implement/images
    |
    */

    'gravatar' => [

        /*
        |----------------------------------------------------------------------
        | Size
        |----------------------------------------------------------------------
        |
        | By default, images are presented at 80px by 80px if no size
        | parameter is supplied. You may request a specific image size,
        | which will be dynamically delivered from Gravatar.
        |
        | See https://gravatar.com/site/implement/images#size
        |
        */

        'size' => 80,

        /*
        |----------------------------------------------------------------------
        | Default Image
        |----------------------------------------------------------------------
        |
        | Here you can define the default image to be used when an email
        | address has no matching Gravatar image or when the gravatar specified
        | exceeds your maximum allowed content rating.
        |
        | See https://gravatar.com/site/implement/images#default-image
        |
        | Supported: null, URL, "404", "mp", "identicon", "monsterid",
        |       "wavatar", "retro", "robohash", "blank"
        |
        */

        'default_image' => null,

        /*
        |----------------------------------------------------------------------
        | Force Default
        |----------------------------------------------------------------------
        |
        | If for some reason you wanted to force the default image
        | to always be load, put it to true.
        |
        | See https://gravatar.com/site/implement/images#force-default
        |
        */

        'force_default' => false,

        /*
        |----------------------------------------------------------------------
        | Rating
        |----------------------------------------------------------------------
        |
        | Gravatar allows users to self-rate their images so that they can
        | indicate if an image is appropriate for a certain audience.
        | By default, only 'G' rated images are displayed unless you indicate
        | that you would like to see higher ratings.
        |
        | See https://gravatar.com/site/implement/images#rating
        |
        | Supported: "g", "pg", "r", "x"
        |
        */

        'rating' => 'g',

        /*
        |--------------------------------------------------------------------------
        | Gravatar image file-type extension
        |--------------------------------------------------------------------------
        |
        | If you require a file-type extension (some places do) then you may also specify it.
        |
        */

        'extension' => null,
    ],
];
