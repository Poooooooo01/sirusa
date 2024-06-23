<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TelemedicineDetail;

class TransactionController extends Controller
{
    public function index()
    {
        // Ambil semua data telemedicine details dengan relasi drug
        $telemedicineDetails = TelemedicineDetail::with('drug')->get();

        $totalExpense = 0;

        // Hitung total keuangan keluar berdasarkan amount * price
        foreach ($telemedicineDetails as $detail) {
            // Pastikan ada drug terkait
            if ($detail->drug) {
                $totalExpense += $detail->amount * $detail->drug->price;
            }
        }

        return view('admin.transaction.index', [
            'telemedicineDetails' => $telemedicineDetails,
            'totalExpense' => $totalExpense,
        ]);
    }
}
