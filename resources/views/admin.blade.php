@extends('master.app')
@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">Home <span class="mx-1">></span></a></li>
    <li><a> Admin </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Halaman Admin</h2>
@endsection
@section('konten')
    <div class="row column1">
        <div class="col-md-6 col-lg-6">
            <a href="{{ route('course.index') }}">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div>
                            <i class="fa-solid fa-book green_color fa-flip"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{ $course->count() }}</p>
                            <p class="head_couter">Course</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-6">
            <a href="{{ route('student.index') }}">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div>
                            <i class="fa fa-person blue1_color fa-bounce"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{ $student->count() }}</p>

                            <p class="head_couter">Student</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
