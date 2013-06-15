<?php

namespace Kata\Whaller;

class Relation
{
    public $first;
    public $last;

    public function __construct($name, $anotherName)
    {
        if ($name < $anotherName) {
            $this->first = $name;
            $this->last = $anotherName;
        } else {
            $this->first = $anotherName;
            $this->last = $name;
        }
    }

    public function extractNewRelationFrom(Relation $couple)
    {
        if ($couple->first == $this->first && $couple->last == $this->last) {
            return $this;
        }
        if ($couple->first == $this->first) {
            return new Relation($couple->last, $this->last);
        }
        if ($couple->last == $this->last) {
            return new Relation($couple->first, $this->first);
        }
        return $couple;
    }

    public function isEqualTo(Relation $relation)
    {
        return (string)$relation === (string)$this;
    }

    public function __toString()
    {
        return $this->first . $this->last;
    }

    public function shareOneMateWith(Relation $relation)
    {
        return $relation->first == $this->first || $relation->last == $this->last;
    }

}