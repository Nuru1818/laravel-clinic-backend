<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    //index
    public function index(Request $request)
    {
        $doctors = DB::table('doctors')
        ->when($request->input('doctor_name'), function ($query, $name) {
            return $query->where('doctor_name', 'like', '%' . $name . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.doctors.index', compact('doctors'));
    }

    //create
    public function create()
    {
        return view('pages.doctors.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'doctor_name'  => 'required',
            'doctor_specialist' => 'required',
            'doctor_email' => 'required|email',
            'doctor_phone' => 'required',
            'sip' => 'required',
            'address' => 'required',
        ]);

        DB::table('doctors')->insert([
            'doctor_name' => $request->doctor_name,
            'doctor_specialist' => $request->doctor_specialist,
            'doctor_email' => $request->doctor_email,
            'doctor_phone' => $request->doctor_phone,
            'sip' => $request->sip,
            'address' => $request->address,
            'created_at' => now(),
        ]);

        return redirect()->route('doctors.index')->with('success','Doctor created successfully.');
    }

    //show
    public function show($id)
    {
        $doctor = DB::table('doctors')->where('id', $id)->first();
        return view('pages.doctors.show', compact('doctor'));
    }

     //edit
     public function edit($id)
     {
        //  $doctor = DB::table('doctors')->where('id', $id)->first();
        //  return view('pages.doctors.edit', compact('doctor'));
        $doctor = Doctor::find($id);
        return view('pages.doctors.edit', compact('doctor'));
     }

     //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_email' => 'required|email',
            'doctor_phone' => 'required',
            'sip' => 'required',
            'address' => 'required',
        ]);

        DB::table('doctors')->where('id', $id)->update([
            'doctor_name' => $request->doctor_name,
            'doctor_specialist' => $request->doctor_specialist,
            'doctor_email' => $request->doctor_email,
            'doctor_phone' => $request->doctor_phone,
            'sip' => $request->sip,
            'address' => $request->address,
            'updated_at' => now(),
        ]);

        return redirect()->route('doctors.index')->with('success','Doctor updated successfully.');
    }

    //destroy
    public function destroy($id)
    {
        DB::table('doctors')->where('id', $id)->delete();
        return redirect()->route('doctors.index')->with('success','Doctor deleted successfully.');
    }
}
