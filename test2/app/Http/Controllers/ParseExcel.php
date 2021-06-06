<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cyberduck\LaravelExcel\Parser\BasicParser;
class ParseExcel extends BasicParser
{
    public function transform($row, $header)
    {
        //Use the Basic Parser and cast the result as object.
        return (object) parent::transform($row, $header);
    }
}
