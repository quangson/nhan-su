<?php

namespace App\Imports;

use App\Models\DayOff;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class DayOffImport implements ToCollection,WithStartRow
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
                
            ])->validate();

            $data = [
                'employee_id'     => $row[0],
                'Annual_Leave'    => $row[1],
                'Compensatory_Day'=> $row[2],
                
            ];
//            dd($data);
            $checkIfDayoffsExists = DayOff::create($data);
        }
    }
}
