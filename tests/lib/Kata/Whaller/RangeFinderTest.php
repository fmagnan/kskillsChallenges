<?php

namespace Kata\Whaller;

class RangeFinderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function twoPersonsWithinASameRelationHaveARangeOfOne()
    {
        $collection = new RelationCollection();
        $relation= new Relation('Pierre', 'Ben');
        $collection->append($relation);
        $rangeFinder=new RangeFinder($collection);
        $this->assertEquals(1, $rangeFinder->computeMinimumDistanceBetween($relation));
    }

    /**
     * @test
     */
    public function twoPersonsWhoKnowTheSameGuyHaveARangeOfTwo()
    {
        $collection = new RelationCollection();
        $collection->append(new Relation('Pierre', 'Antoine'));
        $collection->append(new Relation('Ben', 'Antoine'));
        $rangeFinder=new RangeFinder($collection);
        $this->assertEquals(2, $rangeFinder->computeMinimumDistanceBetween(new Relation('Pierre', 'Ben')));
    }

    /**
     * @test
     */
    public function twoPersonsWhoKnowTheSameGuyAmongManyOthersHaveARangeOfTwo()
    {
        $collection = new RelationCollection();
        $collection->append(new Relation('Pierre', 'Antoine'));
        $collection->append(new Relation('Ben', 'Antoine'));
        $collection->append(new Relation('Sophie', 'Tonio'));
        $collection->append(new Relation('Sophie', 'Henri'));
        $collection->append(new Relation('Aline', 'Jacques'));
        $collection->append(new Relation('Jean', 'Paul'));
        $collection->append(new Relation('Jacques', 'Tonio'));
        $rangeFinder=new RangeFinder($collection);
        $this->assertEquals(2, $rangeFinder->computeMinimumDistanceBetween(new Relation('Pierre', 'Ben')));
    }

}
