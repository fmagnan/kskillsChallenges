<?php

namespace Kata\Whaller;

class RangeFinder
{
    protected $relationCollection;

    public function __construct(\ArrayIterator $collection)
    {
        $this->relationCollection = $collection;
    }

    public function computeMinimumDistanceBetween(Relation $couple)
    {
        $distance = 1;
        foreach ($this->relationCollection as $index => $relation) {
            $extractedRelation = $relation->extractNewRelationFrom($couple);
            if ($relation->isEqualTo($couple)) {
                return $distance;
            } elseif ($relation->shareOneMateWith($couple)) {
                $this->relationCollection->offsetUnset($index);
                return $distance + $this->computeMinimumDistanceBetween($extractedRelation);
            }
        }
    }

}