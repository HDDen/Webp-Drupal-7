<?php

/*
cache-control: public, max-age=31536000
content-encoding: gzip
content-length: 21016
content-type: image/webp
date: Mon, 14 Oct 2019 22:21:18 GMT
last-modified: Mon, 14 Oct 2019 18:05:02 GMT
server: nginx/1.16.1
status: 200
strict-transport-security: max-age=31536000;
vary: Accept-Encoding
x-content-type-options: nosniff
x-powered-by: PHP/7.0.33
x-webp-convert-log: Serving converted file

//("Last-Modified: " . gmdate("D, d M Y H:i:s", @filemtime($filename)) ." GMT");
//addHeader('Vary: Accept');
//setHeader('Cache-Control: ' . $options['cache-control-header']);
//setHeader('Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time() + intval($seconds)));
//setHeader('Content-Length: ' . filesize($filename));
*/

$docRoot = rtrim($_SERVER["DOCUMENT_ROOT"], '/');
$requestUriNoQS = explode('?', $_SERVER['REQUEST_URI'])[0];
$relativeSrcPath = urldecode($requestUriNoQS);
$source = $docRoot . $relativeSrcPath;           // Absolute file path to source file. Comes from the .htaccess
$destination = $source . '.webp';     // Store the converted images besides the original images (other options are available!)

$useNginx = false; // если есть nginx, то не устанавливаем headers и не используем readfile();

if (defined('WEBP_CORE_PATH') && (WEBP_CORE_PATH != '')){
	$webp_ondemand_path = DRUPAL_ROOT.'/'.WEBP_CORE_PATH.'/libs/MadmPlugins/webp-on-demand.php';
} else {
	$webp_ondemand_path = $docRoot . '/other-includ/webp/libs/MadmPlugins/webp-on-demand.php';
	if (!file_exists($webp_ondemand_path)){
		$webp_ondemand_path = $docRoot . '/sites/all/modules/webpdrupal7/core_scripts/libs/MadmPlugins/webp-on-demand.php';
	}
}

function give_file($file, $useNginx = false){
	if ($useNginx){
		header('X-Accel-Redirect: '.$file);
	} else {
		$imglength = filesize($file);
		header('Content-Length: '.$imglength);
		header('Content-type: '.mime_content_type($file));
		header('Cache-Control: max-age=31536000');
		header('Last-Modified: ' . gmdate("D, d M Y H:i:s", filemtime($file)) ." GMT");
		header('Vary: Accept-Encoding');
		header('Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time() + 31536000));
		readfile($file);
	}
}

if (!file_exists($destination)){
	if (file_exists($webp_ondemand_path)){
		require_once($webp_ondemand_path);
	} else {
		// отдаём исходник
		give_file($source);
	}
} else {
	// проверим метку времени. Если webp старее оригинала - обновим.
	$timestampSource = filemtime($source);
    $timestampDestination = filemtime($destination);
    if (($timestampSource !== false) &&
        ($timestampDestination !== false) &&
        ($timestampSource > $timestampDestination)) {
            if (file_exists($webp_ondemand_path)){
				require_once($webp_ondemand_path);
			} else {
				// отдаем исходник
				give_file($source, $useNginx);
			}
    } else {
    	give_file($source.'.webp', $useNginx);
    }
}

?>