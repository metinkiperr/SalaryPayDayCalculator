<?php


namespace App\DateChecker;

use Carbon\Carbon;
interface DateByMonthInterface
{
    /**
     * @param Carbon $date
     * @return Carbon
     */
    public function checkByMonth(Carbon $date);
}