<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class usersExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    // Export User Information on Excel
    public function collection()
    {
        $usersData = User::select('first_name','last_name','email','address','state','city','gender','contact_number','created_at')->where('verified',1)->orderBy('id','desc')->get();
        return $usersData;
    }

    public function headings(): array{
        return['First Name','Last Name','Email Address','Address','State','City','Gender', 'Contact Number', 'Created at'];
    }

    
}
