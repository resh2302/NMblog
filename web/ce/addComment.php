<?php

include('config.php');

if(!$_GET['name']or !$_GET['comment'])
{
    echo '"result":false';
    die;
}

$query = 'INSERT INTO comment(name, email, comment, page) VALUES ("'.$_GET['name'].'", "'.$_GET['email'].'","'.$_GET['comment'].'","'.$_SERVER['HTTP_REFERER'].'")';
mysql_query($query, $connect) or die(mysql_error());

echo'{"result":true,"id":'.mysql_insert_id().'}';

?>
