<?php

namespace App\Data;

class SortData
{
    public ?string $sort;

    public ?string $typeSort;

    public ?string $nextTypeSort;

    public ?string $sortQuery;

    public function __construct($sort, $typeSort, $nextTypeSort, $sortQuery)
    {
        $this->sort = $sort;
        $this->typeSort = $typeSort;
        $this->nextTypeSort = $nextTypeSort;
        $this->sortQuery = $sortQuery;
    }
}
