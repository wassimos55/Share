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


    class Auth {

        private $db;

        public function __construct(){

            $this->db = new Database();

        }

        public function register($data){

            //run query 
            
            $this->db->query ('INSERT INTO users (name,email,password) VALUES(:name,:email,:password)');

            // Bind values

            $this->db->bind(':name',$data['name']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':password',$data['password']);

            // Execute Statement

            if($this->db->execute ()){

                return true;

            }

            else{

                return false;

            }
        }

        public function getUserByEmail ($email){
            // Simple select statement

            $this->db->query ('SELECT * FROM users WHERE email=:email');

            // Bind value

            $this->db->bind (':email',$email);

            // return a result

            $this->db->single ();

            // check if email exists

            if($this->db->rowCount () > 0){
                return true;
            } else{
                return false;
            }
        }

        public function getUserByName($name){
            // Simple select statement

            $this->db->query ('SELECT * FROM users WHERE name=:name');

            // Bind value

            $this->db->bind (':name',$name);

            // return a result

            $this->db->single ();

            // check if name exists

            if($this->db->rowCount () > 0){
                return true;
            } else{
                return false;
            }
        }

        public function login ($email, $password)
        {
            $this->db->query ('SELECT * FROM users WHERE email=:email');
            // bind params to values
            $this->db->bind (':email',$email);
            //return a single data
            $row = $this->db->single ();
            //get hashed password
            $db_password = $row->password;
            //dehash password
            if(ch_dehash ($password,$db_password)){
                return $row;
            }else{
                return false;
            }
        }

    }