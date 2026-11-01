<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * How an individual house is offered by a rental company.
 */
final class HouseListing extends Enum
{
    public const RENT = 'rent';
    public const SALE = 'sale';
}
