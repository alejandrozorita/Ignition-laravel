<?php

namespace App\Exceptions;

use App\Solutions\MyCustomSolution;
use Facade\IgnitionContracts\ProvidesSolution;
use Facade\IgnitionContracts\Solution;

class MyCustomException extends \Exception implements ProvidesSolution
{

    public function getSolution(): Solution
    {
        return new MyCustomSolution($this->getFile());
    }

}