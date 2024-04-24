<?php
include_once 'layout/header.php';

// Sanitize variables
$id = htmlentities($id);
$username = htmlentities($name);
$password = htmlentities($birthday);

echo <<<_END
<h1>Gebruiker bewerken</h1>
<form method="POST" action="index.php?save">
<input type="hidden" name="id" value="$id">
<input type="text" name="name" placeholder="Name" value="$name" required> <br><br>
<input type="text" name="birthday" placeholder="YYY-MM-DD" value="$birthday" required> <br><br>
<input type="submit" value="Update">
</form>
_END;

include_once 'layout/footer.php';
?>