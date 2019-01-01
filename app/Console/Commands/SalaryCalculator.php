<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Csv\CsvWriterService;
use Illuminate\Support\Facades\Log;

class SalaryCalculator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payroll:export';

    /**
     * @var CsvWriterService
     */
    protected $csvWriter;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The Command for determine the payroll dates for the Sales Department';

    /**
     * SalaryCalculator constructor.
     * @param CsvWriterService $csvWriter
     */
    public function __construct(CsvWriterService $csvWriter)
    {
        parent::__construct();
        $this->csvWriter = $csvWriter;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $this->info('The document is preparing please wait');
            $this->csvWriter->writeToCsv();
            $this->info('this is done');
        } catch (\Exception $e) {
            Log::alert($e->getMessage());
            $this->info($e->getMessage());
        }
    }
}