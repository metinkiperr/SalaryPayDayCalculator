<?php

namespace Tests\Unit;

use App\DateChecker\CheckBonusDateByMonth;
use App\DateChecker\CheckSalaryDateByMonth;
use App\Salary\Salary;
use App\Salary\SalaryService;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class SalaryTest extends TestCase
{
    public function testCalculateByMonthTest()
    {
        $startDate = Carbon::parse('2018-12-18');
        $endDate = Carbon::now();
        $salary = new Salary($startDate, $endDate);
        $checkBonusDateByMonth = new CheckBonusDateByMonth();
        $checkSalaryDateByMonth = new CheckSalaryDateByMonth();
        $classUnderTest = new SalaryService($salary, $checkBonusDateByMonth,$checkSalaryDateByMonth);
        $salaryDate = Carbon::parse('2018-12-31');
        $bonusDate = Carbon::parse('2018-12-19');
        $actualResult = [
            'month' => 'December',
            'salaryDate' => $salaryDate,
            'bonusDate' => $bonusDate
        ];

        $expectedResult = $classUnderTest->calculateByMonth();
        $this->assertEquals($expectedResult, $actualResult);
    }

}
