<?php
/**
 * Created by PhpStorm.
 * User: cameron
 * Date: 21/11/16
 * Time: 10:39
 */
namespace App\Modules\ArmaLife\Classes;
use Yajra\Datatables\Facades\Datatables;

class Helper {

    public static function buildTable($input)
    {
        return Datatables::of($input)->make();
    }

    public static function yesNo($input)
    {
        if ($input)
        {
            return trans('general.yes');
        }
        else
        {
            return trans('general.no');
        }
    }
}