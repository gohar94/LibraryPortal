<?php require_once("functions.php"); ?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>Nagina Library - Search</title>

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
		<a href="add_books.php">Add Books</a>
	</div>
	
	<div id="page">
		<h2>Search for books</h2>
		<p style="color:blue; font-size:15px;">Search by <b>Book Name</b>/<b>Author Name</b>/<b>ISBN</b></p>

		<p style="color:red;"><?php 
		if(isset($_GET["error"])) {
			if($_GET["error"] == 1) {
				echo "You did not type a search query.";
			}
		}
		?></p>
		<form action="search_processing.php" method="post">

			<input type="text" name="search_query" value="" placeholder="Book Name/Author Name/ISBN" style="width: 300px;" />

			<input type="submit" name="submit" value="Search" />

		</form>

	</div>

</div>

</body>

<footer>Developed by <a href="https://www.twitter.com/gohar94">@gohar94</a></footer>

</html> 
