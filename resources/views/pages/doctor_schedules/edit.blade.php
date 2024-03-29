@extends('layouts.app')

@section('title', 'Edit Doctor')

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
                <h1>Edit Doctors Form</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Doctors</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Doctors</h2>



                <div class="card">
                    <form action="{{ route('doctors.update', $doctor) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                    class="form-control @error('doctor_name')
                                is-invalid
                            @enderror"
                                    name="doctor_name" value="{{ $doctor->doctor_name }}">
                                @error('doctor_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Specialist</label>
                                <input type="text"
                                    class="form-control @error('doctor_specialist')
                                is-invalid
                            @enderror"
                                    name="doctor_specialist" value="{{ $doctor->doctor_specialist }}">
                                @error('doctor_specialist')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                    class="form-control @error('doctor_email')
                                is-invalid
                            @enderror"
                                    name="doctor_email" value="{{ $doctor->doctor_email }}">
                                @error('doctor_email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="doctor_phone" value="{{ $doctor->doctor_phone }}">
                            </div>

                            <div class="form-group">
                                <label>SIP</label>
                                <input type="text" class="form-control" name="sip" value="{{ $doctor->sip }}">
                            </div>

                            <div class="form-group">
                                <label>IHS</label>
                                <input type="text" class="form-control" name="id_ihs" value="{{ $doctor->id_ihs }}">
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control" name="nik" value="{{ $doctor->nik }}">
                            </div>

                            <div class="form-group">
                                <label>Doctor Address</label>
                                <textarea class="form-control" name="address" data-height="150">{{ $doctor->address }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Update photo</label> <br>
                                @if($doctor->photo)
                                                    <img src="{{ asset(''.$doctor->photo) }}" alt=""
                                                    width="100px" class="img-thumbnail">
                                                    @else
                                                    <span class="badge badge-danger">No Image</span>
                                                    @endif
                                <input type="file" name="photo" id="" class="form-control mt-2">
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-success">Submit</button>
                            <a href="{{ route('doctors.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
