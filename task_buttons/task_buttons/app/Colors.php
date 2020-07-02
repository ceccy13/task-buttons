<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Converter;

class Colors extends Model
{
    public static function getList()
    {
        $data = DB::table('colors')->get();
        $data = Converter::convertObjToArr($data);
        return $data;
    }
}
