<?php

namespace Kata\CubesCutter;

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

    protected function start($fileName)
    {
        $this->object->start(fopen(__DIR__.'/../../../resources/CubesCutter/'.$fileName,'r'));
    }

    /**
     * @test
     */
    public function sample()
    {
        $this->start('sample.txt');
        $this->assertEquals('1;17',$this->object->out());
    }

    /**
     * @test
     */
    public function onlyOnePiece()
    {
        $this->start('onlyOnePiece.txt');
        $this->assertEquals('5;1',$this->object->out());
    }

    /**
     * @test
     */
    public function testVariousPieces()
    {
        $this->start('variousPieces.txt');
        $this->assertEquals('4;112',$this->object->out());
    }

    /**
     * @test
     */
    public function aLotOfPieces()
    {
        $this->start('aLotOfPieces.txt');
        $this->assertEquals('3;64772',$this->object->out());
    }

    /**
     * @test
     */
    public function wrongFormatEntry()
    {
        $this->setExpectedException( 'Kata\\CubesCutter\\WrongUniverseException' );
        $this->start('wrongFormatEntry.txt');
    }

    /**
     * @test
     */
    public function gcdBetweenPiecesAreOne()
    {
        $this->start('gcdBetweenPiecesAreOne.txt');
        $this->assertEquals('1;91',$this->object->out());
    }
}
