@extends('admin.layouts.app')

@section('content')
    <div class = "admin-main-wrapper section-padding-top section-padding-bottom">

        <div class = "container wallet-container">
            <div class = "wallet-block">
                <h4 class = "text-primary">Total Spent</h4>
                <h2>@currency($wallet->total_spent)</h2>
            </div>
            <div class = "wallet-block">
                <h4 class = "text-primary">Remaining Balance</h4>
                <h2>@currency($wallet->remaining_amount)</h2>
            </div>
            <div class = "wallet-block">
                <h4 class = "text-primary">Low Balance?</h4>
                <a href = "#">Top up now</a>
            </div>
        </div>
        
        
    </div>
@endsection
