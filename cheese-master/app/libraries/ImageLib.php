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
 * This is the general class for the image library
 * It includes almost all the functions that has to do with images
 */
class ImageLib
{
    /**
     * All methods are well written in order to avoid bugs
     * In case of any bugs you might come across, let us know through the forums
     * @param $image
     * @param array $size
     * @param $name
     * @return bool
     */

    public function imageCrop($image, $size= ['x'=>0,'y'=>0,'width'=>0,'height'=>0] , $name)
    {
        // Get image type by explode function
        $imageType = explode('.',$image);
        $type = end($imageType);
        // create image based on the type of image
        switch ($type){
            case "png":
                $im = imagecreatefrompng ($image);
                break;
            case "jpg":
                $im = imagecreatefromjpeg ($image);
                break;
            case "jpeg":
                $im = imagecreatefromjpeg ($image);
                break;
            default:
                $im = imagecreatefromgd2 ($image);
        }
        // cropping the image
       $im2 = imagecrop ($im,$size);
        if($im2 !== FALSE){
            // returning a new image based on type
            switch ($type){
                case "png":
                    $newImage = imagepng ($im2,$name);
                    break;
                case "jpg":
                    $newImage = imagejpeg ($im2,$name);
                    break;
                case "jpeg":
                    $newImage = imagejpeg ($im2,$name);
                    break;
                default:
                    $newImage = imagegd2 ($im2,$name);
            }
            imagedestroy ($im2);
            return $newImage;
        }
        imagedestroy ($im);
    }

    /**
     * Rotate image method
     * In case of any bugs you might come across, let us know through the forums
     * No angle is set by default
     * @param string $image
     * @param float $angle
     * @param int $color
     * @param string $name
     * @param null $transparency
     * @return bool
     */
    public function rotateImage ($image,$angle=0.0,$color=0,$name='',$transparency=null)
    {
        // Get the type of image coming in from the user
        $imagetype = explode('.',$image);
        $type = strtolower (end($imagetype));
        // create image resource based on image type
        switch($type){
            case "png":
                $im = imagecreatefrompng ($image);
                break;
            case "jpeg":
                $im = imagecreatefromjpeg ($image);
                break;
            case "jpg":
                $im = imagecreatefromjpeg ($image);
                break;
            case "gd2":
                $im = imagecreatefromgd2 ($image);
                break;
            default :
                $im = imagecreatefromgd ($image);
        }

        // Rotate image
        $im2 = imagerotate ($im,$angle,$color,$transparency);
        if($im2 !== FALSE) {
            switch ($type) {
                case "png":
                    $newimage = imagepng ( $im2 , $name );
                    break;
                case "jpeg":
                    $newimage = imagejpeg ( $im2 , $name );
                    break;
                case "jpg":
                    $newimage = imagejpeg ( $im2 , $name );
                    break;
                case "gd2":
                    $newimage = imagegd2 ( $im2 , $name );
                    break;
                default :
                    $newimage = imagegd ( $im2 , $name );
            }
            // destroy rotated image
            imagedestroy ($im2);
            // returns rotated image
            return $newimage;
        }
        //destroy original image
        imagedestroy ($im);
    }

    /**
     * Flip image method
     * In case of any bugs you might come across, let us know through the forums
     * Flip mode is set by default
     * @param $image
     * @param int $mode
     * @param string $name
     * @return bool
     */
    public function flipImage($image,$mode=IMG_FLIP_BOTH,$name=''){
        //get image type
        $imagetype = explode('.',$image);
        $type = strtolower(end($imagetype));
        // create image based on type
        switch($type){
            case "png":
                $im = imagecreatefrompng ($image);
                break;
            case "jpg":
                $im = imagecreatefromjpeg ($image);
                break;
            case "jpeg":
                $im = imagecreatefromjpeg ($image);
                break;
            case "gd2":
                $im = imagecreatefromgd2 ($image);
                break;
            case "gif":
                $im = imagecreatefromgif ($image);
                break;
            default:
                $im = imagecreatefromgd ($image);
        }

        // create flip method
        $im2 = imageflip ($im,$mode);
        // create new image based on type
        if($im2 !== FALSE){
            switch($type){
                case "png":
                    $newImage = imagepng ($im,$name);
                    break;
                case "jpg":
                    $newImage = imagejpeg ($im,$name);
                    break;
                case "jpeg":
                    $newImage = imagejpeg ($im,$name);
                    break;
                case "gd2":
                    $newImage = imagegd2 ($im,$name);
                    break;
                case "gif":
                    $newImage = imagegif ($im,$name);
                    break;
                default:
                    $newImage = imagegd ($im,$name);
            }

            return $newImage;
        }
        imagedestroy ($im);
    }

    /**
     * Scale image method
     * In case of any bugs you might come across, let us know through the forums
     * @param $image
     * @param int $width
     * @param int $height
     * @param int $mode
     * @param string $name
     * @return bool
     */
    public function scaleImage($image,$width=0,$height=0,$mode=IMG_BICUBIC_FIXED,$name=''){
        // get image type
        $imagetype = explode ('.',$image);
        $type = strtolower (end($imagetype));
        //create new image
            switch($type) {
                case "png":
                    $im = imagecreatefrompng ($image);
                    break;
                case "jpg":
                    $im = imagecreatefromjpeg ($image);
                    break;
                case "jpeg":
                    $im = imagecreatefromjpeg ($image);
                    break;
                case "gd2":
                    $im = imagecreatefromgd2 ($image);
                    break;
                case "gif":
                    $im = imagecreatefromgif ($image);
                    break;
                default:
                    $im = imagecreatefromgd ($image);
            }
        // scale the image
        $im2 = imagescale ($im,$width,$height,$mode);
            // recreate new image from im2
            if($im2 !== FALSE) {
                switch($type){
                    case "png":
                        $newImage = imagepng ($im2,$name);
                        break;
                    case "jpg":
                        $newImage = imagejpeg ($im2,$name);
                        break;
                    case "jpeg":
                        $newImage = imagejpeg ($im2,$name);
                        break;
                    case "gd2":
                        $newImage = imagegd2 ($im2,$name);
                        break;
                    case "gif":
                        $newImage = imagegif ($im2,$name);
                        break;
                    default:
                        $newImage = imagegd ($im2,$name);
                }
                return $newImage;
            }
            imagedestroy ($im);
    }

    /**
     * Filter image method
     * In case of any bugs you might come across, let us know through the forums
     * Cheese currently supports only the following filters
     * IMG_FILTER_EMBOSS
     * IMG_FILTER_GRAYSCALE
     * IMG_FILTER_NEGATE
     * IMG_FILTER_EDGEDETECT
     * IMG_FILTER_SELECTIVE_BLUR
     * IMG_FILTER_MEAN_REMOVAL
     * @param string $image
     * @param int $filtertype
     * @param string $name
     * @return bool
     * @internal param int $type
     */
    public function imageFilter($image='', $filtertype=IMG_FILTER_GRAYSCALE, $name=''){
        // get image type
        $imagetype = explode ('.',$image);
        $type = strtolower (end($imagetype));
        //create new image
        switch($type) {
            case "png":
                $im = imagecreatefrompng ($image);
                break;
            case "jpg":
                $im = imagecreatefromjpeg ($image);
                break;
            case "jpeg":
                $im = imagecreatefromjpeg ($image);
                break;
            case "gd2":
                $im = imagecreatefromgd2 ($image);
                break;
            case "gif":
                $im = imagecreatefromgif ($image);
                break;
            default:
                $im = imagecreatefromgd ($image);
        }
        // filter the image
        $im2 = imagefilter ($im,$filtertype);
        // recreate new image
        if($im2 !== FALSE) {
            switch($type){
                case "png":
                    $newImage = imagepng ($im,$name);
                    break;
                case "jpg":
                    $newImage = imagejpeg ($im,$name);
                    break;
                case "jpeg":
                    $newImage = imagejpeg ($im,$name);
                    break;
                case "gd2":
                    $newImage = imagegd2 ($im,$name);
                    break;
                case "gif":
                    $newImage = imagegif ($im,$name);
                    break;
                default:
                    $newImage = imagegd ($im,$name);
            }
            return $newImage;
        }
        imagedestroy ($im);
    }

}
