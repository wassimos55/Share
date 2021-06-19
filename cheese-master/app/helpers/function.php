<?php



function is_auth() {
  if(isset($_SESSION['cheese_user']) || isset($_SESSION['cheese_id'])){
        return true;
    }else{
        return false;
    }
}
