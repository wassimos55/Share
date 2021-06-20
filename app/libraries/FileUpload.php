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


class FileUpload
{
    /**
     * choose to encrypt file
     * @var bool
     */
    protected $encryptFile = FALSE;

    /**
     * Filename
     *
     * @var
     */

    protected $fileName;

    /**
     * @var array
     */

    protected $allowed = array(
        'jpg',
        'png',
        'gif',
        'jpeg'
    );

    /**
     * @var
     */

    protected $size;

    /**
     * @var
     */

    protected $fullPath;

    /**
     * FileUpload constructor.
     * @param $encryptFile
     * @param $size
     * @param $allowed
     */
    public function __construct ($encryptFile, $size, $allowed)
    {
        $this->encryptFile = $encryptFile;
        $this->allowed = $allowed;
        $this->size = $size;
    }

    /**
     * @param string $dir
     * @param string $fileName
     * @param string $fileTmpName
     * @param int $fileSize
     * @return bool
     */
    public function upload($dir='', $fileName='', $fileTmpName='', $fileSize=0)
    {
        if(!empty($dir) && !empty($fileName) && !empty($fileTmpName) && !empty($fileSize))
        {

            $fileExt = explode('.',$fileName);

            $fileType = strtolower (end($fileExt));

            if(!in_array($fileType, $this->allowed)){
                return false;
            }

            if($fileSize > $this->size){
                return false;
            }

            else{
                if($this->encryptFile == TRUE){
                    $this->fileName = uniqid ('',true) .'.' . $fileType;
                }
                else{
                    $this->fileName = $fileName;
                }

                // upload file

                try {
                    $this->fullPath = $dir . basename ( $this->fileName );
                    move_uploaded_file ( $fileTmpName , $this->fullPath );
                    return true;
                }
                catch (Exception $e) {
                    echo $e;
                }
            }
        }else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @return mixed
     */
    public function getFullPath()
    {
        return $this->fullPath;
    }

}