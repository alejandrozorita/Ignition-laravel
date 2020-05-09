<?php

namespace App\Solutions;

use Facade\IgnitionContracts\RunnableSolution;
use Illuminate\Support\Facades\File;

/**
 * Class MyCustomSolution
 *
 * @package App\Solutions
 */
class MyCustomSolution implements RunnableSolution
{

    private $file;

    public function __construct($file = null)
    {
        $this->file = $file;
    }


    public function getSolutionActionDescription(): string
    {
        return 'Catch o remove de exception';
    }


    public function getRunButtonText(): string
    {
        return 'Remove exception';
    }


    public function run(array $parameters = [])
    {
        $content = File::get($parameters['file']);
        $content = str_replace('throw new MyCustomException', '// throw new MyCustomException', $content );

        File::replace($parameters['file'], $content);

    }


    public function getRunParameters(): array
    {
        return [
          'file' => $this->file,
        ];
    }


    public function getSolutionTitle(): string
    {
        return 'Your application threw a custom exception';
    }


    public function getSolutionDescription(): string
    {
        return 'A `MyCustomException` exception was throw and not caught';
    }


    public function getDocumentationLinks(): array
    {
        return [
          'Aprende más ByteCode' => 'https://bytecode.es'
        ];
    }

}