@extends('layouts.app')

@section('title', 'Edit Doctor Schedules')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Doctor Schedules Form</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Doctor Schedules</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Doctor Schedules</h2>

                <div class="card">
                    <form action="{{ route('doctor-schedules.update', $doctorSchedules) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Doctor</label>
                                <div class="form-group">
                                    <select class="form-control selectric @error('doctor_id') is-invalid @enderror" name="doctor_id" id="">
                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->id }}" @selected(old('doctor_id') == $doctor->id)>
                                                {{ $doctor->doctor_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jadwal Senin</label>
                                <input type="text"
                                    class="form-control" name="senin" value="{{ $doctorSchedules->time }}">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Selasa</label>
                                <input type="text"
                                    class="form-control" name="selasa" value="{{ $doctorSchedules->time }}">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Rabu</label>
                                <input type="text"
                                    class="form-control" name="rabu" value="{{ $doctorSchedules->time }}">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Kamis</label>
                                <input type="text"
                                    class="form-control" name="kamis" value="{{ $doctorSchedules->time }}">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Jumat</label>
                                <input type="text"
                                    class="form-control" name="jumat" value="{{ $doctorSchedules->time }}">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Sabtu</label>
                                <input type="text"
                                    class="form-control" name="sabtu" value="{{ $doctorSchedules->time }}">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Minggu</label>
                                <input type="text"
                                    class="form-control" name="minggu" value="{{ $doctorSchedules->time }}">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-warning">Update</button>
                            <a href="{{ route('doctor-schedules.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
