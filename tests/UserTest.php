<?php 
use \PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testReturnsFullName()
    {
        $user = new User();
        $user->first_name = 'Peter';
        $user->surname = 'Ahumuza';

        $this->assertEquals('Peter Ahumuza', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault(){
        $user = new User();

        $this->assertEquals('',$user->getFullName());
    }
}