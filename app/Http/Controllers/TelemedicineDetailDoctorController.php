<?php

namespace App\Http\Controllers;

use App\Models\Telemedicine;
use App\Models\Drug;
use App\Models\TelemedicineDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TelemedicineDetailDoctorController extends Controller
{
    public function index(Telemedicine $telemedicine)
    {
        $details = $telemedicine->details; // Eloquent relationship
        return view('doctor.telemedicinedetail.index', ['details' => $details, 'telemedicine' => $telemedicine]);
    }

    public function create(Telemedicine $telemedicine)
    {
        $drugs = Drug::all();
        return view('doctor.telemedicinedetail.form', compact('telemedicine', 'drugs'));
    }

    public function store(Telemedicine $telemedicine, Request $request)
    {
        $request->validate([
            'detail_description' => 'required',
            'amount' => 'required|numeric',
            'drug_id' => 'required|exists:drugs,id',
            'price' => 'required|numeric',
        ]);

        $drug = Drug::find($request->drug_id);

        if ($drug->stock < $request->amount) {
            return redirect()->back()->with('errorMessage', 'Insufficient stock for the selected drug.');
        }

        DB::transaction(function () use ($request, $telemedicine, $drug) {
            $total = $request->amount * $request->price;

            $telemedicineDetail = $telemedicine->details()->create([
                'detail_description' => $request->detail_description,
                'amount' => $request->amount,
                'drug_id' => $request->drug_id,
                'price' => $request->price,
                'total' => $total,
            ]);

            $drug->stock -= $request->amount;
            $drug->save();
        });

        return redirect()->route('telemedicinedoctor.details', $telemedicine->id)
            ->with('successMessage', 'Telemedicine detail added successfully.');
    }


    public function destroy($id)
    {
        $detail = TelemedicineDetail::find($id);
        if ($detail) {
            $detail->delete();
            return redirect()->route('telemedicinedoctor.details', $detail->telemedicine_id)
                ->with('successMessage', 'Detail deleted successfully.');
        } else {
            return redirect()->back()->with('errorMessage', 'Detail not found.');
        }
    }
}
