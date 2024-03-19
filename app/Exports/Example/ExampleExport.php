<?php

namespace App\Exports\Example;

use Maatwebsite\Excel\Concerns\FromCollection;

class ExampleExport implements FromCollection
{
    private $posts;

    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->posts);
    }
}
