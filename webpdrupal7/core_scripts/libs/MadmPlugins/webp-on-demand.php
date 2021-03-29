<?php

require(dirname(__FILE__).'/../../_settings.php'); // настройки по-умолчанию

if ( (defined('HOMEDIR') || function_exists('get_homedir') )
    && defined('WEBPPROJECT') && defined('WEBPCONVERT')){
    $webpconvert_autoload_path = get_homedir() . '/' . WEBPPROJECT . '/' . WEBPCONVERT . '/vendor/autoload.php';
} else {
    $webpconvert_autoload_path = $_SERVER["DOCUMENT_ROOT"] . '/'.trim($webp_core_fallback_location, '/').'/libs/WebpConvert/vendor/autoload.php';
}

if (!file_exists($webpconvert_autoload_path)){
    $webpconvert_autoload_path = $_SERVER["DOCUMENT_ROOT"] . '/sites/all/modules/webpdrupal7/core_scripts/libs/WebpConvert/vendor/autoload.php';
}

require_once $webpconvert_autoload_path;

use WebPConvert\WebPConvert;

$docRoot = rtrim($_SERVER["DOCUMENT_ROOT"], '/');
$requestUriNoQS = explode('?', $_SERVER['REQUEST_URI'])[0];
$source = $docRoot . urldecode($requestUriNoQS);           // Absolute file path to source file. Comes from the .htaccess
$destination = $source . '.webp';     // Store the converted images besides the original images (other options are available!)

WebPConvert::serveConverted($source, $destination, [
    'fail' => 'original',     // If failure, serve the original image (source). Other options include 'throw', '404' and 'report'
    //'show-report' => true,  // Generates a report instead of serving an image

    'serve-image' => [
        'headers' => [
            'cache-control' => true,
            'content-length' => true,
            'content-type' => true,
            'expires' => false,
            'last-modified' => true,
            'vary-accept' => false
        ],
        'cache-control-header' => 'public, max-age=31536000',
    ],

    'convert' => [
        'quality' => 90, // all convert option can be entered here (ie "quality")
        'png' => [
            //'skip' => true,
            'gd-skip' => true,
            'converters' => ['cwebp', 'vips', 'imagick', 'gmagick', 'imagemagick', 'graphicsmagick', 'wpc', 'ewww'],
        ],
        'encoding' => 'lossy',

        'converter-options' => [
            /*'wpc' => [
                'crypt-api-key-in-transfer' => false,
                'api-key' => 'use-any-phrase',
                'api-url' => 'https://example.com/other-includ/webp-cloud/wpc.php',
                'api-version' => 1,
            ],*/
            /*'cwebp' => [
                //'command-line-options' => '-sharp_yuv',
                //'try-common-system-paths' => false,
                //'cwebp-try-cwebp' => false,
                //'try-discovering-cwebp' => false,
            ],*/
        ],
    ],

    //'reconvert' => true,
]);
