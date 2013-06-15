<?php

namespace Kata\Whaller;

class RelationCollection extends \ArrayIterator
{
    public function isEmpty()
    {
        return 0 === $this->count();
    }

}