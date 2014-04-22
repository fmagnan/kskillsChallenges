<?php

namespace Kata\Resource;

class Parser
{
    const LINE_SEPARATOR = ';';

    public function read($resource)
    {
        $lines = array();
        while (false !== ($line = fgets($resource))) {
            $arrayLine = explode(self::LINE_SEPARATOR, $line);
            $lines[] = $arrayLine;
        }
        return $lines;
    }

    public function out(array $line)
    {
        return implode(self::LINE_SEPARATOR, $line);
    }

    public function skipFirstLine($lines)
    {
        array_shift($lines);
        return $lines;
    }
}