<!DOCTYPE html>
   <?php
           include 'dbConnect.php';
            

            
            
        ?>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Password Hashing</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Password Hashing</h1>
           
            <?php
            
            $password = password_hash("pass", PASSWORD_DEFAULT);
            echo $password;
//            
            $hashedPassword = "$2y$10$A60hvAPGQjfRi1.r.O1djOfCv/TzkVcbLuraPR5LyVGVTXDh3xzsa ";
            
            //Login password correct or not 'add' == button submit
         
            if(isset($_POST['add'])){
                if(password_verify($_POST['password'], $hashedPassword)){
                echo "Password is correct";
            }else{
                echo "Incorrect password";
            }
            }
            
            ?>
            
            
            
        </div>
        
        
        
        
        
        
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    </body>
</html>
