<?php

class Item
{
//properties are declared as properties inside the class
private $name;
private $description;
// using getter and setter methods to get the description & name property  of the item instance.
public function getName() 
{ 
    return$this->name;
 }
public function setName($name)
{
    $this->name = $name;
}

public function getDescription() 
{ 
    return$this->description;
 }
public function setDescription($description){

    $this->description = $description;
}

}

// public function __construct($name, $description){
//     $this->name = $name;
//     $this->description = $description;
// }
// public function getName(){

//     return $this->name;
// }

// }
// /*
// class Person {
//     public $name;

//     public function sayHello() {
//         echo "Hello, my name is " . $this->name;
//     }
// }
// */

