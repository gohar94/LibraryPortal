<?php require_once("functions.php"); ?>

<?php
// check for required fields and send appropriate error messages
if (empty($_POST["book_name"]) && empty($_POST["author_name"])) {
	// book name and author name, both missing
	header("Location: add_books.php?error=1");
} elseif (empty($_POST["book_name"])) {
	// only book name missing
	header("Location: add_books.php?error=2");
} elseif (empty($_POST["author_name"])) {
	// only author name missing
	header("Location: add_books.php?error=3");
} else {
	$connection = open_connection();
	$book_name = $_POST["book_name"];
	$result = find_books_containing($book_name);

	$count = 0;

	while ($book = mysqli_fetch_assoc($result)) {
		$count++;
	}

	if ($count == 0) {
		echo $count;
		$book_name = $_POST["book_name"];
		$author_name = $_POST["author_name"];
		header("Location: index.php");
	} else {
		header("Location: add_books.php?error=4");
		exit;
	}
}

?>

<?php

$connection = open_connection();

?>

<?php
// 2 Create Query and check success
$table_name = "book_list";

if (!empty($book_name) && !empty($author_name)) {
	$query = "INSERT INTO {$table_name} (book_name, author_name) ";
	$query .= "VALUES ('{$book_name}', '{$author_name}');";
	$result = mysqli_query($connection, $query);
	$id = mysqli_insert_id($connection);
	if(!$result) {
		die("Database query (INSERT) failed.");
	}
}

if(!empty($_POST["isbn"])) {
	$isbn = $_POST["isbn"];
	$update = "UPDATE {$table_name} ";
	$update .= "SET isbn = '{$isbn}' ";
	$update .= "WHERE id = {$id};";
	$result = mysqli_query($connection, $update);
	if(!$result) {
		die("Database update (ISBN) failed.");
	}
}

if(!empty($_POST["lang"])) {
	$lang = (int) $_POST["lang"];
	$update = "UPDATE {$table_name} ";
	$update .= "SET lang = '{$lang}' ";
	$update .= "WHERE id = {$id};";
	$result = mysqli_query($connection, $update);
	if(!$result) {
		die("Database update (Language) failed.");
	}
}

if(!empty($_POST["status"])) {
	$status = (int) $_POST["status"];
	$update = "UPDATE {$table_name} ";
	$update .= "SET status = '{$status}' ";
	$update .= "WHERE id = {$id};";
	$result = mysqli_query($connection, $update);
	if(!$result) {
		die("Database update (Status) failed.");
	}
}

?>

<?php
// 3 Use returned data if any
?>

<?php
// 4 Release returned data
// mysqli_free_result($result);
?>

<?php
// 5 Close connection
mysqli_close($connection);
?>