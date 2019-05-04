<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload
 *
 * @author omar
 */
class Upload {
    private $allowedExts;
    private $maxSize;
    private $file;
    private $uploadsDirecotry;
    private $fileUrl;
    private $filename;
    
    function __construct($file, $allowedExts, $uploadsDirecotry, $maxSize) {
        if (is_array($allowedExts) AND is_int($maxSize)) {
            $this->file = $file;
            $this->allowedExts = $allowedExts;
            $this->maxSize = $maxSize;
            $this->uploadsDirecotry = $uploadsDirecotry;
        } else {
            throw new Exception("File extensions must be in an array and max size value must be intger value.");
        }
    }
    function Upload(){
        $error = array();
        $file = $this->file;
        $filename = $file['name'];
        $fileex = explode(".",$filename);
        $fileext = strtolower(array_pop($fileex));
        $filesize = $file['size'];
        $filetempname = $file['tmp_name'];
        if(in_array($fileext, $this->allowedExts) == FALSE){
            $errors[] = "Extension is not allowed!";
        }
        if($filesize>$this->maxSize){
            $errors[] = "The file should be smaller";
        }
        if(empty($error)){
        $random = rand(0, 9999);
        $this->fileUrl = $random . "_" . date("d-m-Y") . "_" . $filename;
        $destination = $this->uploadsDirecotry. $random . "_" . date("d-m-Y") . "_" . $filename;
        if(move_uploaded_file($filetempname, $destination)){
        }
        $this->filename = $this->fileUrl;
        }else {                
            foreach ($errors as $error) {
             throw new Exception($error);
       }
    }
     return TRUE;
}
   function getFileUrl()
    {
        return $this->fileUrl;
    }
    
    function getFilesName()
    {
        return $this->filename;
    }
}