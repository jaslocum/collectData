<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 4/25/14
 * Time: 8:49 AM
 */

function recordList($type)
{
    global $x;
    $x = $type;
    $records = Record::
        whereHas('record_type', function ($q)
        {
            global $x;
            $q->where('name','=', $x);
        })->
        with('record_type')->
        orderBy('name', 'ASC')->
        get();

    return $records->lists('name','id');

}
