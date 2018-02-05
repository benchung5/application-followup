<?php

class Interview {
	//was missing static
	public static $title = 'Interview test';
}

$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';

$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

$person = $_POST['person'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interview test</title>
	<style>
		body {font: normal 14px/1.5 sans-serif;}
	</style>
</head>
<body>

	<h1><?=Interview::$title;?></h1>

	<?php
	// Print 10 times
	//switch the 0 and 10 in for loop
	for ($i=0; $i<10; $i++) {
		//was wrong format for echo
		echo "<p> $lipsum </p>";
	}
	?>

	<hr>

	<!-- use post instead of get -->
	<form method="post" action="<?=$_SERVER['REQUEST_URI'];?>">
		<!-- make inputs required -->
		<p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName" required></p>
		<p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName" required></p>
		<p><label for="email">Email</label> <input type="text" name="person[email]" id="email" required></p>
		<p><input type="submit" value="Submit" /></p>
	</form>

	<?php if ($person): ?>
		<!-- filter output -->
		<p><strong>Person</strong> <?=htmlspecialchars($person['first_name']);?>, <?=htmlspecialchars($person['last_name']);?>, <?=htmlspecialchars($person['email']);?></p>
	<?php endif; ?>

	<hr>

	<table>
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($people as $person): ?>
				<tr>
					<!-- had wrong format for array -->
					<!-- filter output -->
					<td><?=htmlspecialchars($person['first_name']);?></td>
					<td><?=htmlspecialchars($person['last_name']);?></td>
					<td><?=htmlspecialchars($person['email']);?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>