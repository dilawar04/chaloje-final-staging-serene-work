<?php

namespace App\Imports;

use App\ProjectBlock;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProjectBlockImport implements ToCollection, WithHeadingRow, ToModel
{
    public function model(array $row)
    {
        $_data = [
                    'id' => $row['id'],
                        'project_id' => $row['project_id'],
                        'title' => $row['title'],
                        'area' => $row['area'],
                        'area_unit' => $row['area_unit'],
                        'square_meter' => $row['square_meter'],
                        'floor_plans' => $row['floor_plans'],
                        'payment_plan' => $row['payment_plan'],
                        'status' => $row['status'],
                    ];

        return new ProjectBlock($_data);
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