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
                '*.3' => 'required',
                '*.4' => 'required',
                '*.5' => 'required',
                '*.6' => 'required',
                '*.7' => 'required',
                '*.8' => 'required',
                
            ])->validate();

            $data = [
                'employee_id'     => $row[0],
                'Annual_Leave'    => $row[1],
                'Compensatory_Day'=> $row[2],
                'sick_leave' => $row[3],
                'unpaid_leave'=>$row[4],
                'school_leave'=>$row[5],
                'regime_leave'=>$row[6],
                'not_leave'=>$row[7],
                'leave'=>$row[8]

            ];
//            dd($data);
            $checkIfDayoffsExists = DayOff::create($data);
        }
    }
}
