<?php

namespace App\Requests;

class TaskParamsRequest
{
    public ?int $currentPage;

    public function __construct($currentPage)
    {
        $this->currentPage = $currentPage;
    }
}
