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
 * Base Controller
 * Loads models and views
 */
class Controller {
    // Load model
    public function model($model) {
        // require model
        require_once '../app/models/'. $model . '.php';
        // Instantiate model
        return new $model();
    }

    // Load view
    public function view($view, $data = []) {
        //check if view file exists
        if (file_exists('../app/resources/views/' . $view . '.php')) {
            // require view file
            require_once '../app/resources/views/' . $view . '.php';
        } else {
            die("View does not exists");
        }
    }
}