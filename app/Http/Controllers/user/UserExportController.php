<?php

namespace App\Http\Controllers\User;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
 class UserExportController extends Controller
{

        public function export()
        {

           // return (new InvoicesExport)->store('invoices.xlsx', 's3');
          //  return Excel::store(new UsersExport, 'users.xlsx' , 'excel');
          return Excel::store(new UsersExport(), 'users.xlsx');
        }

}
