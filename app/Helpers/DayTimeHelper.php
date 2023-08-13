<?php

namespace App\Helpers;

use Spatie\OpeningHours\OpeningHours;

class DayTimeHelper
{

    function daysOfWeek()
    {
        $openingHours = new OpeningHours(); // You can also pass any specific opening hours data if needed

        return collect($openingHours->getDays())->mapWithKeys(function ($day) {
            return [$day => ucfirst($day)]; // Format the day labels
        });
    }
}
