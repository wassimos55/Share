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
 * Created by Cheese.
 * User: Cheese
 * Date: 8/30/2019
 * Time: 6:11 PM
 * This is the general class for the mail library
 * It includes most of the functions that has to do with mail
 */
class Mail
{
    /**
     * @param string $to
     * @param string $subject
     * @param string $message
     * @param array $header
     * @return bool
     */
    public function sendMail($to='', $subject='', $message='', $header=[]){
        if(!empty($to) && !empty($subject) && !empty($message)){
            str_replace ('.','..',$message);
            $message = wordwrap ($message,75);
            if($header !== []){
                mail ($to,$subject,$message,$header);
                return true;
            } else{
                mail($to,$subject,$message);
                return true;
            }
        }
        else{
            return false;
        }
    }
}