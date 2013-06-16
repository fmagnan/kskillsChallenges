<?php

namespace Kata\Calendar;

class ExecutiveAssistantTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function getZeroWhenNoneEventsAreGiven()
    {
        $this->assistant = new ExecutiveAssistant();
        $this->assertEquals(0,$this->assistant->computeMaxEventsToBeIn());
    }

}