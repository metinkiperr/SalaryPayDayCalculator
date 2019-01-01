<?php

namespace App\DateChecker;


use Carbon\Carbon;

class CheckSalaryDateByMonth implements DateByMonthInterface
{
    /**
     * @param Carbon $date
     * @return Carbon|static
     */
    public function checkByMonth(Carbon $date)
    {
        return $date->lastOfMonth()->isWeekend() ? $date->previous(Carbon::FRIDAY) : $date;
    }
}