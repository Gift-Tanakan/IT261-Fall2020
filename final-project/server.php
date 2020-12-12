<?php

// server page

session_start();
include('config.php');

// initialize the variables

$FirstName = '';
$LastName = '';
$UserName = '';
$Email = '';
//$Password = '';
$errors = array(); // put in array because there will be errors for lots of things
$success = ''; 

    // connect to the database

    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// next register the user

if(isset($_POST['reg_user'])) {
    
    
    // once the 'Register' button was submitted, then receive all the info    
    // in the mysqli parents - $db = where are we looking?, $_POST['FirstName'] = what are we looking for?
    // mysqli_real() function helps remove all alien characters from the input variables
    $FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
    $LastName = mysqli_real_escape_string($db, $_POST['LastName']);
    $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
    $Email = mysqli_real_escape_string($db, $_POST['Email']);
    $Password_1 = mysqli_real_escape_string($db, $_POST['Password_1']);
    $Password_2 = mysqli_real_escape_string($db, $_POST['Password_2']);

    // the array push function will be able to add the exact error that will be referring to

    if(empty($FirstName)) {
        array_push($errors, 'First name is required');   
    }
    if(empty($LastName)) {
        array_push($errors, 'Last name is required');   
    }
    if(empty($UserName)) {
        array_push($errors, 'Username is required');   
    }
    if(empty($Email)) {
        array_push($errors, 'Email is required');   
    }
    if(empty($Password_1)) {
        array_push($errors, 'Password is required');   
    }
    if($Password_1 != $Password_2) {
        array_push($errors, 'Passwords do not match!');   
    }

    // check to see if there is a  username or email out there that I would like to use

    $user_check_query = "SELECT * FROM Users WHERE UserName= '$UserName' OR Email = '$Email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    // above meaning - inside the db, we're looking for $user_check_query
    $user = mysqli_fetch_assoc($result);
    // above is function that fetches associative info, in this case - $result

    if($user) {
        if($user['UserName'] == $UserName) {
            array_push($errors, 'Username already exists');
        }

        if($user['Email'] == $Email) {
            array_push($errors, 'Email already exists');
        }

    } // end if user
    
    // if everything is okay - there're no errors

    if(count($errors) == 0) { // if there are no errors, proceed below
        $Password = md5($Password_1); // this function encrypts password from the database

        // next we have to insert the data into the users table, cuz it's empty now.

        $query = "INSERT INTO Users (FirstName, LastName, UserName, Email, Password) VALUES ('$FirstName', '$LastName', '$UserName', '$Email', '$Password')";
        mysqli_query($db, $query);

        $_SESSION['UserName'] = $UserName;
        $_SESSION['success'] = $success;

        header('Location: login.php');

    } // end count

} // end if isset

// then we'll return to the server.php to enter the login info!

if(isset($_POST['login_user'])) {
    $UserName = mysqli_real_escape_string($db, $_POST['UserName']);

    $Password = mysqli_real_escape_string($db, $_POST['Password']);

    if(empty($UserName)) {
        array_push($errors, 'Username is required');   
    }
    if(empty($Password)) {
        array_push($errors, 'Password is required');   
    }
    if(count($errors) == 0) {
        $Password = md5($Password);    


        $query = "SELECT * FROM Users WHERE UserName = '$UserName' AND Password = '$Password'";

        $results = mysqli_query($db, $query);

        if(mysqli_num_rows($results) == 1) {
            $_SESSION['UserName'] = $UserName;
            $_SESSION['success'] = $success;

            header('Location: index.php');

        } else {
            array_push($errors, 'Wrong username/password combination');
        }
    } // end count
} // end if