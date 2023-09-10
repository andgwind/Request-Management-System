<?php

namespace App\Enums;

enum TicketStatus: string
{
    case ACTIVE = 'Active';
    case RESOLVED = 'Resolved';

    public static function randomValue(): string
    {
        $statusArray = array_column(self::cases(), 'value');
        return $statusArray[array_rand($statusArray)];
    }
}
