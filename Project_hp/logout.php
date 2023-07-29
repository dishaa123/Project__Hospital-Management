<?php
include_once('db.php');

session_start();

if(session_destroy())
{
    header('location:index.php');
}
?>