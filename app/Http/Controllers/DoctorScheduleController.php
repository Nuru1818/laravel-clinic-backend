<?php

namespace App\Http\Controllers;

use App\Models\DoctorSchedule;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorScheduleController extends Controller
{
    //index
    public function index(Request $request)
    {
        $doctorSchedules = DoctorSchedule::with('doctor')
        ->when($request->input('doctor_id'), function ($query, $doctor_id) {
            return $query->where('doctor_id', $doctor_id);
        })
        ->orderBy('doctor_id', 'asc')
        ->paginate(10);
        return view('pages.doctor_schedules.index', compact('doctorSchedules'));
    }

    //create
    public function create()
    {
        $doctors = Doctor::all();
        return view('pages.doctor_schedules.create', compact('doctors'));
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
        ]);

        // if senin is not empety
        if($request->senin){
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day ='Senin';
            $doctorSchedule->time = $request->senin;
            $doctorSchedule->save();
        }

        // if selasa is not empety
        if($request->selasa){
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day ='Selasa';
            $doctorSchedule->time = $request->selasa;
            $doctorSchedule->save();
        }

        // if rabu is not empety
        if($request->rabu){
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day ='Rabu';
            $doctorSchedule->time = $request->rabu;
            $doctorSchedule->save();
        }

        // if kamis is not empety
        if($request->kamis){
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day ='Kamis';
            $doctorSchedule->time = $request->kamis;
            $doctorSchedule->save();
        }

        // if jumat is not empety
        if($request->jumat){
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day ='Jumat';
            $doctorSchedule->time = $request->jumat;
            $doctorSchedule->save();
        }

        // if sabtu is not empety
        if($request->sabtu){
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day ='Sabtu';
            $doctorSchedule->time = $request->sabtu;
            $doctorSchedule->save();
        }

        // if minggu is not empety
        if($request->minggu){
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day ='Minggu';
            $doctorSchedule->time = $request->minggu;
            $doctorSchedule->save();
        }

        return redirect()->route('doctor-schedules.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $doctorSchedules = DoctorSchedule::find($id);
        $doctors = Doctor::all();
        return view('pages.doctor_schedules.edit', compact('doctorSchedules', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required',
        ]);

        $doctorSchedule = DoctorSchedule::find($id);
        $doctorSchedule->doctor_id = $request->doctor_id;
        $doctorSchedule->day = $request->day;
        $doctorSchedule->time = $request->time;
        $doctorSchedule->status = $request->status;
        $doctorSchedule->note = $request->note;
        $doctorSchedule->save();

        return redirect()->route('doctor-schedules.index');
    }

    public function destroy($id)
    {
        $doctorSchedule = DoctorSchedule::find($id);
        $doctorSchedule->delete();
        return redirect()->route('doctor-schedules.index')->with('success','Doctor Schedules deleted successfully.');
    }
}
