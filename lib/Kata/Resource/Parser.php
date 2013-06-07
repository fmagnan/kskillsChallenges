<?php

namespace Kata\Resource;

class Parser
{
    const LINE_SEPARATOR=';';

    public function read($resource)
    {
        $lines=array();
        while (false !== ($line = fgets($resource))) {
            $arrayLine=explode(';', $line);
            $lines[]=$arrayLine;
        }
        return $lines;
    }
}