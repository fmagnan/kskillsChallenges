<?php

namespace Kata\Calendar;


class EventTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function eventStartingAfterDoesNotOverlap()
    {
        $sixDays = new \DateInterval('P6D');
        $reference = new Event(new \DateTime('2013-01-12'), $sixDays);
        $event = new Event(new \DateTime('2013-02-12'), $sixDays);
        $this->assertFalse($event->isOverlapping($reference));
    }

    /**
     * @test
     */
    public function eventStartingBeforeEndOverlaps()
    {
        $sixDays = new \DateInterval('P6D');
        $reference = new Event(new \DateTime('2013-01-12'), $sixDays);
        $event = new Event(new \DateTime('2013-01-16'), $sixDays);
        $this->assertTrue($event->isOverlapping($reference));
    }

    /**
     * @test
     */
    public function eventEndingAfterStartOverlaps()
    {
        $sixDays = new \DateInterval('P6D');
        $reference = new Event(new \DateTime('2013-01-12'), $sixDays);
        $event = new Event(new \DateTime('2013-01-08'), $sixDays);
        $this->assertTrue($event->isOverlapping($reference));
    }

}