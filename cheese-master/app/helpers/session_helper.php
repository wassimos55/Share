<?php
/*
* The helpers folder contains
* functions that you can easily use to
* perform simple tasks like 
* redirecting.. 
* sessions..
* and cookies
* Also feel free to create your custom helpers
*/
session_start();
  // flash messages
  function flash($name='',$message='',$class='alert alert-success') {
     if(!empty($name)){
         if(!empty($message) && empty($_SESSION[$name])) {
             // unset session if exists
             if(!empty($_SESSION[$name])){
                 unset($_SESSION[$name]);
             }
             if(!empty($_SESSION[$name.'_class'])){
                 unset($_SESSION[$name.'_class']);
             }
             // reset sessions
             $_SESSION[$name] = $message;
             $_SESSION[$name.'_class'] = $class;
         } elseif(empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : '';
            echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name. '_class']);
         }
     }
  }