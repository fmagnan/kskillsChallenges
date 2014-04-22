<?php

namespace Kata\Resource;

class ParserTest extends \PHPUnit_Framework_TestCase
{
    protected $parser;

    protected function setUp()
    {
        $this->parser = new Parser();
    }

    protected function read($filename)
    {
        $filePath = __DIR__ . '/../../resources/' . $filename;
        return $this->parser->read(fopen($filePath, 'r'));
    }

    /**
     * @test
     */
    public function emptyFileGetsEmptyArray()
    {
        $this->assertEmpty($this->read('empty.txt'));
    }

    /**
     * @test
     */
    public function oneValueOnFirstLineGetsAnArrayWithSimpleValue()
    {
        $result = $this->read('oneValueOnFirstLine.txt');
        $this->assertEquals(array('winter is coming'), $result[0]);
    }

    /**
     * @test
     */
    public function severalValuesOnFirstLineGetsAnArrayWithSeveralValues()
    {
        $result = $this->read('severalValuesOnFirstLine.txt');
        $this->assertEquals(array('winter', 'is', 'coming'), $result[0]);
    }

}