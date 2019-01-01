<?php

namespace App\DateChecker;


use Carbon\Carbon;
const WEEKEND_DATE = 15;
class CheckBonusDateByMonth implements DateByMonthInterface
{
    /**
     * @param Carbon $date
     * @return Carbon|static
     */
    public function checkByMonth(Carbon $date)
    {
        $date->day = WEEKEND_DATE;

        return $date->isWeekend() ? $date->next(Carbon::WEDNESDAY) : $date;
    }
}