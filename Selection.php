<!DOCTYPE html>
   <?php
            include "dbConnect.php";
            
            $query = "SELECT * FROM users";
            $result = mysqli_query($link, $query);
            
            
        ?>
<html>
    <head>
        <meta charset="UTF-8">

        <title>MySQL Selections</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>MySQL Selection</h1>
            <?php
            
            // If any data in DB: 
            
            if(mysqli_num_rows($result) > 0){
                
                //Create Table entry point, in table class uses BootStrap:
                echo "<table class='table table-bordered'><tr><th>ID</th><th>Username</th><th>City</th></tr>";
                
                //Fetching every row from results and display data in table:
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row["ID"]."</td><td> ".$row['Name']." </td><td>".$row['City']."</td></tr>";
                }
                
                //Endpoint of table: 
                echo "</table>";
                
                //If Connection to database failed:
            }else{
                echo "Whoops! No results.";
            }
            
            //Good practice to close entry to DB:
            mysqli_close($link);
            
            
            ?>
            
        </div>
        
        
        
        
        
        
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    </body>
</html>
