@extends('admin.layouts.app')

@section('content')
    <div class = "admin-main-wrapper section-padding-top section-padding-bottom">
        
        @if ($mentorStatus == 'active')
            <div class = "container">
            </div>
        @else
        <div class = "container">
            <div class = "activator-div">
                <h3>Your application is under review. Please comeback after few hours</h3>
            </div>
        </div>            
        @endif


    </div>
@endsection
