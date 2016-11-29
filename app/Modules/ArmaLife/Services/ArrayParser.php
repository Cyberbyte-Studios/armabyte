<?php

namespace App\Modules\ArmaLife\Services;

class ArrayParser
{
    private $armaLifeArray = '/\[([^,]*),([^,]*),([^,\]]*)]/';
    private $licenceArray = '/\[`([^`]*)`,([01])]/';

    public function inventory($items)
    {
        if ($this->isEmpty($items)) {
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

    public function licences($licences)
    {
        if ($this->isEmpty($licences)) {
            return false;
        }

        preg_match_all($this->licenceArray, $licences, $matches);
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
    
    public function stats(string $stats): array
    {
        return $this->parseThreeWayArray($stats, ['health', 'water', 'stamina']);
    }
    
    public function time(string $time): array
    {
        return $this->parseThreeWayArray($time, ['cop', 'med', 'civ']);
    }
    
    public function position(string $position): array
    {
        return $this->parseThreeWayArray($position, ['x', 'y', 'z']);
    }
    
    public function aliases($aliases)
    {
        preg_match_all("/`([^`]*)`/", $aliases, $matches);
        return $matches[1];
    }

    private function parseThreeWayArray(string $array, array $keys)
    {
        if ($this->isEmpty($array)) {
            return false;
        }

        preg_match_all($this->armaLifeArray, $array, $matches);

        if (count($matches, COUNT_RECURSIVE) !== 8) {
            return false;
        }

        unset($matches[0]);
        return array_combine($keys, array_column($matches, 0));
    }

    private function isEmpty(string $armaArray): bool
    {
        if (empty($armaArray) || $armaArray === '"[]"') {
            return true;
        }
        return false;
    }
}
