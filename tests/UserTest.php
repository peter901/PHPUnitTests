<?php 
use \PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    protected $user;

    protected function setUp():void
    {
        $this->user = new User();
    }
    public function testReturnsFullName()
    {
        
        $this->user->first_name = 'Peter';
        $this->user->surname = 'Ahumuza';

        $this->assertEquals('Peter Ahumuza', $this->user->getFullName());
    }

    public function testFullNameIsEmptyByDefault(){
        $this->user = new User();

        $this->assertEquals('',$this->user->getFullName());
    }

    public function testNotificationIsSent(){
        
        $this->user->email = 'hmz2peter@gmail.com';

        $mock = $this->createMock(Mailer::class);
        
        $mock->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('hmz2peter@gmail.com'), $this->equalTo('Hello'))
            ->willReturn(true);

        $this->user->setMailer($mock);
        
        $this->assertTrue($this->user->notify("Hello"));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $mock = $this->getMockBuilder(Mailer::class)
                        ->setMethods(null)
                        ->getMock();

        $this->user->setMailer($mock);

        $this->expectException(Exception::class);

        $this->user->notify("hello");
    }
}