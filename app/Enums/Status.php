<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Status extends Enum
{
    const Received = 'Received';
    const PENDING = 'Pending';
    const COMPLETED = 'Completed';
    const CANCELEDBYADMIN = 'CanceledByAdmin';
    const CANCELEDBYUSER = 'CanceledByUser';
}
