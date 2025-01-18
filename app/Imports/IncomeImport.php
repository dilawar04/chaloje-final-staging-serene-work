<?php

namespace App\Imports;

use App\Income;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class IncomeImport implements ToCollection, WithHeadingRow, ToModel
{
    public function model(array $row)
    {
        $_data = [
                    'id' => $row['id'],
                        'user_id' => $row['user_id'],
                        'rel_id' => $row['rel_id'],
                        'title' => $row['title'],
                        'income_head' => $row['income_head'],
                        'date' => $row['date'],
                        'amount' => $row['amount'],
                        'created_at' => $row['created_at'],
                        'created_by' => $row['created_by'],
                        'status' => $row['status'],
                        'note' => $row['note'],
                    ];

        return new Income($_data);
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $c => $row) {
            if($c > ($this->headingRow() - 1)) {
                return $this->model($row->toArray());
            }
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}