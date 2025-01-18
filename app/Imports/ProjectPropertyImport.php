<?php

namespace App\Imports;

use App\ProjectProperty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProjectPropertyImport implements ToCollection, WithHeadingRow, ToModel
{
    public function model(array $row)
    {
        $project_id = $row['project_id'] ?? 1;
        $block_id = $row['block_id'] ?? $row['sector'];

        $chk_claus = ['project_id' => $project_id, 'block_id' => $block_id, 'plot' => $row['plot'], 'category' => $row['category'], 'type' => $row['type']];
        $chk = \App\ProjectProperty::where($chk_claus)->first(['id']);

        $_data = [
            'project_id' => $project_id,
            'block_id' => $row['block_id'] ?? $row['sector'],
            'type_id' => $row['type_id'] ?? ($row['type'] == 'R' ? 1 : 2),
            'type' => $row['type'],
            'plot' => $row['plot'],
            'street' => $row['street'],
            'category' => $row['category'],
            //'title' => $row['title'],
            'title' => "{$row['area']} - {$row['plot']}",
            'area' => $row['area'],
            'area_unit' => $row['area_unit'] ?? 'Square Yards',
            'permitted_height' => $row['permitted_height'],
            //'square_meter' => $row['square_meter'],
            'price' => str_replace([',', '-', ' '], '', $row['price']),
            'currency' => $row['currency'] ?? 'GBP',
            //'bedrooms' => $row['bedrooms'],
            //'bathrooms' => $row['bathrooms'],
            //'floor_plans' => $row['floor_plans'],
            //'payment_plan' => $row['payment_plan'],
            'status' => $row['status'] ?? 'Active',
        ];
        if($chk->id > 0){
            file_put_contents('plots.txt', "Update - " . join(", ", $chk_claus) . "\n", FILE_APPEND);
            $property = $chk->fill($_data);
        } else {
            file_put_contents('plots.txt', "Insert - " . join(", ", $chk_claus) . "\n", FILE_APPEND);
            $property = new ProjectProperty($_data);
        }
        $property->save();

        \DB::table('property_features')->where(['property_id' => $property->id])->delete();
        $features = \App\Feature::all();
        foreach ($features as $feature) {
            $pro_feature = \Str::slug($feature->feature, '_');
            $feature_amount = floatval(trim(str_replace([',', '-', ' '], '', $row[$pro_feature])));
            if($feature_amount > 0) {
                $features_data = [
                    'property_id' => $property->id,
                    'feature_id' => $feature->id,
                    'amount' => $feature_amount,
                    'type' => 'Fixed',
                ];
                \DB::table('property_features')->insert($features_data);
            }
        }

        return $property;
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
