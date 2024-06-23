<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrugReportController extends Controller
{
    public function index()
    {
        $usedReport = DB::table('telemedicine_details')
            ->join('drugs', 'telemedicine_details.drug_id', '=', 'drugs.id')
            ->select(
                'drugs.drug_name',
                'drugs.brand_id',
                'drugs.description',
                'drugs.category_id',
                DB::raw('SUM(telemedicine_details.amount) as total_amount')
            )
            ->groupBy('drugs.id', 'drugs.drug_name', 'drugs.brand_id', 'drugs.description', 'drugs.category_id')
            ->get();

        $addedReport = DB::table('drugs')
            ->select(
                'drug_name',
                DB::raw('SUM(stock) as total_stock')
            )
            ->groupBy('drug_name')
            ->get();

        return view('admin.drugreport.index', [
            'usedReport' => $usedReport,
            'addedReport' => $addedReport,
        ]);
    }
}
