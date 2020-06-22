<?php

namespace App\Filters;

use Waavi\Sanitizer\Contracts\Filter;

class Zipcode implements Filter
{
    public $name = 'zipcode';

    public function apply($value, $options = [])
    {
        return sprintf(
            "%s-%s",
            substr($value, 0, 5),
            substr($value, 5, 3)
        );
    }
}
