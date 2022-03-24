<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class UsersImport implements ToModel, WithChunkReading, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    // Import Data
    public function model(array $row)
    {
        return new User([
            'name'     => $row[0],
           'email'    => $row[1], 
           'password' => Hash::make($row[2]),
        ]);
    }
    // Import Data


    // (chunk per 10 data insert),
    public function chunkSize(): int
    {
        return 10;
    }
    // (chunk per 10 data insert),

    // Minimum import
    public function batchSize(): int
    {
        return 2;
    }
    // Minimum import

}
