<?php

namespace App\Modules\ArmaLife\Criteria;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

class HouseTableCriteria implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->select([
            'id',
            'pid',
            'pos'
        ]);
        return $model;
    }
}