<?php

/**
 * CONTAINS COMMON FUNCTION OF THROUGHOUT THE APPLICATION
 *
 * @author Uday Shankar Singh <udayshakar1306@gmail.com>
 */
class clsCommon {

    public function __construct() {
        
    }

    public function getPasswordString() {
        $length = 10;
        $randomString = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
        $passTemp = hash('whirlpool', $randomString);
        $pass = substr($passTemp, 0, $length);
        return $pass;
    }

}