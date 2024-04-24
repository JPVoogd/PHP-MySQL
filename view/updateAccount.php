<?php
include_once 'layout/header.php';

// Sanitize variables
$id = htmlentities($id);
$username = htmlentities($username);
$password = htmlentities($password);

echo <<<_END
<h1>Account bewerken</h1>
<form method="POST" action="index.php?updateAccount">
<input type="hidden" name="id" value="$id">
<input type="text" name="username" placeholder="Username" value="$username" required> <br><br>
<input type="password" name="password" placeholder="Password" value="$password" required> <br><br>
<input type="submit" value="Update">
</form>
_END;

include_once 'layout/footer.php';
?>