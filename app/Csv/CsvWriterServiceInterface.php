<?php

namespace App\Csv;

interface CsvWriterServiceInterface
{
    public function writeToCsv();

    public function getHeaders();

}