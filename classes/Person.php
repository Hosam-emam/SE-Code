<?php
    abstract class Person{

            protected $id;
            protected $name;
            protected $phoneNumber;

            function __construct($id,$name,$phoneNumber){
                $this->id = $id;
                $this->name = $name;
                $this->phoneNumber = $phoneNumber;
            } 
    }
?>