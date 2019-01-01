<?php

namespace App\Salary;

use Carbon\Carbon;
const WEEKEND_DATE = 15;
trait SalaryOrBonusDate
{
    public function checkBonusDate(Carbon $date)
    {
        $date->day = WEEKEND_DATE;

        return $date->isWeekend() ? $date->next(Carbon::WEDNESDAY) : $date;
    }

    public function checkSalaryDate(Carbon $date)
    {
        return $date->lastOfMonth()->isWeekend() ? $date->previous(Carbon::FRIDAY) : $date;
    }
}