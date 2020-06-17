<?php

namespace App\Data;

class PaginationData
{
    //Дефолтная страница
    public int $currentPage = 1;

    public ?int $countPage;

    public ?int $previousPage;

    public ?int $nextPage;

    public function __construct($currentPage, $countPage, $previousPage, $nextPage)
    {
        $this->currentPage = $currentPage;
        $this->countPage = $countPage;
        $this->previousPage = $previousPage;
        $this->nextPage = $nextPage;
    }
}
