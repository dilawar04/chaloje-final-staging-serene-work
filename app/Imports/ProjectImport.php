<?php

namespace App\Imports;

use App\Project;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProjectImport implements ToCollection, WithHeadingRow, ToModel
{
    public function model(array $row)
    {
        $_data = [
                    'id' => $row['id'],
                        'title' => $row['title'],
                        'logo' => $row['logo'],
                        'country' => $row['country'],
                        'city_id' => $row['city_id'],
                        'area_id' => $row['area_id'],
                        'short_description' => $row['short_description'],
                        'description' => $row['description'],
                        'price_from' => $row['price_from'],
                        'price_to' => $row['price_to'],
                        'developer_id' => $row['developer_id'],
                        'created' => $row['created'],
                        'created_by' => $row['created_by'],
                        'status' => $row['status'],
                        'floor_plans' => $row['floor_plans'],
                        'payment_plans' => $row['payment_plans'],
                        'project_map' => $row['project_map'],
                        'videos' => $row['videos'],
                    ];

        return new Project($_data);
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