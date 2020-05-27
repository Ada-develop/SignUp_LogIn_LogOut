<!DOCTYPE html>
<?php
include "dbConnect.php";

//Empty vars by default:
$username = $email = $password = $comment = "";

if (isset($_POST['add'])) {

    //Build function that validates data:
    function validateFormData($formData) {
        $formData = trim(stripslashes(htmlspecialchars($formData)));
        return $formData;
    }

}




//Data Validation: 

if (!$_POST["username"]) {
    $nameError = "Please enter your name <br>";
} else {
    $username = validateFormData($_POST['username']);
}

if (!$_POST["email"]) {
    $emailError = "Please enter your email <br>";
} else {
    $email = validateFormData($_POST["email"]);
}

if (!$_POST["password"]) {
    $passwordError = "Please enter your password <br>";
} else {
    $password = validateFormData($_POST["password"]);
}

$hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);


//Checking or data is empty , and than do the record to DB
if ($username && $email && $password) {
    $query = "INSERT INTO users VALUES('$username','$email','$hashedPassword','Vilnius',NULL,CURRENT_TIMESTAMP,'".$_POST['comment']."');";


    if (mysqli_query($link, $query)) {
        echo "<div class='alert alert-success'>New record in DataBase!</div>";
    } else {
        echo " Error: " . $query . "<br>" . mysqli_error($link);
    }
    
    
    
                
          
    
    
}

//PASSWORD CHECKING IN FORM! "CHECKING_INPUT PASSWORD" == "HASHED_PASSWORD", If correct login

//HASHING:
 //$password = password_hash("mypassword", PASSWORD_DEFAULT);
 ////       echo $password;
//         

//Checking HAshed:
            $hashedPassword = '$2y$10$t6dS.7KMCx6DFva9QX2HWO/4sEu7CMJ0aTr8DtAAabUF4Cpk6cViu';
            
            //Login password correct or not 'add' == button submit
         
            if(isset($_POST['add'])){
                if(password_verify($_POST['password'], $hashedPassword)){
                echo "Password is correct";
            }else{
                echo "Incorrect password";
            }
            }

//Close connection
mysqli_close($link);

?>

<html>
    <head>
        <meta charset="UTF-8">

        <title>MySQL Insertion</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>MySQL Insertion</h1>


            <p class="text-danger">* Required fields</p>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                <small class="text-danger">* <?php echo $nameError; ?></small>
                <input type="text" placeholder="Username" name="username"><br><br>
                <small class="text-danger">*<?php echo $emailError; ?></small>
                <input type="text" placeholder="Email" name="email"><br><br>
                <small class="text-danger">* <?php echo $passwordError; ?></small>
                <input type="password" placeholder="Password" name="password"><br><br>
                <textarea cols="20" rows="5" maxlength="200" name="comment"></textarea>

                <input type="submit" name="add" value="Add Entry">


            </form>


        </div>







        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>
