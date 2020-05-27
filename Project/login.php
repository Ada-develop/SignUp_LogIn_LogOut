<?php

include 'dbConnect.php';

error_reporting(0);
//Button
if (isset($_POST['login'])) {

    //build function to validate data:

    function validateFormData($formData) {
        $formData = trim(stripslashes(htmlspecialchars($formData)));
        return $formData;
    }

    //create variables and wrap the data with our function

    $formUser = validateFormData($_POST['FormName']);
    $formPass = validateFormData($_POST['FormPassword']);

   

    //Create SQL query

    $query = "SELECT Name, Email, Password FROM users WHERE Name='$formUser'";

    //Store the result

    $result = mysqli_query($link, $query);

    //Verify if result is returned

    if (mysqli_num_rows($result) > 0) {

        // store basic user data in variables from fetched DataBase

        while ($row = mysqli_fetch_assoc($result)) {
            $user = $row['Name'];
            $email = $row['Email'];
            $hashedPass = $row['Password'];
        }

        //verify hashed password with the typed password
        // Checking or getting from form pass is equals to hashed


                   
            //Login password correct or not 'add' == button submit
         
        
        
        
        if (password_verify($_POST['FormPassword'], $hashedPass)) {

            //Correct login details
            //Start the session

            session_start();

            //store data in SESSION variables
            //Fetched Data from DB , store to the SESSION variables
            $_SESSION['loggedInUser'] = $user;
            $_SESSION['loggedInEmail'] = $email;
            
            header("Location: profile.php");
            
            
        }else{ //If hashed password didn't verify
            //error message
            
            $loginError = "<div class='alert alert-danger'>Wrong username / password combination. Try again.</div>";
        }
        
        
    }else{// If query to DB num of rows < 0
        $loginError = "<div class='alert alert-danger'>No such user in database. Please try again. <a class='close' data-dismiss='alert'>&times;</a></div>";

    }
    
    //close the mysql connection

    echo $hashedPass;
    
    mysqli_close($link);
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Login</h1>
            <p class="lead">Use this form to log in your account</p>

            <?php
            echo "<pre>";
            print_r($_POST);
            echo $loginError;
            echo "</pre>";
            ?>
            
            
            <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group">
                    <label for="login-username" class="sr-only">Username</label>
                    <input type="text" class="form-control" id="login-username" placeholder="Username" name="FormName">
                </div>
                <div class="form-group">
                    <label for="login-password" class="sr-only">Password</label>
                    <input type="password" class="form-control" id="login-username" placeholder="Password" name="FormPassword">
                </div>
                <button type="submit" class="btn btn-default" name="login">Login!</button>

            </form>



        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>
