<?php


namespace App\Twig;


use Twig\Extension\RuntimeExtensionInterface;

class AppRuntime implements RuntimeExtensionInterface
{

    public function route()
    {
        return [
          'Таблицы' => 'table_index'
        ];
    }

}