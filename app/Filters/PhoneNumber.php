<?php

namespace App\Filters;

use Waavi\Sanitizer\Contracts\Filter;

class PhoneNumber implements Filter
{
    public $name = 'phone_number';

    public function apply($value, $options = [])
    {
        if (strlen($value) === 10) {
            return sprintf(
                "(%s) %s-%s",
                substr($value, 0, 2),
                substr($value, 2, 4),
                substr($value, 6, 4)
            );
        }
        return sprintf(
            "(%s) %s-%s",
            substr($value, 0, 2),
            substr($value, 2, 5),
            substr($value, 7, 4)
        );
    }
}
