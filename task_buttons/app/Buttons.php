<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Converter;


class Buttons extends Model
{
    public static function normalize($request)
    {
        foreach($request as $field => $value){
            if( $field == 'btn_id' || $field == 'color_id') continue;
            $value = trim($value);
            //Премахваме празните полета,където са повече от едно между думите в низа, ако има такива
            $value = preg_replace('#[\s]+#', ' ', $value);
			$value = htmlspecialchars($value);

            $request[$field] = $value;
        }

        return $request;
    }

    public static function validate($request)
    {
        return Validator::make($request, [
			'title' => 'bail|required|string|min:2|max:50',
            'link' => ['bail', 'required', 'url', 'max:100'],
            'color_id' => ['bail', 'required', 'numeric', 'exists:colors,id'],
        ]);
    }

    public static function getList()
    {
        $data = DB::table('buttons')
                    ->select('buttons.*', 'colors.name', 'colors.color')
                    ->leftJoin('colors', 'buttons.color_id', '=', 'colors.id')
                    ->orderBy('buttons.updated_at', 'desc')
                    ->get();
        $data = Converter::convertObjToArr($data);
        return $data;
    }

    public static function getButton($id)
    {
        $data =  DB::table('buttons')
                    ->select('buttons.*')
                    ->where('id', $id)
                    ->get();
        $data = Converter::convertObjToArr($data);
        return $data;
    }

    public static function set($request)
    {
        return DB::table('buttons')->insert([
            'id' => $request['btn_id'],
            'title' => $request['title'],
            'link' => $request['link'],
            'color_id' => $request['color_id'],
            'created_at' => now(),
        ]);
    }

    public static function modify($request, $id)
    {
        $data = DB::table('buttons')
                    ->where('id', $id)
                    ->update([
                        'title' => $request['title'],
                        'link' => $request['link'],
                        'color_id' => $request['color_id'],
                        'updated_at' => now(),
                    ]);
        $data = Converter::convertObjToArr($data);
        return $data;
    }

    public static function remove($id)
    {
        DB::table('buttons')->where('id',$id)->delete();
    }
}
