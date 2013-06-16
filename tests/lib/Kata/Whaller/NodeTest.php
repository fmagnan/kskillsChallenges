<?php

namespace Kata\Whaller;

class NodeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function aloneNodeKnowsNothing()
    {
        $node = new Node('Pierre');
        $this->assertTrue($node->hasNoNeighbours());
    }

    /**
     * @test
     */
    public function aNodeWithDirectNeighboursHasDistanceEqualToOne()
    {
        $pierre = new Node('Pierre');
        $ben = new Node('Ben');
        $pierre->addNeighbour($ben);
        $this->assertEquals(1, $pierre->seekFor($ben));
    }

    /**
     * @test
     */
    public function aNodeWithNoConnectionCannotBeReached()
    {
        $pierre = new Node('Pierre');
        $ben = new Node('Ben');
        $seb = new Node('Seb');
        $pierre->addNeighbour($seb);
        $this->assertEquals(Node::TOO_FAR_DISTANCE_TO_REACH_NODE, $pierre->seekFor($ben));
    }

    /**
     * @test
     */
    public function twoNodesKnowsEachOtherWhenTheyAreNeighboursOfTheSameNode()
    {
        $pierre = new Node('Pierre');
        $ben = new Node('Ben');
        $seb = new Node('Seb');
        $pierre->addNeighbour($seb);
        $ben->addNeighbour($seb);
        $this->assertEquals(2, $pierre->seekFor($ben));
    }

    /**
     * @test
     */
    public function twoNodesHaveARangeOfThree()
    {
        $ben = new Node('Ben');
        $claire = new Node('Claire');
        $francois = new Node('Francois');
        $jacques = new Node('Jacques');
        $manu = new Node('Manu');
        $mathilde = new Node('Mathilde');
        $pat = new Node('Pat');
        $pierre = new Node('Pierre');
        $seb = new Node('Seb');
        $sophie = new Node('Sophie');
        $tonio = new Node('Tonio');
        $sophie->addNeighbour($francois);
        $jacques->addNeighbour($francois);
        $manu->addNeighbour($seb);
        $pierre->addNeighbour($claire);
        $seb->addNeighbour($ben);
        $pierre->addNeighbour($jacques);
        $jacques->addNeighbour($tonio);
        $pat->addNeighbour($francois);
        $francois->addNeighbour($sophie);
        $manu->addNeighbour($pierre);
        $mathilde->addNeighbour($claire);

        $this->assertEquals(3, $pierre->seekFor($ben));
    }
}
