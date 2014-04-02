<?php

/*
 * VALIDATION RULES
 */

    $config = array(
     'signup' => array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[5]|max_length[12]|callback_username_check'
                 ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
                 ),
            array(
                'field' => 'passconf',
                'label' => 'Password confirmation',
                'rules' => 'trim|required|matches[password]'
                 ),
            array( //Combo
                'field' => 'age',
                'label' => 'Your age',
                'rules' => 'trim|required|integer'
                 ),
            array( //Radio
                'field' => 'agree',
                'label' => 'Terms agreement',
                'rules' => 'required|greater_than[0]'
                 ),
            array( //Check
                'field' => 'chkPhone',
                'label' => 'Phone contact',
                'rules' => 'required'
                 ),
            array( //Check
                'field' => 'chkEmail',
                'label' => 'Email contact',
                'rules' => ''
                 ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
                 )
            ),
     'email' => array(
            array(
                'field' => 'emailaddress',
                'label' => 'EmailAddress',
                'rules' => 'required|valid_email'
                 ),
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|alpha'
                 ),
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
                 ),
            array(
                'field' => 'message',
                'label' => 'MessageBody',
                'rules' => 'required'
                 )
            )                          
    );
    
?>
