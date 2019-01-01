<?php

namespace App\Csv;


use App\Salary\SalaryService;
use Illuminate\Support\Facades\Log;
use League\Csv\Writer;

const PATH = 'storage/csv/file.csv';
class CsvWriterService implements CsvWriterServiceInterface
{

    /**
     * @var SalaryService
     */
    protected $salary;

    /**
     * @var Writer
     */
    protected $writer;

    /**
     * CsvWriter constructor.
     * @param SalaryService $salary
     */
    public function __construct(SalaryService $salary)
    {
        $this->salary = $salary;
        $this->writer = Writer::createFromPath(PATH, 'w');
    }

    public function writeToCsv()
    {
        try {
            $this->writer->setDelimiter('\t');
            $this->writer->insertOne($this->getHeaders());
            $this->writer->insertAll($this->salary->calculatePerYear());
        } catch (\Exception $e) {
            Log::alert($e->getMessage());
        }
    }

    public function getHeaders()
    {
        return array('months', 'salaryDay', 'bonusDay');
    }
}