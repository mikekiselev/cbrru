<?php
/**
 * Created by PhpStorm.
 * User: oem
 * Date: 04.12.18
 * Time: 23:13
 */

use mikekiselev\CBR;

class CBRTest extends PHPUnit_Framework_TestCase
{
    public function testGetDaily()
    {
        $this->assertArrayHasKey(
            '@attributes',
            CBR::getDaily()
        );
    }

}
