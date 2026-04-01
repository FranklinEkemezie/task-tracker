<?php

namespace App\Enums;

enum TaskFrequency: string
{
    //

    case DAILY = 'daily';
    case WEEKDAYS = 'weekdays';
    case WEEKLY = 'weekly';
    case MONTHLY = 'monthly';

}
