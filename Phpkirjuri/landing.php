<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
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
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left" style="color:DodgerBlue;" >Books owned</h2>
                        <a href="index.php" class="btn btn-secondary  pull-right "></i> Retrun</a>
                        <a href="create.php" class="btn btn-success pull-right pl-2"><i class="fa fa-plus"></i> Add New book</a>
                    </div>
                    <?php
                    
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM books  ";
                    if($result = $pdo->query($sql)){
                        if($result->rowCount() > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th style='color:DodgerBlue;' >User</th>";
                                        echo "<th style='color:DodgerBlue;' >Book name</th>";
                                        echo "<th style='color:DodgerBlue;' >Author</th>";
                                        echo "<th style='color:DodgerBlue;' >Genre</th>";
                                        echo "<th style='color:DodgerBlue;' >Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch()){
                                    echo "<tr>";
                                        echo "<td style='color:DodgerBlue;' >" . $row['user_id'] . "</td>";
                                        echo "<td style='color:DodgerBlue;' >" . $row['book_n'] . "</td>";
                                        echo "<td style='color:DodgerBlue;' >" . $row['author'] . "</td>";
                                        echo "<td style='color:DodgerBlue;' >" . $row['genre'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="read.php?id='. $row['book_id'] .'" class="mr-3" title="View Record" data-toggle="tooltip" ><span class="fa fa-eye"></span></a>';
                                            echo '<a href="update.php?id='. $row['book_id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $row['book_id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            unset($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
                    // Close connection
                    unset($pdo);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>