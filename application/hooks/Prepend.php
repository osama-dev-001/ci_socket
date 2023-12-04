<?php
defined('BASEPATH') or exit('No direct script access allowed');

function __autoload($class)
{
    if (strpos($class, 'CI_') !== 0) {
        if (file_exists($file = APPPATH . 'hooks/' . $class . '.php')) {
            include $file;
        }
    }
}

$hook = new Cors();
$hook->setHeaders();
