<?php


namespace App\Salary;


use App\DateChecker\CheckBonusDateByMonth;
use App\DateChecker\CheckSalaryDateByMonth;

class SalaryService implements SalaryServiceInterface
{
    /**
     * @var \Carbon\Carbon
     */
    protected $startDate;

    /**
     * @var \Carbon\Carbon
     */
    protected $endDate;

    /**
     * @var CheckBonusDateByMonth
     */
    protected $bonusDateChecker;

    /**
     * @var CheckSalaryDateByMonth
     */
    protected $salaryDateChecker;

    use SalaryOrBonusDate;

    /**
     * SalaryService constructor.
     * @param Salary $salary
     * @param CheckBonusDateByMonth $bonusDateByMonth
     * @param CheckSalaryDateByMonth $checkSalaryDateByMonth
     */
    public function __construct(Salary $salary, CheckBonusDateByMonth $bonusDateByMonth, CheckSalaryDateByMonth $checkSalaryDateByMonth)
    {
        $this->startDate = $salary->getStartDate();
        $this->endDate = $salary->getEndDate();
        $this->bonusDateChecker = $bonusDateByMonth;
        $this->salaryDateChecker = $checkSalaryDateByMonth;
    }

    /**
     * @return array
     */
    public function calculatePerYear()
    {
        $result = [];

        while ($this->startDate->lte($this->endDate) && $this->startDate->diffInMonths($this->endDate) >= 0) {
            $result[] = $this->calculateByMonth();
        }

        return $result;
    }

    /**
     * @return array
     */
    public function calculateByMonth()
    {
        $payDayMonth = [
            'month' => $this->startDate->format('F'),
        ];

        //$payDayMonth['salaryDate'] = $this->checkSalaryDate($this->startDate->copy());
        //$payDayMonth['bonusDate'] = $this->checkBonusDate($this->startDate->copy());

        $payDayMonth['salaryDate'] = $this->salaryDateChecker->checkByMonth($this->startDate->copy());
        $payDayMonth['bonusDate'] = $this->bonusDateChecker->checkByMonth($this->startDate->copy());
        $this->startDate->addMonth();
        return $payDayMonth;
    }
}