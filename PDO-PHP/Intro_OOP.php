<?php
require ('item.php');
//OBJECT ORIENTED PROGRAMMING

$my_item = new Item();

$my_item->setName("sandro");
$my_item->setDescription("I am getting these things very fast");

echo $my_item->getName();

//var_dump($my_item->name);
/*
$my_item->name = 'Sandro';
$my_item->description = 'Best student to Grace this earth';



*/
//$person = new Person();
//$person->name = "John Doe";
//$person->sayHello();  // Output: Hello, my name is John Doe
//$my_item->name = 'Sandro';

//echo $my_item->getName();
