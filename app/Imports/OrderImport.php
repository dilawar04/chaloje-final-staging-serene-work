<?php

namespace App\Imports;

use App\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrderImport implements ToCollection, WithHeadingRow, ToModel
{
    public function model(array $row)
    {
        $_data = [
            'id' => $row['id'],
            'order_number' => $row['order_number'],
            'customer_id' => $row['customer_id'],
            'status' => $row['status'],
            'created' => $row['created'],
            'discount' => $row['discount'],
            'other_amount' => $row['other_amount'],
            'total_amount' => $row['total_amount'],
            'note' => $row['note'],
            'payment_method' => $row['payment_method'],
            'payment_status' => $row['payment_status'],
            'created_by' => $row['created_by'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
        ];

        return new Order($_data);
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
