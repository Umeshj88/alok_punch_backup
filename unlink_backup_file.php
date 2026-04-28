<?php
$file_name=$_GET['file_name'];
unlink(getcwd().'\\'.$file_name);
?>