<?php

namespace App\Imports;

use App\Currency;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CurrencyImport implements ToCollection, WithHeadingRow, ToModel
{
    public function model(array $row)
    {
        $_data = [
            'id' => $row['id'],
            'currency' => $row['currency'],
            'short_name' => $row['short_name'],
            'symbol' => $row['symbol'],
            'status' => $row['status'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
        ];

        return new Currency($_data);
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $c => $row) {
            if ($c > ($this->headingRow() - 1)) {
                return $this->model($row->toArray());
            }
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}