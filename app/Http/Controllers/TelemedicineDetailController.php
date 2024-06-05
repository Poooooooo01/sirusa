<?php

namespace App\Http\Controllers;

use App\Models\Telemedicine;
use App\Models\Drug;
use App\Models\TelemedicineDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TelemedicineDetailController extends Controller
{
    public function index(Telemedicine $telemedicine)
    {
        // Fetch all telemedicine details related to the specified telemedicine
        $details = $telemedicine->details; // Eloquent relationship

        // Pass the data to the view
        return view('telemedicinedetail.index', ['details' => $details, 'telemedicine' => $telemedicine]);
    }

    public function create(Telemedicine $telemedicine)
    {
        // Fetch all drugs from the database
        $drugs = Drug::all();

        // Pass the telemedicine and drugs to the view
        return view('telemedicinedetail.form', compact('telemedicine', 'drugs'));
    }

    public function store(Telemedicine $telemedicine, Request $request)
    {
        // Validasi data dari request
        $request->validate([
            'detail_description' => 'required',
            'amount' => 'required|numeric',
            'drug_id' => 'required|exists:drugs,id',
        ]);

        // Buat dan simpan data baru ke dalam telemedicine_details
        $telemedicine->details()->create([
            'detail_description' => $request->detail_description,
            'amount' => $request->amount,
            'drug_id' => $request->drug_id,
        ]);

        // Redirect kembali ke halaman index telemedicine dengan pesan sukses
        return redirect()->route('telemedicine.details', $telemedicine->id)
                         ->with('successMessage', 'Telemedicine detail added successfully.');
    }

    public function destroy($id)
    {
        $detail = TelemedicineDetail::find($id);
        if ($detail) {
            $detail->delete();
            return redirect()->route('telemedicine.details', $detail->telemedicine_id)
                             ->with('successMessage', 'Detail deleted successfully.');
        } else {
            return redirect()->back()->with('errorMessage', 'Detail not found.');
        }
    }
}
