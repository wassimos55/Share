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
 *
 */


/* The validation feature is enabled by default
 * More validation will be added upon request
 * To de-activate it you need to remove it to the bootstrap.php file
 * Good Luck
 */

	// validating email
/*
 * @param $value
 * @return bool|mixed|string
 */

    function ch_email_val($value){
		$value = trim($value);
		if(!empty($value)){
			$value = filter_var($value, FILTER_VALIDATE_EMAIL);
			return $value;
		} 
		else{
			return false;
		}
	}

	// sanitize email
    function ch_email_san($value){
		$value =trim($value);
		if (!empty($value)) {
			$value = filter_var($value, FILTER_SANITIZE_EMAIL);
			return $value;
		}
		else{
			return false;
		}
	}

	// sanitize input array
	function ch_arr_san($arr){
		if(!empty($arr)){
			$arr = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			return $arr;
		}
		else{
			return false;
		}
	}

	//sanitize value as string
	function ch_str_san($str){
		if (!empty($str)) {
			$str = filter_var($str, FILTER_SANITIZE_STRING);
			return $str;
		}else{
			return false;
		}
	}

	//hashing passwords the default way
	function ch_pwd_hash($pwd){
		if(!empty($pwd)){
			$pwd = password_hash($pwd, PASSWORD_DEFAULT);
			return $pwd;
		}
		else{
			return false;
		}
	}

	//hashing password the bcrypt way
	function ch_pwd($pwd){
		if(!empty($pwd)){
			$pwd = password_hash($pwd, PASSWORD_BCRYPT);
			return $pwd;
		}
		else{
			return false;
		}
	}

	//dehashing password
	function ch_dehash($pwd, $sim_pwd){
		$res = password_verify($pwd, $sim_pwd);
		if($res){
			return true;
		}
		else{
			return false;
		}
	}

	//making sure a required field is not empty
	function required($value){
		if(empty($value)){
			return false;
		}else{
			return true;
		}
	}

	//comparing values together
	function compare($val1,$val2){
		if($val1 !== $val2){
			return false;
		}else{
			return true;
		}
	}

	// Added in version  => 1.3.0

	// validating an ip address
    if( ! function_exists ('validate_ip')) {
            function validate_ip($ip) {
                if( ! filter_var ($ip, FILTER_VALIDATE_IP)) {
                    return false;
                } else {
                    return true;
                }
            }

    }

    // validating a number
    if( ! function_exists ('validate_int')) {
        function validate_int($int) {
            if(filter_var ($int, FILTER_VALIDATE_INT) === 0 || ! filter_var($int, FILTER_VALIDATE_INT) === false){
                return true;
            } else{
                return false;
            }
        }
    }

    // validating a url
    if ( ! function_exists ('validate_url')) {
        function validate_url($url) {
            if( ! filter_var ($url, FILTER_VALIDATE_URL)) {
                return false;
            } else{
                 return true;
            }
        }
    }

    // sanitizing a url
    if ( ! function_exists ('sanitize_url')) {
        function sanitize_url($url) {
            if( ! filter_var ($url, FILTER_SANITIZE_URL)) {
                return false;
            } else{
                return true;
                }
        }
    }

    // validate ipv6
    if( ! function_exists ('validate_ipv6')) {
        function validate_ipv6($ip) {
            if( ! filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                return false;
            } else{
                return true;
            }
        }
    }

    // validating a url with query
    if ( ! function_exists ('validate_url_query')) {
        function validate_url_query($url) {
            if( ! filter_var ($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED)) {
                return false;
            } else{
                return true;
            }
        }
    }

    // sanitize string an strip ACII characters
    if( ! function_exists ('strip_acii_char')) {
        function strip_acii_char($string) {
            if ( ! filter_var ($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH)) {
                return false;
            } else{
                return true;
            }
        }
    }