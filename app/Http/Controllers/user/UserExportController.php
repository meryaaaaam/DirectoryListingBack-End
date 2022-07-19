<?php

namespace App\Http\Controllers\User;

use App\Console\Commands\ExportXL;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Mail\ExportXL as MailExportXL;
use App\Models\User;
use App\Notifications\ExportXL as NotificationsExportXL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as L;

 class UserExportController extends Controller
{

        public function export()
        {
         // return Excel::download(new UsersExport, 'users.xlsx');
         // return Excel::store(new UsersExport(), 'users.xlsx' , 'public');
           Excel::store(new UsersExport(), 'users.xlsx' , 'public' , L::XLSX);
           Mail::to('mariemchouaiti@gmail.com')->send(new MailExportXL());

        }

}
