<?php

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
function gcd($a, $b)
{
    if ($a == 0 || $b == 0)
        return abs( max(abs($a), abs($b)) );

    $r = $a % $b;
    return ($r != 0) ?
        gcd($b, $r) :
        abs($b);
}

/*
 * function gcd_array()
 *
 * gets greatest common divisor among
 * an array of numbers
 */
function gcd_array($array, $a = 0)
{
    $b = array_pop($array);
    return ($b === null) ?
        (int)$a :
        gcd_array($array, gcd($a, $b));
}

/**
 * @param array parallelepipedic $piece of wood
 * @return int volume
 */

function getPieceVolume(array $piece) {
	return (int) $piece[0]*$piece[1]*$piece[2];
}

function main()
{
    $stdin = fopen('php://stdin', 'r');
    $stdout = fopen('php://stdout', 'w');

	$uselessFirstLine=fgets($stdin);
    unset($uselessFirstLine);

	$totalVolume=0;
	$minimumCubeSide=100;

	while(false!==($line=fgets($stdin)))
	{
        $woodPiece=array();
		foreach(explode(';',$line) as $dimension){
            $woodPiece[]=(int)$dimension;
        }

        $minimumCubeSide=min($minimumCubeSide,gcd_array($woodPiece));

		$totalVolume+=getPieceVolume($woodPiece);
	}

	fputs($stdout, $minimumCubeSide.';'.$totalVolume / pow($minimumCubeSide,3));

	fclose($stdout);
	fclose($stdin);
}

main();
