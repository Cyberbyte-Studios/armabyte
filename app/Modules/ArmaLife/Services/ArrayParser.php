<?php

namespace App\Modules\ArmaLife\Services;

class ArrayParser
{
    private $armaLifeArray = '/(?:[^`"\[\],\n]+)/';
    private $licenceArray = '/\[[`"]([^`"]*)[`"],([01])]/';
    private $inventoryArray = '/`([^`]*)`/';
    
    public function stats(string $stats): array
    {
        return $this->parseArmaLifeArray($stats, ['health', 'water', 'stamina']);
    }
    
    public function time(string $time): array
    {
        return $this->parseArmaLifeArray($time, ['cop', 'med', 'civ']);
    }
    
    public function position(string $position): array
    {
        return $this->parseArmaLifeArray($position, ['x', 'y', 'z']);
    }
    
    public function aliases($aliases)
    {
        return $this->parseArmaLifeArray($aliases);
    }

    public function inventory($items)
    {
        if ($this->isEmpty($items)) {
            return false;
        }

        preg_match_all($this->inventoryArray, $items, $matches);
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

    protected function parseArmaLifeArray(string $array, array $keys = [])
    {
        if ($this->isEmpty($array)) {
            return false;
        }

        preg_match_all($this->armaLifeArray, $array, $matches);
        $firstCapture = $matches[0];

        if (count($keys) === count($firstCapture)) {
            return array_combine($keys, $firstCapture);
        }
        return $firstCapture;
    }

    public function isEmpty($armaArray): bool
    {
        if (empty($armaArray) || $armaArray === '"[]"') {
            return true;
        }
        return false;
    }
}
