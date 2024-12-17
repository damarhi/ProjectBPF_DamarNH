@extends('layouts.app_tiny')
@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                                <i class="fe fe-16 fe-activity text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col">
                            <p class="small text-muted mb-0">Jumlah Bookingan</p>
                            <span class="h4 mb-0">Ditunggu : {{ $booking->where('status', 'Tunggu')->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                                <i class="fe fe-16 fe-activity text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col">
                            <p class="small text-muted mb-0">Jumlah Bookingan</p>
                            <span class="h4 mb-0">Disetuji : {{ $booking->where('status', 'Disetuji')->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                                <i class="fe fe-16 fe-activity text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col">
                            <p class="small text-muted mb-0">Jumlah Bookingan</p>
                            <span class="h4 mb-0">Ditolak : {{ $booking->where('status', 'Ditolak')->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                                <i class="fe fe-16 fe-activity text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col">
                            <p class="small text-muted mb-0">Jumlah Bookingan</p>
                            <span class="h4 mb-0">Selesai : {{ $booking->where('status', 'Selesai')->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
