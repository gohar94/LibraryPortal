<?php require_once("functions.php"); ?>

<?php
// check for required fields and send appropriate error messages
if (empty($_POST["search_query"])) {
	// book name and author name, both missing
	header("Location: search.php?error=1");
} else {
	$search_query = $_POST["search_query"];
}

?>

<?php

$connection = open_connection();

?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>Nagina Library - Search Results</title>

<link href="public.css" media="all" rel="stylesheet" type="text/css" />
</head>

<body>
	
	<div id="header">
		<h1>Nagina Library</h1>
	</div>

	<div id="main">
	
	<div id="navigation">
	</br>
		<a href="index.php">View Books</a>
	</br> </br>
		<a href="search.php">Search</a>
	</br> </br>
		<a href="add_books.php">Add Books</a>
	</div>
	
	<div id="page">
		<h2>Search Results</h2>
	</br>
		<p style="color:blue; font-size:15px;">The following book(s) matched your search query:</p>
	</br>

<p style="color:red; font-size:15px;">Matches under Book Name: </p>

<?php
// 2 Create Query and check success
$result = find_books_containing($search_query);
?>

<ol>
<?php

	$count = 0;

	while ($book = mysqli_fetch_assoc($result)) {

?>

	<a href=<?php echo "http://www.goodreads.com/search?utf8=✓&query=" . urlencode($book["author_name"]); ?>><li><?php echo $book["book_name"]; ?></li></a>
	by: 
	<a href=<?php echo "http://www.goodreads.com/search?utf8=✓&query=" . urlencode($book["author_name"]); ?>><?php echo $book["author_name"]; ?></a>
	</br>
	</br>
<?php 
	$count++;
	}

	if ($count == 0) {
		echo "No matching results found under Book Names.";
	}
?>

</br>
</ol>

</br>
<p style="color:red; font-size:15px;">Matches under Author Name: </p>
<?php
// 2 Create Query and check success
$result = find_books_containing_in_author($search_query);
?>

<ol>
<?php

	$count = 0;

	while ($book = mysqli_fetch_assoc($result)) {

?>

	<a href=<?php echo "http://www.goodreads.com/search?utf8=✓&query=" . urlencode($book["author_name"]); ?>><li><?php echo $book["book_name"]; ?></li></a>
	by: 
	<a href=<?php echo "http://www.goodreads.com/search?utf8=✓&query=" . urlencode($book["author_name"]); ?>><?php echo $book["author_name"]; ?></a>
	</br>
	</br>

<?php 
	$count++;
	}
	
	if ($count == 0) {
		echo "No matching results found under Author Names.";
	}
?>

</ol>

</ol>

</br>
<p style="color:red; font-size:15px;">Matches under ISBN: </p>
<?php
// 2 Create Query and check success
$result = find_books_containing_in_isbn($search_query);
?>

<ol>
<?php

	$count = 0;

	while ($book = mysqli_fetch_assoc($result)) {

?>

	<a href=<?php echo "http://www.goodreads.com/search?utf8=✓&query=" . urlencode($book["author_name"]); ?>><li><?php echo $book["book_name"]; ?></li></a>
	by: 
	<a href=<?php echo "http://www.goodreads.com/search?utf8=✓&query=" . urlencode($book["author_name"]); ?>><?php echo $book["author_name"]; ?></a>
	</br>
	</br>

<?php 
	$count++;
	}
	
	if ($count == 0) {
		echo "No matching results found under ISBN.";
	}
?>

</ol>

</br>

</div>

<div id="footer">Developed by <a href="https://www.twitter.com/gohar94">@gohar94</a></div>

</body>

</html>

<?php
// 4 Release Data
mysqli_free_result($result);
?>

<?php
// 5 Close connection
mysqli_close($connection);
?>