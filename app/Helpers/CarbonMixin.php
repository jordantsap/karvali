<?php

namespace App\Helpers;

use Carbon\CarbonImmutable;

class CarbonMixin
{
    public function startOfWeekMonday()
    {
        return function () {
            return $this->startOfWeek(CarbonImmutable::MONDAY);
        };
    }
}
