<?php

spl_autoload_register('autoLoader');

function autoLoader($className) {

    if (!file_exists('classes/'.$className.'.class.php')) {
        return false;
    }

    include_once 'classes/'.$className.'.class.php';
}