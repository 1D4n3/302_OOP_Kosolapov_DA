<?php

namespace App;

class Truncater
{
    public static $defaultOptions = [
        'length' => 50,
        'separator' => '...'
    ];

    private $options;

    public function __construct($options = [])
    {
        $this->options = array_merge(self::$defaultOptions, $options);
    }

    public function truncate($str, $options = [])
    {
        $options = array_merge($this->options, $options);

        if (mb_strlen($str) <= $options['length']) {
            return $str;
        }

        $truncated = mb_substr($str, 0, $options['length']);
        $truncated .= $options['separator'];

        return $truncated;
    }
}