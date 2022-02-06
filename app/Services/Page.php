<?php

namespace App\Services;

class Page
{
    public static function block($block)
    {
        require_once "vievs/blocks/".$block.".php";
    }
}