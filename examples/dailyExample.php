<?php
/**
 * Created by PhpStorm.
 * User: oem
 * Date: 04.12.18
 * Time: 23:19
 */

        include_once '../vendor/autoload.php';

        use mikekiselev\CBR;

        $result = CBR::getDaily();

        print_r($result);