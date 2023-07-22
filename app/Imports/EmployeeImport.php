<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class EmployeeImport implements ToCollection,WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Validator::make($rows->toArray(), [
                '*.0' => 'required',
                '*.1' => 'required',
                '*.2' => 'required',
                '*.3' => 'required',
                '*.4' => 'required',
                '*.5' => 'required',
                '*.6' => 'required',
                '*.7' => 'required',
                '*.8' => 'required',
            ])->validate();

            $data = [
                'group_id'    => $row[0],
                'name'        => $row[1],
                'address'     => $row[2],
                'email'       => $row[3],
                'phone'       => $row[4],
                'gender'      => $row[5],
                'position_id' => $row[6],
                'birthday'    => date('Y-m-d', strtotime($row[7])), 
                'start_date'  => date('Y-m-d', strtotime($row[8])),
            ];
//            dd($data);
            $checkIfEmployeesExists = Employee::create($data);
        }
    }
}
