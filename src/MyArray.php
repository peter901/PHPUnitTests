<?php 

class MyArray implements ArrayAccess{

    private $items;

    public function offsetExists($offset):bool 
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset) {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value):void 
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset($offset):void 
    {
        unset($this->items[$offset]);
    }
}