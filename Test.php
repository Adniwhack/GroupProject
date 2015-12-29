<?php
require_once 'function.php';

class Test extends PHPUnit_FrameWork_TestCase{
    public function testCanBeUndefined(){
        $this->assertEquals("True", test_input("True"));
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

