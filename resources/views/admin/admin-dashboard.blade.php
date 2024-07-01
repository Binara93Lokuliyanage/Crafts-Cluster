@extends('admin.layouts.app')

@section('content')
<div class="admin-main-wrapper section-padding-top section-padding-bottom">
    <div class="container">
        <div class="container wallet-container">
            <div class="wallet-block">
                <h4 class="text-primary">New Mentor Request</h4>
                <h2 style = "font-size: 2em; margin-top: 2rem;">{{ $inactiveMentorRequests }}</h2>
            </div>
            <div class="wallet-block">
                <h4 class="text-primary">Income (Past 07 Days)</h4>
                <h2 style = "font-size: 2em; margin-top: 2rem;">CA${{ number_format($incomeLastSevenDays, 2) }}</h2>
            </div>
            <div class="wallet-block">
                <h4 class="text-primary">Your Business</h4>
                <a href="/admin/business" style = "font-size: 2em; ">Check Orders</a>
            </div>
        </div>
    </div>
</div>
@endsection
