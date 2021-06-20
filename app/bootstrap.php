<?php

    require 'config/config.php';
    require 'form/form.php';
    require 'libraries/Core.php';
    //Load helpers here
    include_once 'loaders/helpers/load.php';

    //Load language files here
    include_once 'loaders/lang/load.php';

    // Auto load class libraries
    try{
      spl_autoload_register(function($className){
          require 'libraries/'.$className.'.php';
      });
   } catch (Exception $e) {
     echo "Error: " .$e->getMessage();
   }
