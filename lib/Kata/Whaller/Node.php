<?php

namespace Kata\Whaller;

class Node
{
    const TOO_FAR_DISTANCE_TO_REACH_NODE = 1000;

    protected $neighbours;
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
        $this->neighbours = array();
    }

    public function hasNoNeighbours()
    {
        return empty($this->neighbours);
    }

    public function addNeighbour(Node $new)
    {
        if ($this->isNewNodeStranger($new)) {
            $this->neighbours[] = $new;
            $new->addNeighbour($this);
        }
    }

    public function isNewNodeStranger(Node $new)
    {
        foreach ($this->neighbours as $neighbour) {
            if ($neighbour->isSameThan($new)) {
                return false;
            }
        }

        return true;
    }

    public function seekFor(Node $wanted, array $knownNodes = array(), $distance = 1)
    {
        $paths = array();

        foreach ($this->neighbours as $neighbour) {
            if ($wanted == $neighbour) {
                $paths[] = $distance;
            } elseif (!in_array($neighbour, $knownNodes)) {
                $knownNodes[] = $this;
                $paths[] = $neighbour->seekFor($wanted, $knownNodes, $distance + 1);
            }
        }
        $paths[] = self::TOO_FAR_DISTANCE_TO_REACH_NODE;

        return min($paths);
    }

    public function __toString()
    {
        return $this->name;
    }

    public function isSameThan(Node $other)
    {
        return (string)$this === (string)$other;
    }

}