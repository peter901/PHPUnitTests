<?php 
use \PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected static $queue;

    protected function setUp(): void
    {
        static::$queue->clear();
    }

    public static function setUpBeforeClass():void
    {
        static::$queue = new Queue();
    }

    protected function tearDown(): void
    {
        
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::$queue->getCount());
    }

    public function testItemIsAddedToTheQueue()
    {
        static::$queue->push('green');

        $this->assertEquals(1,static::$queue->getCount());
    }

    public function testAddItemIsSameAsRemovedFromTheQueue()
    {
        
        static::$queue->push('green');

        $item = static::$queue->pop();
        
        $this->assertEquals(0,static::$queue->getCount());

        $this->assertEquals('green',$item);
    }

    public function testItemIsRemovedFromTheStartOfTheQueue(){

        static::$queue->push('first');
        static::$queue->push('second');

        $item = static::$queue->pop();

        $this->assertEquals('first',$item);
    }

    public function testMaxNumberOfItems(){

        for($i=0; $i < Queue::MAX_ITEMS; $i++){
            static::$queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());
    }

    public function testThrowsExceptionWhenMaxItemsIsExceeded()
    {
        for($i=0; $i < Queue::MAX_ITEMS; $i++){
            static::$queue->push($i);
        }

        $this->expectException(QueueException::class);
        $this->expectExceptionMessage('Q');

        static::$queue->push('new item');
    }
}