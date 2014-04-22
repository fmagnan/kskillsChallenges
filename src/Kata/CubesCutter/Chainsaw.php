<?php

namespace Kata\CubesCutter;

use Kata\Resource\Parser;

class Chainsaw
{
    private $numberOfDimensions = 3;
    private $parser;
    private $result;

    public function __construct()
    {
        $this->parser = new Parser();
    }

    /**
     * gcd functions picked up from
     * http://www.php.net/manual/en/function.gmp-gcd.php
     */

    /*
     * function greatestCommonDivisor()
     *
     * returns greatest common divisor
     * between two numbers
     * tested against gmp_gcd()
     */
    private function greatestCommonDivisor($a, $b)
    {
        if ($a == 0) {
            return abs($b);
        }
        if ($b == 0) {
            return abs($a);
        }
        $r = $a % $b;
        return $this->greatestCommonDivisor($b, $r);
    }

    /*
     * function gcd_array()
     *
     * gets greatest common divisor among
     * an array of numbers
     */
    private function greatestCommonDivisorFromArray($array)
    {
        return array_reduce(
            $array,
            function ($result, $item) {
                return $this->greatestCommonDivisor($result, $item);
            }
        );
    }

    /**
     * @param  array parallelepipedic $piece of wood
     * @return int volume
     */

    private function getPieceVolume(array $piece)
    {
        return array_reduce(
            $piece,
            function ($result, $item) {
                return $result * $item;
            },
            1
        );
    }

    public function start($stdin)
    {
        $lines = $this->parser->read($stdin);
        $lines = $this->parser->skipFirstLine($lines);

        $totalVolume = 0;
        $minimumCubeSides = array();

        foreach ($lines as $line) {
            $woodPiece = array();
            foreach ($line as $dimension) {
                $woodPiece[] = (int)$dimension;
            }

            if ($this->numberOfDimensions !== count($woodPiece)) {
                throw new WrongUniverseException("This is not the universe that you are looking for");
            }

            $minimumCubeSides[] = $this->greatestCommonDivisorFromArray($woodPiece);
            $totalVolume += $this->getPieceVolume($woodPiece);
        }
        $minimumCubeSide = $this->greatestCommonDivisorFromArray($minimumCubeSides);

        $this->result = array($minimumCubeSide, $totalVolume / pow($minimumCubeSide, 3));
    }

    public function out()
    {
        return $this->parser->out($this->result);
    }
}