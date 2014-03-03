<?php
	
	function open_connection() {
		// 1 Open Connection
		$dbserver = 'mysql4.000webhost.com';
		$dbuser = 'a7282207_nagina';
		$dbpass = 'nagina786';
		$dbname = 'a7282207_books';

		// $dbserver = 'localhost';
		// $dbuser = 'nagina';
		// $dbpass = 'nagina';
		// $dbname = 'nagina_library';
		
		$connection = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
		// $connection = new mysqli('sql4.freesqldatabase.com', 'sql426768', 'uY1*gK6*', 'sql426768');
		if (mysqli_connect_errno()) {
			die ("Database connection failed!" . mysqli_connect_error() . " --> " . mysqli_connect_errno());
		}
		return $connection;
	}

	function confirm_query($result_set) {
		// Test for query errors
		if (!$result_set) {
			die("Database query failed!");
		}
	}

	function find_all_books() {
		global $connection;
			// 2 Perform Query
			$query = "SELECT * ";
			$query .= "FROM book_list ";
			$query .= "WHERE id > 0 ";
			$query .= "ORDER BY book_name ASC;";
			$book_set = mysqli_query($connection, $query);
			confirm_query($book_set);
			return $book_set;
	}

	function find_books_containing($search_query) {
		global $connection;
		// perform query
		$table_name = "book_list";
		if (!empty($search_query)) {
			$query = "SELECT * FROM {$table_name} ";
			$query .= "WHERE book_name LIKE \"%{$search_query}%\";";
			$result = mysqli_query($connection, $query);
			$id = mysqli_insert_id($connection);
			
			if(!$result) {
				die("Database query (SEARCH) failed.");
			}
		}
		return $result;
	}

	function find_books_containing_in_author($search_query) {
		global $connection;
		// perform query
		$table_name = "book_list";
		if (!empty($search_query)) {
			$query = "SELECT * FROM {$table_name} ";
			$query .= "WHERE author_name LIKE \"%{$search_query}%\";";
			$result = mysqli_query($connection, $query);
			$id = mysqli_insert_id($connection);
			
			if(!$result) {
				die("Database query (SEARCH) failed.");
			}
		}
		return $result;
	}

	function find_books_containing_in_isbn($search_query) {
		global $connection;
		// perform query
		$table_name = "book_list";
		if (!empty($search_query)) {
			$query = "SELECT * FROM {$table_name} ";
			$query .= "WHERE isbn LIKE \"%{$search_query}%\";";
			$result = mysqli_query($connection, $query);
			$id = mysqli_insert_id($connection);
			
			if(!$result) {
				die("Database query (SEARCH) failed.");
			}
		}
		return $result;
	}

?>