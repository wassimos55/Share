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
 * Class DateLib
 * Contains:
 * DateTime Interval
 * Date Set
 * Time Set
 */
class DateLib
{
    /**
     * @param string $zone
     * @return bool
     */
    public function timezone_set($zone=""){
        return date_default_timezone_set ($zone);
    }

    /**
     * @return string
     */
    public function timezone_get(){
        return date_default_timezone_get ();
    }

    /**
     * @param $start
     * @param $end
     * @param string $prefix
     * @return string
     */
    public function fullDateInterval ($start, $end, $prefix="ago"){
        $start = new DateTime($start);
        $end = new DateTime($end);
        $interval = $start->diff ($end,true);
        $msg = "";
        if($interval->y){
            if($interval->y === 1){
                $msg = $interval->y . " year " . $prefix;
            }else{
                $msg = $interval->y . " years " . $prefix;
            }
        }elseif($interval->m){
            if($interval->m === 1){
                $msg = $interval->m . " month " . $prefix;
            }else{
                $msg = $interval->m . " months " . $prefix;
            }
        }
        elseif($interval->d){
            if($interval->d === 1){
                $msg = $interval->d . " day " . $prefix;
            }else{
                $msg = $interval->d . " days " . $prefix;
            }
        }
        elseif($interval->h){
            if($interval->h === 1){
                $msg = $interval->h . " hour " . $prefix;
            }else{
                $msg = $interval->h. " hours " . $prefix;
            }
        }
        elseif($interval->i){
            if($interval->i === 1){
                $msg = $interval->i . " minute " . $prefix;
            }else{
                $msg = $interval->i . " minutes " . $prefix;
            }
        }
        elseif($interval->s == 0){
            if($interval->s < 30){
                $msg = "Just Now";

            }else{
                $msg = $interval->s . " seconds " . $prefix;

            }
        }

        return $msg;
    }

    /**
     * @param $start
     * @param $end
     * @param string $mode
     * @return mixed
     */
    public function interval ($start, $end, $mode='y')
    {
        $start = new DateTime($start);
        $end = new DateTime($end);
        $diff = $start->diff ($end);
        $interval = $diff->$mode;
        return $interval;
    }


}