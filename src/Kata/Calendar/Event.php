<?php

namespace Kata\Calendar;

class Event
{
    const DATE_FORMAT = 'Y-m-d';

    public $start;
    protected $duration;
    public $end;

    public function __construct(\DateTime $start, \DateInterval $duration)
    {
        $this->start = $start;
        $this->duration = $duration;
        $end = new \DateTime($start->format(self::DATE_FORMAT));
        $this->end = $end->add($duration);
    }

    public function isOverlapping(Event $event)
    {
        return $this->start <= $event->end and $this->end >= $event->start;
    }

}