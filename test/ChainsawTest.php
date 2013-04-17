<?php

require_once __DIR__.'/../lib/Kata/CubesCutter/Chainsaw.php';
require_once __DIR__.'/../lib/Kata/CubesCutter/WrongUniverseException.php';

use Kata\CubesCutter\Chainsaw;
use Kata\CubesCutter\WrongUniverseException;

class ChainsawTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Chainsaw();
    }

    public function testSample()
    {
        $this->object->start(fopen(__DIR__.'/resources/sample.txt','r'));
        $this->assertEquals('1;17',$this->object->out());
    }

    public function testOnlyOnePiece()
    {
        $this->object->start(fopen(__DIR__.'/resources/onlyOnePiece.txt','r'));
        $this->assertEquals('5;1',$this->object->out());
    }

    public function testVariousPieces()
    {
        $this->object->start(fopen(__DIR__.'/resources/variousPieces.txt','r'));
        $this->assertEquals('4;112',$this->object->out());
    }

    public function testALotOfPieces()
    {
        $this->object->start(fopen(__DIR__.'/resources/aLotOfPieces.txt','r'));
        $this->assertEquals('3;64772',$this->object->out());
    }

    public function testWrongFormatEntry()
    {
        $this->setExpectedException( 'Kata\\CubesCutter\\WrongUniverseException' );
        $this->object->start(fopen(__DIR__.'/resources/wrongFormatEntry.txt','r'));
    }

    public function testGcdBetweenPiecesAreOne()
    {
        $this->object->start(fopen(__DIR__.'/resources/gcdBetweenPiecesAreOne.txt','r'));
        $this->assertEquals('1;91',$this->object->out());
    }
}
