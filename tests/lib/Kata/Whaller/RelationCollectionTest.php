<?php

namespace Kata\Whaller;

class RelationCollectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function emptyListGivesEmptyRange()
    {
        $collection = new RelationCollection();
        $this->assertTrue($collection->isEmpty());
    }

}
