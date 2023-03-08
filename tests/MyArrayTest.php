<?php 
use \PHPUnit\Framework\TestCase;

class MyArrayTest extends TestCase
{

    public function testArrayAddItem()
    {
        $arr = new MyArray();

        $arr[0] = 'test';

        $this->assertEquals('test', $arr[0]);
    }
}