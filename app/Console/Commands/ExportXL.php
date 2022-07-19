<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
 use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Mail\ExportXL as MailExportXL;
use App\Models\User;
use App\Notifications\ExportXL as NotificationsExportXL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as L;
class ExportXL extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:xl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run export Excel ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       // $limit = Carbon::now()->subDay(7);->everyMinute();
        //$limit = Carbon::now()->everyMinute();
        Excel::store(new UsersExport(), 'users.xlsx' , 'public' , L::XLSX);
        Mail::to('mariemchouaiti@gmail.com')->send(new MailExportXL());
        return true;
    }
}
