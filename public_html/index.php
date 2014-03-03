<?php require_once("functions.php"); ?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>Nagina Library - Home</title>

<link href="public.css" media="all" rel="stylesheet" type="text/css" />
</head>

<body>
	
	<div id="header">
		<h1>Nagina Library</h1>
	</div>

	<div id="main">
	
	<div id="navigation">
	</br>
		<a href="add_books.php">Add Books</a>
	</br> </br>
		<a href="search.php">Search</a>
	</div>
	
	<div id="page">
		<h2>Book Collection</h2>
		<p style="color:blue; font-size:15px;">Here is a list of all the books in the database:</p>
		</br>
		<p style="color:red;">Click on a Book Name or an Author Name to perform a search on <u>Goodreads</u> &copy . </p>
		</br>
		<p style="color:red;"><b>Book Name: </b></p>
	<ol>
		<?php

		$connection = open_connection();

		?>

		<?php $book_set = find_all_books(); ?>

		<?php

		while ($book = mysqli_fetch_assoc($book_set)) {

		?>
		<a href=<?php echo "http://www.goodreads.com/search?utf8=✓&query=" . urlencode($book["book_name"]); ?>><li><?php echo $book["book_name"]; ?></li></a>
		</br>

		<?php 
		
		}
		
		?>

	</ol>
	
	</div>

	<div id="page">
		<ol>
		</br>
		</br> </br> </br> </br> </br> </br> </br> </br>
		<p style="color:red;"><b>Author Name: </b></p>
		<?php $book_set = find_all_books(); ?>
		<?php

		while ($book = mysqli_fetch_assoc($book_set)) {

		?>

		<a href=<?php echo "http://www.goodreads.com/search?utf8=✓&query=" . urlencode($book["author_name"]); ?>><li><?php echo $book["author_name"]; ?></li></a>
		</br>
		<?php 
		
		}
		
		?>
	</ol>
	</div>

</div>

</body>

<footer>Developed by <a href="https://www.twitter.com/gohar94">@gohar94</a></footer>

</html>


<?php
		// 4 Release Data
		mysqli_free_result($book_set);
		?>
<?php
// 5 Close connection
mysqli_close($connection);
?>