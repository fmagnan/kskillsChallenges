<?php

namespace Kata\CubesCutter;

class Chainsaw
{
    private $numberOfDimensions = 3;
    private $stdout;
    
    /**
     * gcd functions picked up from
     * http://www.php.net/manual/en/function.gmp-gcd.php
     */

    /*
     * function gcd()
     *
     * returns greatest common divisor
     * between two numbers
     * tested against gmp_gcd()
     */
    private function gcd($a, $b)
    {
        if ($a == 0) return abs($b);
        if ($b == 0) return abs($a);
        $r = $a % $b;
        return $this->gcd($b, $r);
    }

    /*
     * function gcd_array()
     *
     * gets greatest common divisor among
     * an array of numbers
     */
    private function gcd_array($array)
    {
        return array_reduce($array, function($result, $item) {
            return $this->gcd($result, $item);
        });
    }

    /**
     * @param  array parallelepipedic $piece of wood
     * @return int volume
     */

    private function getPieceVolume(array $piece)
    {
        return array_reduce($piece, function($result, $item) {
            return $result * $item;
        }, 1);
    }

    public function start($stdin)
    {
        $uselessFirstLine = fgets($stdin);
        unset($uselessFirstLine);

        $totalVolume = 0;
        $minimumCubeSides = array();

        while (false !== ($line = fgets($stdin))) {
            $woodPiece = array();
            foreach (explode(';', $line) as $dimension) {
                $woodPiece[] = (int) $dimension;
            }

            if ($this->numberOfDimensions !== count($woodPiece)) {
                throw new WrongUniverseException("This is not the universe that you are looking for");   
            }

            $minimumCubeSides[ ] = $this->gcd_array($woodPiece);
            $totalVolume += $this->getPieceVolume($woodPiece);
        }
        $minimumCubeSide = $this->gcd_array($minimumCubeSides);

        $this->stdout = $minimumCubeSide . ';' . $totalVolume / pow($minimumCubeSide, 3);
    }

    public function out()
    {
        return $this->stdout;
    }
}
