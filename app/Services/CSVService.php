<?php
namespace App\Services;

use Illuminate\Http\Response;

class CSVService
{
    public $headers;
    public $columns;
    const DELIMITER = ",";

    public function __construct($fileName = 'download')
    {
        $this->headers = [
            "X-Suggested-Filename"          => "{$fileName}.csv",
            "Content-type"                  => "text/csv",
            "Content-Disposition"           => "attachment; filename={$fileName}.csv",
            "Pragma"                        => "no-cache",
            "Cache-Control"                 => "must-revalidate, post-check=0, pre-check=0",
            "Expires"                       => "0",
            "Access-Control-Allow-Origin"   => "*",
            "Access-Control-Expose-Headers" => "X-Suggested-Filename",
        ];
    }

    public function setColumns($columnsArray)
    {
        $this->columns = $columnsArray;
        return $this;
    }

    public function generateFile($entityDataArray)
    {
        $callback = function () use ($entityDataArray) {
            $file = fopen('php://output', 'w');
            if (isset($this->columns)) {
                fputcsv($file, $this->columns, $delimiter = self::DELIMITER);
            }
            foreach ($entityDataArray as $row) {
                fputcsv($file, $row, $delimiter = self::DELIMITER);
            }
            fclose($file);
        };
        return response()->stream($callback, Response::HTTP_OK, $this->headers);
    }
}
