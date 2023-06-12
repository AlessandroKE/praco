<?php
require ('item.php');
//OBJECT ORIENTED PROGRAMMING

$my_item = new Item();
/*
$my_item->name = 'Sandro';
$my_item->description = 'Best student to Grace this earth';



*/
$my_item->name = 'Sandro';

echo $my_item->getName();
?>