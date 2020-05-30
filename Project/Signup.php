<!DOCTYPE html>
<?php
include "dbConnect.php";
include "login.php.php";

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


//DUBLICATE ACC








//Checking or data is empty , and than do the record to DB
    if ($username && $email && $password) {
        $query = "INSERT INTO users VALUES('$username','$email','$hashedPassword','Vilnius',NULL,CURRENT_TIMESTAMP,'" . $_POST['comment'] . "');";
        $exist = "SELECT Name, Email, Password FROM users WHERE Name='$username' OR Email='$email';";
//
        $dublicate = mysqli_query($link, $exist);
//

        if(mysqli_num_rows($dublicate) > 0) {
            echo "User exist";
            $page = $_SERVER['PHP_SELF'];
            $sec = "10";
            header("Refresh: $sec; url=$page");
//

        }elseif (mysqli_query($link, $query)) {
            echo "<div class='alert alert-success'>New record in DataBase!</div>";

            //Redirect after DB data insert with hashed password!!!!!
            header("Location: login.php");


        } else {
            echo " Error: " . $query . "<br>" . mysqli_error($link);
        }



}






//Close connection
mysqli_close($link);

?>

<html>
    <head>
        <meta charset="UTF-8">

        <title>Hashing pass verify login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Hashing pass verify Sign up</h1>


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
    </body>
</html>
