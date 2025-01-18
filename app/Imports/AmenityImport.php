<?php

namespace App\Imports;

use App\Amenity;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AmenityImport implements ToCollection, WithHeadingRow, ToModel
{
    public function model(array $row)
    {
        $_data = [
                    'id' => $row['id'],
                        'title' => $row['title'],
                        'code' => $row['code'],
                        'icon' => $row['icon'],
                        'status' => $row['status'],
                        'ordering' => $row['ordering'],
                        'group_id' => $row['group_id'],
                        'input' => $row['input'],
                        'for' => $row['for'],
                    ];

        return new Amenity($_data);
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