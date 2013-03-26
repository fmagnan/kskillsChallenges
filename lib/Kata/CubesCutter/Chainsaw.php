<?php

namespace Kata\CubesCutter;

class Chainsaw
{
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
        if ($a == 0 || $b == 0)
            return abs(max(abs($a), abs($b)));

        $r = $a % $b;

        return ($r != 0) ?
            $this->gcd($b, $r) :
            abs($b);
    }

    /*
     * function gcd_array()
     *
     * gets greatest common divisor among
     * an array of numbers
     */
    private function gcd_array($array, $a = 0)
    {
        $b = array_pop($array);

        return ($b === null) ?
            (int) $a :
            $this->gcd_array($array, $this->gcd($a, $b));
    }

    /**
     * @param  array parallelepipedic $piece of wood
     * @return int                    volume
     */

    private function getPieceVolume(array $piece)
    {
        return (int) $piece[0] * $piece[1] * $piece[2];
    }

    public function start($stdin)
    {
        $uselessFirstLine = fgets($stdin);
        unset($uselessFirstLine);

        $totalVolume = 0;
        $minimumCubeSide = 100;

        while (false !== ($line = fgets($stdin))) {
            $woodPiece = array();
            foreach (explode(';', $line) as $dimension) {
                $woodPiece[] = (int) $dimension;
            }

            $minimumCubeSide = min($minimumCubeSide, $this->gcd_array($woodPiece));

            $totalVolume += $this->getPieceVolume($woodPiece);
        }

        $this->stdout=$minimumCubeSide . ';' . $totalVolume / pow($minimumCubeSide, 3);
    }

    public function out()
    {
        return $this->stdout;
    }
}
