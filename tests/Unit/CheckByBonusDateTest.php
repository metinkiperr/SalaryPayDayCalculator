<?php

namespace Tests\Unit;


use App\DateChecker\CheckBonusDateByMonth;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class CheckByBonusDateTest extends TestCase
{
    /**
     * @test
     */
    public function testCheckByBonusDate()
    {
        $date = Carbon::parse('2018-12-18');
        $actualResult = Carbon::parse('2018-12-19');
        $classUnderTest = new CheckBonusDateByMonth();
        $expectedResult = $classUnderTest->checkByMonth($date);
        $this->assertEquals($expectedResult, $actualResult);
    }
}