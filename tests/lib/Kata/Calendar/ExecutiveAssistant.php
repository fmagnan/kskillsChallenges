<?php

namespace Kata\Calendar;

class ExecutiveAssistantTest extends \PHPUnit_Framework_TestCase
{
    protected $assistant;

    protected function setUp()
    {
        $this->assistant = new ExecutiveAssistant();
    }

    /**
     * @test
     */
    public function getZeroWhenNoneEventsAreGiven()
    {

    }

}