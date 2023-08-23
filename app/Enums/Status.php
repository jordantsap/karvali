<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Received()
 * @method static static Pending()
 * @method static static Completed()
 */
final class Status extends Enum
{
    const Received = 'Received';
    const Pending = 'Pending';
    const Completed = 'Completed';
    const CanceledByAdmin = 'CanceledByAdmin';
    const CanceledByUser = 'CanceledByUser';
}
