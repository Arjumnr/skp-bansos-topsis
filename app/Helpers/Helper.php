<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Helpers
{
        public static function getData($param)
        {
                $data = DB::table($param)->get();
                return isset($data) ? $data : null;
        }

        // public static function arrayToString($param)
        // {
        //         $data = null;
        //         foreach ($param as $v) {
        //                 if ($data == null) {
        //                         $data = $v;
        //                 } else {
        //                         $data = $data . "," . $v;
        //                 }
        //         }
        //         return $data;
        // }

        // public static function getPerumahan()
        // {
        //         $data = DB::table('master_perumahans')->select('id', 'nama_perumahan', 'alamat');
        //         $access_id = Auth::user()->perumahan_id;
        //         if ($access_id != null || isset($access_id)) {
        //                 $access_id = explode(',', $access_id);
        //                 $data = $data->whereIn('id', $access_id);
        //                 return $data->get();
        //         }

        //         $data = $data->get();

        //         return isset($data) ? $data : null;
        // }
}
