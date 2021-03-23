<?php

class vendingMachine
{
    private $availableItems = array('bars' => 1.25, 'pop' => 1.50, 'chips' => 1.75);

    public function get_available_items(){
        return $this->availableItems;
    }   

 }

 $item = new vendingMachine();

?>