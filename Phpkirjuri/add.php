<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<form action="insert.php" method="post">
    <p>
        <label for="book_n">Book name:</label>
        <input type="text" name="book_n" id="book_n">
    </p>
    <p>
        <label for="author">Author:</label>
        <input type="text" name="author" id="author">
    </p>
    <p>
        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre">
    </p>
    <input type="submit" value="Add">
</form>
</body>
</html>