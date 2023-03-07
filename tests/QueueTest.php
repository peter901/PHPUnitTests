<?php 
use \PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{

    public function testNewQueueIsEmpty()
    {
        $queue = new Queue();

        $this->assertEquals(0, $queue->getCount());
        return $queue;
    }

    /**
     * @depends testNewQueueIsEmpty
     */
    public function testItemIsAddedToTheQueue(Queue $queue)
    {
        $queue->push('green');

        $this->assertEquals(1,$queue->getCount());

        return $queue;
    }

    /**
     * @depends testItemIsAddedToTheQueue
     */

    public function testAddItemIsSameasRemovedFromTheQueue(Queue $queue){
        
        $item = $queue->pop();
        
        $this->assertEquals(0,$queue->getCount());

        $this->assertEquals('green',$item);
    }
}