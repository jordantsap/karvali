<?php

namespace App\Helpers;

use Spatie\OpeningHours\Day;

class GetInputsHelper
{
    public static function imageFields(): array
    {
        return ['header', 'logo', 'image1', 'image2', 'image3'];
    }

    public function daysInput(): array
    {
        return Day::days();
    }
}
