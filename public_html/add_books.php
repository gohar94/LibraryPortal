<?php require_once("functions.php"); ?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>Nagina Library - Add Books</title>

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
	</div>
	
	<div id="page">
		<h2>Add Books</h2>
		<p>Please fill the following details.</p>

		<p style="color:red";>
		<?php
		if(isset($_GET["error"])) {
				if($_GET["error"] == 4) {
				echo "A book with the same name already exists! Please enter a different book.";
				}
			}
		?>
		</p>
		<form action="new_book_processing.php" method="post">
			<p style="color:red;">
			<?php 
			// check if the user did not enter the book name and display error message
			if(isset($_GET["error"])) {
				if($_GET["error"] == 1 || $_GET["error"] == 2) {
				echo "Please fill in the Book Name. (required)";
				}
			}
			?>
			</p>

			<p>* Book Name:
			<input type="text" name="book_name" value="" placeholder="Book Name" style="width: 300px;" />
			</p>

			<p style="color:red;">
			<?php
			// check if the user did not enter the author name and display error message
			if(isset($_GET["error"])) {
				if($_GET["error"] == 1 || $_GET["error"] == 3) {
				echo "Please fill in the Author Name. (required)";
				}
			}
			?>
			</p>

			<p>* Author Name:
			<input type="text" name="author_name" value="" placeholder="Author Name" style="width: 289px;"/>
			</p>

			<p>ISBN:
			<input type="text" name="isbn" value="" placeholder="ISBN" style="width: 357px;" />
			</p>

			<p>Language:
			<input type="radio" name="lang" value="1" /> Urdu
			&nbsp;
			<input type="radio" name="lang" value="2" /> English 
			</p>

			<p>Status:
			<input type="radio" name="status" value="1" /> In Shelf
			&nbsp;
			<input type="radio" name="status" value="2" /> Not in Shelf
			&nbsp;
			<input type="radio" name="status" value="3" /> Reading
			</p>

			<p style="color:red;">
			</br> </br> Fields in asterick (*) are compulsory to fill. </br> </br>
			</p>
			<input type="submit" name="submit" value="Add Book" />

		</form>

	</div>

</div>

</body>

<footer>Developed by <a href="https://www.twitter.com/gohar94">@gohar94</a></footer>

</html> 
