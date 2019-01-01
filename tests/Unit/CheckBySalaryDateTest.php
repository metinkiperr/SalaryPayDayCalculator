<?php


namespace Tests\Unit;

use App\DateChecker\CheckSalaryDateByMonth;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class CheckBySalaryDateTest extends TestCase
{
    /**
     * @test
     */
    public function testCheckBySalaryDateTest()
    {
        $date = Carbon::parse('2018-12-18');
        $actualResult = Carbon::parse('2018-12-31');
        $classUnderTest = new CheckSalaryDateByMonth();
        $expectedResult = $classUnderTest->checkByMonth($date);
        $this->assertEquals($expectedResult, $actualResult);
    }
}