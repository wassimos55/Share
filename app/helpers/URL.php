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

// Program to display url

if ( ! function_exists( 'loadUrl' ) ){
    /**
     * LoadUrl
     * @return string
     * 
     * This function gets the current URI
     */
    function loadUrl(){
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ){
            $link = "https";
        }else{
            $link = "http";
        }
        // Append to the common url characters
        $link .= "://";
        // Append the host (domain name, ip) to the URL
        $link .= $_SERVER['HTTP_HOST'];
        // Append to the requested resources (location to the URL)
        $link .= $_SERVER['REQUEST_URI'];
        $link = rtrim($link, '/');
        // return link
        return $link;
    }
    
}

if( ! function_exists( 'loadHomePage' )) {
    
    /**
     * LoadHomePage
     * @return string
     *
     * This function gets the homepage URI
     */
    
    function loadHomePage($clean = FALSE) {
        // Get URL protocol
        
        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https' : 'http';
        
        // Append common URL characters
        
        $link .= "://";
        
        // Append domain or hosts
        
        $link .= $_SERVER['HTTP_HOST'];
        
        // Request homepage link or public folder
        
        if($clean == FALSE){
            // set link with default extension
            $link .= $_SERVER['PHP_SELF'];
        }else{
            // set link with clean extension
            $link .= str_replace('.php','',$_SERVER['PHP_SELF']);
        }
        echo $link;
    }
}

