<?php

require_once 'model.php';
session_start ();
$theDBA  =  new DatabaseAdaptor();


/**
 * this is called when a user is trying to register a new account,
 * error message is outputed if the user's user_name is already taken.
 * Upon registering the user is taken to the login page
 */

if(isset($_POST['register_user'])  && isset($_POST['register_pw'])) {
    $userNameTaken = $theDBA->findDuplicate($_POST['userNameR']);
    if($userNameTaken == false){
        $theDBA->addUser($_POST['register_user'], $_POST['register_pw']);
        header('Location: login.php');
    }
    else {
        $_SESSION['registerError'] = 'Username name already exits';
        header('Location: register.php');
    } 
}
    
  /**
   * this is called when a use is trying to login
   * 
   */ 
    
    if(isset($_POST['username'])  && isset($_POST['password'])) {
        
        $userName = $_POST['username'];
        $pswd = $_POST['password'];
        
        $varification = $theDBA->verify($userName, $pswd);
        if($varification == 1) {
            $_SESSION['loggedIn'] = "loggedIn";
            $_SESSION['loginError'] = 'style="display:none;"';
            $_SESSION['loggedInUser'] = $userName;
            $c =  $theDBA->getCheckingBalance($userName);
            $s = $theDBA->getSavingBalance($userName);
            $_SESSION['checkingBalance'] = $c[0]['money'];
            $_SESSION['savingBalance'] = $s[0]['money'];
            header('Location: loggedIn.php');
        }
        else {
            $_SESSION['loginError']= "";
            header('Location: login.php');
        }
    }
    
    /**
     * This is called when the user is trying to schedule an appointment.
     * 
     */
   
    if(isset($_POST['ScheduleAppt'])){ // this is not necessarily needed.
       
        $time = $_POST['time'];
        $theDBA->scheduleAppt($time);
        header('Location: loggedIn.php');
        
    }

    
    
    
    
    
   ?>   
    
    
    
    
    
    
    
