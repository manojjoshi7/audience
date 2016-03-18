<?php
include_once("database.php");
$db_object=new Dbconnect();
echo $db_object->get_data($_POST["audince"]);

?>