<?php

namespace App\Imports;

use App\ProjectProperty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProjectPropertyStatusImport implements ToCollection, WithHeadingRow, ToModel
{
    public function model(array $row)
    {
        $project_id = $row['project_id'] ?? 1;
        $block_id = $row['block_id'] ?? $row['sector'];

        $chk_claus = ['project_id' => $project_id, 'block_id' => $block_id, 'plot' => $row['plot'], 'category' => $row['category'], 'type' => $row['type']];
        $chk = \App\ProjectProperty::where($chk_claus)->first(['id']);

        $_data = [
            /*'project_id' => $project_id,
            'block_id' => $row['block_id'] ?? $row['sector'],
            'type_id' => $row['type_id'] ?? ($row['type'] == 'R' ? 1 : 2),
            'type' => $row['type'],
            'plot' => $row['plot'],
            'street' => $row['street'],
            'category' => $row['category'],
            'title' => "{$row['area']} - {$row['plot']}",
            'area' => $row['area'],
            'area_unit' => $row['area_unit'] ?? 'Square Yards',
            'permitted_height' => $row['permitted_height'],
            'price' => str_replace([',', '-', ' '], '', $row['price']),
            'currency' => $row['currency'] ?? 'GBP',*/
            'status' => $row['status'] ?? 'Active',
        ];
        if($chk->id > 0){
            file_put_contents('update_plots.txt', "Update - " . join(", ", array_merge($chk_claus, $_data)) . "\n", FILE_APPEND);
            $chk->fill($_data);
            $chk->save();
            return $chk;
        } else {
            file_put_contents('update_plots.txt', "Insert - " . join(", ", array_merge($chk_claus, $_data)) . "\n", FILE_APPEND);
            /*$property = new ProjectProperty($_data);
            $property->save();*/
            //return $property;
            return true;
        }
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
