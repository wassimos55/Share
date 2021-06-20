<?php
 /**
  * The helpers folder contains
  * functions that you can easily use to
  * perform simple tasks like 
  * redirecting.. 
  * sessions..
  * and cookies
  * Also feel free to create your custom helpers
  **/

  // redirect helper
  function redirect($page) {
      header('location: ' . URLROOT . '/' . $page);
  }