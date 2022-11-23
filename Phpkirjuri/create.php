<?php
// Initialize the session
session_start();
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $author = $genre = "";
$name_err = $author_err = $genre_err = "";
$user_id = $_SESSION["user_id"];

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate a book name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a book name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9a-zA-Z ,.-_\\s\?\!]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate author
    $input_author = trim($_POST["author"]);
    if(empty($input_author)){
        $author_err = "Please enter an author.";  
    } elseif(!filter_var($input_author, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9a-zA-Z ,.-_\\s\?\!]+$/")))){
        $author_err = "Please enter a valid name.";   
    } else{
        $author = $input_author;
    }
    
    // Validate genre
    $input_genre = trim($_POST["genre"]);
    if(empty($input_genre)){
        $genre_err = "Please enter the genre.";  
    } elseif(!filter_var($input_genre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[A-Za-z]+[A-Za-z \\s]+$/")))){
        $genre_err = "Please enter a valid name.";   
    }   else{
        $genre = $input_genre;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($author_err) && empty($genre_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO books (book_n, author, genre, user_id ) VALUES (:book_n, :author, :genre , :user_id)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":book_n", $param_name);
            $stmt->bindParam(":author", $param_author);
            $stmt->bindParam(":genre", $param_genre);
            $stmt->bindParam(":user_id", $param_user_id);
            
            // Set parameters
            $param_name = $name;
            $param_author = $author;
            $param_genre = $genre;
            $param_user_id = $user_id;

            // Attempt to execute the prepared statement
            if($stmt->execute( 
             )){
                // Records created successfully. Redirect to landing page
                header("location: landing.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
            background: linear-gradient(180deg, rgba(39,35,111,0.7939542277475421) 0%, rgba(59,59,164,0.799572205275632) 58%, rgba(255,255,255,0) 92%);
            box-shadow: 0px 2px 7px rgba(0,0,0);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form about books information.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" name="author" class="form-control <?php echo (!empty($author_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $author; ?>">
                            <span class="invalid-feedback"><?php echo $author_err;?></span>
                        </div>
                        <div class="form-group">
                            <lablel>genre</label>
                            <input type="text" name="genre" class="form-control <?php echo (!empty($genre_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $genre; ?>">
                            <span class="invalid-feedback"><?php echo $genre_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="landing.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>