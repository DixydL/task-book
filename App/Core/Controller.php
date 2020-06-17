<?php

namespace App\Core;

class Controller
{
    public function render($viewName, $datas = ['test' => 'test'])
    {
        foreach ($datas as $key => $data) {
            ${"$key"} = $data;
        }

        include __DIR__ . "/../../resources/layout.php";
    }

    public function dataSerilize($data)
    {
        return htmlspecialchars($data);
    }
}
