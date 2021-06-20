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


/**
 * App Core Class
 * Creates URL & loads controller
 * URL FORMAT /controller/method/params
 */
namespace app;

class Core
{
    protected $currentController = \CONTROLLER;
    protected $currentMethod = METHOD;
    protected $params = [];


    public function __construct ()
    {
        $url = $this->getUrl();
        //Look in controller for first value
        if(\file_exists('../app/controllers/'. \ucwords($url[0]). '.php')) {
            //if exists set as currentController
            $this->currentController = ucwords($url[0]);
            /*unset url[0]*/
            unset($url[0]);
        }
        //require controller file
        require_once '../app/controllers/'. $this->currentController .'.php';
        // instantiate controller class
        $this->currentController = new $this->currentController;

        //check for the second index of the url array
        if(isset($url[1])) {
            //check if method exists
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // unset url[1];
                unset($url[1]);
            }
        }
        // Get params
        $this->params = $url ? array_values($url) : [""];
        // Call a callback with array params

            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getUrl() {
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        } else{
            return false;
        }
    }


}
