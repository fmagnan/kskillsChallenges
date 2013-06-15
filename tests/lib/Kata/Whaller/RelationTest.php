<?php

namespace Kata\Whaller;

class RelationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function extractSameCoupleFromRelationKeepCoupleIntact()
    {
        $relation = new Relation('Mickey', 'Minnie');
        $extractedRelation = $relation->extractNewRelationFrom($relation);
        $this->assertTrue($relation->isEqualTo($extractedRelation));
    }

    /**
     * @test
     */
    public function extractCoupleWithFirstMateInCommonFromRelationKeepOnlyThisMate()
    {
        $relation = new Relation('Mickey', 'Minnie');
        $couple = new Relation('Mickey', 'Pluto');
        $extractedRelation = $relation->extractNewRelationFrom($couple);
        $this->assertTrue($extractedRelation->shareOneMateWith($couple));
    }

    /**
     * @test
     */
    public function extractCoupleWithLasttMateInCommonFromRelationKeepOnlyThisMate()
    {
        $relation = new Relation('Mickey', 'Minnie');
        $couple=new Relation('Daisy', 'Minnie');
        $extractedRelation = $relation->extractNewRelationFrom($couple);
        $this->assertTrue($extractedRelation->shareOneMateWith($couple));
    }

    /**
     * @test
     */
    public function extractStrangerCoupleFromOutsideRelationship()
    {
        $relation = new Relation('Mickey', 'Minnie');
        $couple = new Relation('Daisy', 'Donald');
        $extractedRelation = $relation->extractNewRelationFrom($couple);
        $this->assertTrue($extractedRelation->isEqualTo($couple));
    }

}
