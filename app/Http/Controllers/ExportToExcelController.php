<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\KartuMonitoringExport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportToExcelController extends Controller
{
    public function exportKartuMonitoringToExcel()
    {
        return Excel::download(new KartuMonitoringExport(), 'kartu_monitoring.xlsx');
    }

    public function exportUsersToExcel()
    {
        return Excel::download(new UsersExport(), 'users.xlsx');
    }
}
