<?php

namespace App;

use App\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    public function collection()
    {
        return User::whereDate('created_at', Carbon::today())->get();
    }
}
