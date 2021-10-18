<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Settings
    |--------------------------------------------------------------------------
    |
    | Here you may specify the image request settings
    |
    | See https://gravatar.com/site/implement/images
    |
    */

    'image' => [

        /*
        |----------------------------------------------------------------------
        | Base URL 
        |----------------------------------------------------------------------
        |
        | You can specify url without secure protocol.
        |
        */
    
        'base_url' => 'https://www.gravatar.com/avatar',

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
        | Supported: URL, "", "404", "mp", "identicon", "monsterid",
        |       "wavatar", "retro", "robohash", "blank"
        |
        */

        'default' => '',

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
        |----------------------------------------------------------------------
        | File-type extension
        |----------------------------------------------------------------------
        |
        | If you require a file-type extension (some places do) then you may
        | also specify it.
        |
        | Supported: any extension
        | Example: ".jpg", ".png", ".gif"
        |
        */

        'extension' => '',
    ],

    /*
    |--------------------------------------------------------------------------
    | Profile Settings
    |--------------------------------------------------------------------------
    |
    | Here you may specify the profile request settings
    |
    | See https://gravatar.com/site/implement/profiles
    |
    */

    'profile' => [

        /*
        |----------------------------------------------------------------------
        | Base URL 
        |----------------------------------------------------------------------
        |
        | You can specify url without secure protocol: http://www.gravatar.com
        |
        */
    
        'base_url' => 'https://www.gravatar.com',
    ],

    /*
    |--------------------------------------------------------------------------
    | Storage Settings
    |--------------------------------------------------------------------------
    |
    | Additional feature for storing images on own server
    |
    */

    'storage' => [

        /*
        |----------------------------------------------------------------------
        | Storage Disk 
        |----------------------------------------------------------------------
        |
        | The disk on which to store added files and derived images by default.
        | Choose one of the disks you've configured in config/filesystems.php.
        | Set to null if you wouldn't to store images on server.
        |
        */

        'disk_name' => env('GRAVATAR_DISK', 'public'),

        /*
        |----------------------------------------------------------------------
        | File name 
        |----------------------------------------------------------------------
        |
        | Name template for images stored on disk.
        | Available parameters:
        | {hash} - Hashed Email;
        | {size} - Image Size;
        | {ext} - Image Extension;
        |
        */

        'file_name' => '{hash}{size}{ext}',
    ],
];
