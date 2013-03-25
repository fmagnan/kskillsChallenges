<?php

function getVolume($piece) {
	return $piece['length']*$piece['width']*$piece['height'];
}

function main()
{
	$stdin = fopen(__DIR__.'/data/variousPieces.txt', 'r');
	$stdout = fopen(__DIR__.'/out.log', 'w');
	
	$uselessFirstLine=fgets($stdin);

	$totalVolume=0;
	$minimumCubeDimension=100;
	$pieces=array();	

	while(false!==($line=fgets($stdin)))
	{
		$dimensions=explode(';',$line);
		$woodPiece=array('length'=>(int)$dimensions[0],'width'=>(int)$dimensions[1],'height'=>(int)$dimensions[2]);
		$pieces[]=$woodPiece;

		$totalVolume+=getVolume($woodPiece);
		$minimumCubeDimension=min(min($woodPiece),$minimumCubeDimension);
	}

	foreach($pieces as $piece)
	{
		$remain=$totalVolume%getVolume($piece);
		if(0===$remain)
		{
			continue;
		}
		
		
	}

	fputs($stdout, $minimumCubeDimension.';'.$totalVolume / pow($minimumCubeDimension,3));

echo 'volume total = ' . $totalVolume . "\n";
echo 'min cote = ' . $minimumCubeDimension . "\n";
echo 'nb cubes = ' . $totalVolume / pow($minimumCubeDimension,3) . "\n";
	
	fclose($stdout);
	fclose($stdin);
}

main();
