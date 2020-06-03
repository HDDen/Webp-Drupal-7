<?php
// Этот файл - прокси для вызова convertWebpDem(), его назначение - сокращение кода в файле шаблона поля + выполнение необходимых проверок до загрузки autoload.php .

function callWebp($source = false, $destination = false){

    if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
        if (function_exists('writeLog')){
            writeLog('  callWebp: стартовали');
        }
    }

    $path_converter = get_homedir().'/'.WEBPPROJECT.'/'.MADMPLUGINS.'/'.'webp_template_plugin.php';

    // проверка на $source
    if (!$source || !(file_exists($source))){

        if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
            if (function_exists('writeLog')){
                writeLog('  callWebp: отсутствует путь к $source или отсутствует физически');
                writeLog('  callWebp: полученный: '.$source);
            }
        }
        return false;
    }

    // проверка destination
    if (!$destination){
        $destination = strtok($source, '?') . '.webp';
    }

    // проверка на доступность файла-предбанника конвертера
    if (!file_exists($path_converter)){

        if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
            if (function_exists('writeLog')){
                writeLog('  callWebp: недоступен предбанник конвертера');
                writeLog('  callWebp: '.$path_converter);
            }
        }

        return false;
    }

    // умолчание
    $result = false;
    // проверка на поддержку webp
    $canUse = false;

    if (defined('WEBP_FORCE_CONVERSION') && (WEBP_FORCE_CONVERSION == true)){
        $canUse = true; // только форсируем. Куки не ставим, для избежания проблем с IE и фоновыми картинками в webp
    } else if (!isset($_COOKIE['webpactive'])) {

        // несколько способов верификации
        // заголовок accept
        $accept_verification = false;
        // юзер-агент хрома
        $is_chrome = false;
        // IE
        $is_ie = false;

        if (strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false){
            $accept_verification = true;
        } else if (strpos( $_SERVER['HTTP_USER_AGENT'], ' Chrome/' ) !== false){
            $is_chrome = true;
        } else if (strpos( $_SERVER['HTTP_USER_AGENT'], 'Trident' ) !== false){
            $is_ie = true;
        }

        if ( ($accept_verification || $is_chrome) && (!$is_ie)){
            $canUse = true;

            //Неплохо было бы еще и установить куки
            setcookie('webpactive', 'true', time()+60*60*24*7, '/', $_SERVER['SERVER_NAME']);
        }
    } else {
        if ($_COOKIE['webpactive'] === 'true'){
            $canUse = true;
        }
    }

    // проверка на существование конечного файла - чтобы не напрягать лишний раз серв
    if ($canUse){

        // проверка по флагу reconvert
        $reconvert = false;
        // проверяем по временной метке
        if (defined('WEBP_RECONVERT_BYTIMESTAMP') && WEBP_RECONVERT_BYTIMESTAMP && file_exists($destination)){
            clearstatcache();
            $timestamp = filemtime($destination);
            $target_timestamp = intval(WEBP_RECONVERT_BYTIMESTAMP);

            if ($target_timestamp > $timestamp){
                $reconvert = true;

                if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
                    if (function_exists('writeLog')){
                        writeLog('  callWebp: будет выполнена переконвертация по дате');
                    }
                }
            }
        }

        if (!file_exists($destination) || $reconvert){
            require_once($path_converter);

            if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
                if (function_exists('writeLog')){
                    writeLog('  callWebp: обращаемся к convertWebpDem()');
                }
            }

            $result = convertWebpDem($source, $destination, $reconvert, true); // можно добавить к вызову аргумент $reconvert = true, тогда будет принудительное переконвертирование. $trusted - все проверки выполнены, не перепроверять

            if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
                if (function_exists('writeLog')){
                    writeLog('  callWebp: результат обращения к convertWebpDem() = '.var_export($result, true));
                }
            }
        } else {

            if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
                if (function_exists('writeLog')){
                    writeLog('  callWebp: webp-версия уже существует');
                }
            }

            $result = true; // webp-версия существует, поднимаем флаг
        }
    }

    // ответ, использовать webp или исходное изображение
    if ($result){

        if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
            if (function_exists('writeLog')){
                writeLog('  callWebp: успех');
            }
        }

        return true; //Конвертирование успешное! Отдаем webp
    } else {

        if (defined('WEBP_DEBUGMODE') && (WEBP_DEBUGMODE)){
            if (function_exists('writeLog')){
                writeLog('  callWebp: отказ');
            }
        }

        return false; // Что-то пошло не так, используем оригинальный файл
    }
}

?>