<?php
//need to add location stuff here aswell

$keywords = $_POST['s'];

header("location:/search/results/" . $keywords);

?>