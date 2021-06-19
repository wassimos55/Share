<?php

/**
* Cheese
* The MIT License (MIT)
* Copyright (c) 2014 - 2019, British Columbia Institute of Technology
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:

* The above copyright notice and this permission notice shall be included in
* all copies or substantial portions of the Software.

* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NON INFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* , WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
*/

class Encryption {
    
    /**
     * Random Key Generator
     * Key Generator using sha-256
     * @param $int Integer
     * @return mixed
     */

    public function rand_key($int = 8) {
        // generate our alphabets and numerals
        $str = "1234567890abcdefghijklmopqrstuvwxyzABEDEFGHIJKLMNOPQRSTUVWXYZ";
        // randomly shuffle the string
        $str = str_shuffle($str);
        // hash the string
        $str = sha1($str);
        // trim the string to the limit ($int)
        $str = substr($str, 0, $int);
        // return the result
        return $str;
    }

    /**
     * Encryption key Generator
     * Key Generated using crypt
     * @param $string String
     * @param $salt Mixed
     * @return mixed
     */

    public function encrypt ($string="",$salt="CH")
    {
        if( ! empty($string)) {
            try {
                $string = crypt ($string,$salt);
            } catch (Exception $e) {
                die("Message: " . $e->getMessage ());
            }
            return $string;
        }

        
    }






}