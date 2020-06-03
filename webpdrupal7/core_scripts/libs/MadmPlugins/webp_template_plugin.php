<?php
// mini-plugin for converting images to webp by call from field template

if ( (defined('HOMEDIR') || function_exists('get_homedir') )
    && defined('WEBPPROJECT') && defined('WEBPCONVERT')){

    if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
        if (function_exists('writeLog')){
            writeLog('webp_template_plugin.php: подключаем WebpConvert через get_homedir()');
        }
    }

    require get_homedir() . '/' . WEBPPROJECT . '/' . WEBPCONVERT . '/vendor/autoload.php';
} else {

    if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
        if (function_exists('writeLog')){
            writeLog('webp_template_plugin.php: подключаем WebpConvert по относительному пути "../WebpConvert....."');
        }
    }

    require '../WebpConvert/vendor/autoload.php';
}

use WebPConvert\Convert\Converters\Stack;

//$reconvert = forced reconvert, $trusted = dont check availability & file existence
function convertWebpDem($source = false, $destination = false, $reconvert = false, $trusted = false){

    if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
        if (function_exists('writeLog')){
            writeLog('  convertWebpDem(): старт');
        }
    }

    if (!$trusted){
        // проверка на $source
        if (!$source || !(file_exists($source))){

            if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
                if (function_exists('writeLog')){
                    writeLog('  convertWebpDem(): $source не передан или физически отсутствует');
                    writeLog('  convertWebpDem(): $source = '.$source);
                }
            }

            return false;
        }

        // проверка на возможность использования webp
        // Сначала проверяем наличие куки. Куки мы ставим или из js-хелпера, или из апача, или из шаблона.
        $canUse = false;
        if (!isset($_COOKIE['webpactive'])) {
            if( (strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false) || (strpos( $_SERVER['HTTP_USER_AGENT'], ' Chrome/' ) !== false) ) {
                $canUse = true;

                //Неплохо было бы еще и установить куку
                setcookie('webpactive', 'true', time()+60*60*24*7, '/', $_SERVER['SERVER_NAME']);
            } else {
                setcookie('webpactive', 'false', time()+60*60*24*7, '/', $_SERVER['SERVER_NAME']); // кука в false, если нет поддержки
            }
        } else {
            if ($_COOKIE['webpactive'] === 'true'){
                $canUse = true;
            }
        }

        if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
            if (function_exists('writeLog')){
                writeLog('  convertWebpDem(): $canUse = '.var_export($canUse, true));
            }
        }

        if (!$canUse){
            return false;
        }

        if (!$destination){
            $destination = strtok($source, '?') . '.webp';
        }

        // проверка на переконвертирование
        if (file_exists($destination)){
            if (!$reconvert){

                if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
                    if (function_exists('writeLog')){
                        writeLog('  convertWebpDem(): Файл уже существует, переконвертирование не разрешено');
                    }
                }

                return true;
            }
        }
    }

    if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
        if (function_exists('writeLog')){
            writeLog('  convertWebpDem(): Начинаем конвертирование');
        }
    }

    //if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
    //    if (function_exists('writeLog')){
    //        writeLog('Версия PHP = '.phpversion().'. Минимальная - 5.6!');
    //    }
    //}

    // проверка на версию
    $php_version = explode('.', phpversion());

    if (intval($php_version[0]) == 5){
        if (isset($php_version[1]) && (intval($php_version[1]) < 6)){

            if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
                if (function_exists('writeLog')){
                    writeLog('Версия PHP = '.phpversion().'. Минимальная - 5.6! Отказ.');
                }
            }

            return false;
        }
    } else if (intval($php_version[0]) <= 5){
        if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
            if (function_exists('writeLog')){
                writeLog('Версия PHP = '.phpversion().'. Минимальная - 5.6! Отказ.');
            }
        }
    }

    // default options
    $options = array(
        // PS: only set converters if you have strong reasons to do so
        'converters' => [
            'cwebp', 'vips', 'imagick', 'gmagick', 'imagemagick', 'graphicsmagick', 'wpc', 'gd'
        ],

        'metadata' => 'none',
        'quality' => 90,
        'encoding' => 'lossy',
        //'near-lossless' => 75, // default is 60. Todo
        //'cwebp-try-supplied-binary-for-os' => true, // true by default
        //'cwebp-rel-path-to-precompiled-binaries' => '', // location. Commented to prevent override defaults

        'png' => [
            'gd-skip' => true,
            'converters' => ['cwebp', 'vips', 'imagick', 'gmagick', 'imagemagick', 'graphicsmagick', 'wpc'],
        ],

        'jpeg' => [
            'quality' => 'auto',      /* Set to same as jpeg (requires imagick or gmagick extension, not necessarily compiled with webp) */
            'max-quality' => 95,      /* Only relevant if quality is set to "auto" */
            'default-quality' => 90,  /* Fallback quality if quality detection isnt working */
        ],

        // As an alternative to prefixing, you can use "converter-options" to set a whole bunch of overrides in one go:
        'converter-options' => [
            'wpc' => [
                'crypt-api-key-in-transfer' => false,
                'api-key' => '', // 'string-type-key'
                'api-url' => '', //https://example.com/webp-cloud/wpc.php',
                'api-version' => 1,
            ],
        ],
    );
    // overriding options based on drupal module values
    // global quality
    if (defined('WEBP_QUALITY') && WEBP_QUALITY){
        $options['quality'] = intval(WEBP_QUALITY);
    }
    // jpeg quality
    if (defined('WEBP_JPEG_QUALITY') && WEBP_JPEG_QUALITY){
        if (WEBP_JPEG_QUALITY == 'auto'){
            $options['jpeg']['quality'] = 'auto';
        } else {
            $options['jpeg']['quality'] = intval(WEBP_JPEG_QUALITY);
        }
    }
    // jpeg max-quality
    if (defined('WEBP_JPEG_MAXQUALITY') && WEBP_JPEG_MAXQUALITY){
        $options['jpeg']['max-quality'] = intval(WEBP_JPEG_MAXQUALITY);
    }
    // jpeg def-quality
    if (defined('WEBP_JPEG_DEFQUALITY') && WEBP_JPEG_DEFQUALITY){
        $options['jpeg']['default-quality'] = intval(WEBP_JPEG_DEFQUALITY);
    }

    // wpc options
    if (defined('WEBP_WPC_CRYPT') && WEBP_WPC_CRYPT){
        $options['converter-options']['wpc']['crypt-api-key-in-transfer'] = true;
    }

    if (defined('WEBP_WPC_KEY') && WEBP_WPC_KEY){
        $options['converter-options']['wpc']['api-key'] = WEBP_WPC_KEY;
    }

    if (defined('WEBP_WPC_URL') && WEBP_WPC_URL){
        $options['converter-options']['wpc']['api-url'] = WEBP_WPC_URL;
    }

    // precompiled options
    if (defined('WEBP_TRY_PRECOMPILED')){
    	if (WEBP_TRY_PRECOMPILED){
    		$options['cwebp-try-supplied-binary-for-os'] = true;
    	} else {
    		$options['cwebp-try-supplied-binary-for-os'] = false;
    	}
    }
    if (defined('WEBP_PRECOMPILED_PATH') && WEBP_PRECOMPILED_PATH){
        $options['cwebp-rel-path-to-precompiled-binaries'] = WEBP_PRECOMPILED_PATH;
    }

    // debug options
    if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
        if (function_exists('writeLog')){
            writeLog('  callWebp: масив options[]:');
            writeLog(print_r($options, true));
        }
    }

    Stack::convert($source, $destination, $options, $logger=null);

    if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
        if (function_exists('writeLog')){
            writeLog('  convertWebpDem(): Возвращаем true - предполагается успех');
        }
    }

    return true;
}

?>