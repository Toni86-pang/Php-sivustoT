<?php

// Start the session
session_start();


// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";

    //session variable
    $id= $_SESSION["user_id"];

    // Prepare a select statement
    $sql = "SELECT * FROM books WHERE book_id = :id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":id", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Retrieve individual field value
                $name = $row["book_n"];
                $author = $row["author"];
                $genre = $row["genre"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($pdo);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
            background: linear-gradient(180deg, rgba(39,35,111,0.7939542277475421) 0%, rgba(59,59,164,0.799572205275632) 58%, rgba(255,255,255,0) 92%);
            box-shadow: 0px 2px 7px rgba(0,0,0);
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3 " style="color:DodgerBlue;" >View Record</h1>
                    <div class="form-group">
                        <label style="color:DodgerBlue;" >Submitter</label>
                        <p><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></p>
                    </div>  
                         <div class="form-group">                 
                        <label style="color:DodgerBlue;">Book name</label>
                        <p><b><?php echo $row["book_n"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label style="color:DodgerBlue;" >Author</label>
                        <p><b><?php echo $row["author"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label style="color:DodgerBlue;" >Genre</label>
                        <p><b><?php echo $row["genre"]; ?></b></p>
                    </div>
                    <p><a href="landing.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>