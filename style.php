<?php

if(!defined('DOKU_INC')) define('DOKU_INC',dirname(__FILE__).'/../../../');

header("Content-type:text/css");

$filename = DOKU_INC . '/data/style/custom.css';
if (file_exists($filename)) {
    echo file_get_contents($filename);
} else {
    echo '/* Empty */';
}

?>