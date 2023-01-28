<?php
class CsvImport
{
    public function ReadCsv(string $filepath): Generator
    {
        $fp = fopen($filepath, 'r');
        while (($file_data = fgetcsv($fp)) != false) {
            yield $file_data;
        }
        fclose($fp);
    }
    public function filterByCountry(iterable $csv_records, int $index, string $country): Generator
    {
        foreach ($csv_records as $record) {
            if ($record[$index] === $country) {
                yield $record;
            }
        }
    }
    public function filterByYear(iterable $csv_records, int $index, string $year): Generator
    {
        foreach ($csv_records as $record) {
            if ($record[$index] === $year) {
                yield $record;
            }
        }
    }

    public function main(): Generator
    {
        $filtered_records = [];
        $all_records = $this->ReadCsv('../test.csv');
        $filtered_records = $this->filterByCountry($all_records, 4, 'USA');
        $filtered_records = $this->filterByYear($filtered_records, 3, '2021');
        return $filtered_records;
    }
}

$startUseMemory = memory_get_usage();
echo 'begin[memory]' . $startUseMemory / (1024 * 1024) . "MB\n";

$time_start = microtime(true);

$import_class = new CsvImport();
$results = $import_class->main();

$time = microtime(true) - $time_start;
echo "{$time} sec\n";

echo 'end[memory]' . memory_get_usage() / (1024 * 1024) . "MB\n";
echo 'end[max memory]' . memory_get_peak_usage() / (1024 * 1024) . "MB\n";
echo 'end[memory used by process]' . (memory_get_peak_usage() - $startUseMemory) / (1024 * 1024) . "MB\n";
