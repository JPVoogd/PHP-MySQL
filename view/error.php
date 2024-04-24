<?php
global $error;

include_once 'layout/header.php';

echo "<h2>Error</h2>";
echo "<p>$error</p>";

echo "<p><a href='index.php?home'>Back to home.</a></p>";

include_once 'layout/footer.php';
?>