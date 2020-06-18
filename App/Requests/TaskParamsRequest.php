<?php

namespace App\Requests;

class TaskParamsRequest
{
    public ?int $currentPage;
    public ?string $sortName;
    public ?string $sortEmail;
    public ?string $sortStatus;
    public ?string $typeSort;

    public function __construct(
        $currentPage,
        $sort,
        $typeSort
    ) {
        $this->currentPage = $currentPage;
        $this->sort = $sort;
        $this->typeSort = $typeSort;
    }
}
