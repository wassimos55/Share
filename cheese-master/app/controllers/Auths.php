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
 * Class Auths
 * Do not delete this controller if:
 * You want to use it as your default authentication.
 * Follow these instructions:
 * 1. Configure your database params in the config.php file
 * 2. Head to the database directory and open the data.sql file to run the schema in your MYSQL database
 * 3. Make sure you do not change any column from the schema (as cheese uses the default columns)
 */
    class Auths extends Controller {

        public static $passwordLength = 6;

        private $userModel;
        
        public function __construct(){

            //Load Auth Model

            $this->userModel = $this->model('Auth');
        }

        public function index(){

            include APPROOT . '/resources/views/incl/header.blade.php';

            show404();
        }

        public function auth(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = ch_arr_san($_POST);

                    $data = [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'confirm_password' => $_POST['confirm_password'],
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'suggest_name' => ''
                ];

                // Basic form validation


                if(!required($data['name'])){
                    $data['name_err'] = 'Name is required';
                }
                else{
                    if($this->userModel->getUserByName($data['name'])){
                        $data['name_err'] = 'Name is taken';
                        $data['suggest_name'] = "Suggested: ".$data['name'] . rand(1,5000);
                    }
                }

                if(!required($data['email'])){
                    $data['email_err'] = 'Email is required';
                }
                else{
                    if($this->userModel->getUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is taken';
                    }elseif(!ch_email_val ($data['email'])){
                        $data['email_err'] = 'Email is Invalid';
                    }
                }
                
                if(!required($data['password'])){
                    $data['password_err'] = 'Password is required';
                }
                
                elseif(strlen($data['password']) < Auths::$passwordLength){
                    $data['password_err'] = 'Password is short';
                }

                if(!required($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please confirm your password';
                }

                elseif(!compare($data['password'],$data['confirm_password'])){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }

                // check if there are no errors

                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['suggest_name'])){
                    
                    //hash password

                    $data['password'] = ch_pwd_hash($data['password']);

                    //register user

                    $this->userModel->register($data);

                    //auto login user

                    $_SESSION['cheese_user'] = $data['name'];
                    redirect (CONTROLLER);

                }

                // Load auth view

                $this->view('auths/auth',$data);

            }
            
            else{

                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load auth view

                $this->view('auths/auth',$data);

            }
        }

        public function auth_in(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = ch_arr_san($_POST);

                $data = [
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Basic form validation


                if(!required($data['email'])){
                    $data['email_err'] = 'Email is required';
                }
                else{
                    if(!$this->userModel->getUserByEmail($data['email'])){
                        $data['email_err'] = 'User not found';
                    }elseif(!ch_email_val ($data['email'])){
                        $data['email_err'] = 'Email is Invalid';
                    }
                }

                if(!required($data['password'])){
                    $data['password_err'] = 'Password is required';
                }



                // check if there are no errors

                if(empty($data['email_err']) && empty($data['password_err'])){

                    $userLoggedIn = $this->userModel->login($data['email'], $data['password']);
                    if($userLoggedIn){
                        $this->setUserSession($userLoggedIn);
                    }else{
                        $data['password_err'] = 'Password is wrong';
                    }

                }

                // Load auth view

                $this->view('auths/auth_in',$data);

            }

            else{

                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Load auth view

                $this->view('auths/auth_in',$data);

            }


        }

        /**
         * @param $user
         */
        public function setUserSession ($user)
        {
            $_SESSION['cheese_user'] = $user->name;
            $_SESSION['cheese_id'] = $user->id;
            redirect (CONTROLLER);
        }

        public function logout(){
            unset($_SESSION['cheese_user']);
            unset($_SESSION['cheese_id']);
            session_destroy ();
            redirect ('auths/auth_in');
        }

        /**
         * @return bool
         */
        public function is_auth ()
        {
            if(isset($_SESSION['cheese_user']) || isset($_SESSION['cheese_id'])){
                return true;
            }else{
                return false;
            }
        }
    }