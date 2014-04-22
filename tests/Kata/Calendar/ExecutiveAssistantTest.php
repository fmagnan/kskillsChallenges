<?php

namespace Kata\Calendar;

class ExecutiveAssistantTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function getZeroWhenNoneEventsAreGiven()
    {
        $assistant = new ExecutiveAssistant();
        $this->assertEquals(0, $assistant->computeMaxEventsToBeIn());
    }

}