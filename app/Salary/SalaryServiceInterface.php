<?php

namespace App\Salary;

interface SalaryServiceInterface
{
    /**
     * @return array
     */
    public function calculateByMonth();

    /**
     * @return array
     */
    public function calculatePerYear();
}