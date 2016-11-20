<?php

namespace App\Modules\ArmaLife\Services;

class ArrayParser
{
    public static function decode($array)
    {
        $result = $array;
        return $result;
    }
    
    // todo: cleanup legacy code
    public static function inventory($items)
    {
        // if ($items != '"[]"' && $items != '' && $items != null) {
        //     preg_match_all("/`([^`]*)`/", $items, $matches);
        //     $allItems = array_count_values($matches[1]);
        //     unset($allItems['']);
        //     foreach ($allItems as $item => $count) {
        //         $inventory[trans('item.'.$item)] = $count;
        //     }
        //     return $inventory;
        // }
        // return false;
        
        if ($items == '"[]"' && $items == '' && $items == null) {
            return false;
        }
        
        preg_match_all("/`([^`]*)`/", $items, $matches);
        $allItems = array_count_values($matches[1]);
        
        $parsedInventory = [];
        unset($allItems['']);
        foreach ($allItems as $key => $count) {
            array_push($parsedInventory, [
                'id' => $key,
                'name' => trans('item.'.$key),
                'count' => $count
            ]);
        }

        return $parsedInventory;
    }
    
    public static function stats($stats)
    {
        preg_match_all('/"\[([^,]*),([^,]*),([^,\]]*)]"/', $stats, $matches);
        if (count($matches, COUNT_RECURSIVE) !== 8) {
            return false;
        }
        
        return [
            'health' => $matches[1][0],
            'water' => $matches[2][0],
            'stamina' => $matches[3][0]
        ];
    }
    
    public static function time($time)
    {
        preg_match_all('/"\[([^,]*),([^,]*),([^,\]]*)]"/', $time, $matches);
        if (count($matches, COUNT_RECURSIVE) !== 8) {
            return false;
        }
        
        return [
            'cop' => $matches[1][0],
            'med' => $matches[2][0],
            'civ' => $matches[3][0]
        ];
    }
    
    public static function position($position)
    {
        preg_match_all('/\[([^,]*),([^,]*),([^,\]]*)]/', $position, $matches);
        
        if (count($matches, COUNT_RECURSIVE) !== 8) { // If match has 3 results it will be 8
            return false;
        }
        
        return [
            'x' => $matches[1][0],
            'y' => $matches[2][0],
            'z' => $matches[3][0]
        ];
    }
    
    public static function aliases($aliases)
    {
        preg_match_all("/`([^`]*)`/", $aliases, $matches);
        return $matches[1];
    }
    
    public static function licences($licences)
    {
        if ($licences == '"[]"' && $licences == '' && $licences == null) {
            return false;
        }
        
        preg_match_all("/\[`([^`]*)`,([01])]/", $licences, $matches);
        $parsedLicences = false;
        
        foreach ($matches[1] as $key => $name) {
            $parsedLicences[$key] = [
                'id' => $name,
                'name' => trans('license.'.$name),
                'status' => (int) $matches[2][$key]
            ];
        }

        return $parsedLicences;
    }
}