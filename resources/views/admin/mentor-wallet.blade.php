@extends('admin.layouts.app')

@section('content')
    <div class = "admin-main-wrapper section-padding-top section-padding-bottom">

        <div class = "container wallet-container">
            <div class = "wallet-block">
                <h4 class = "text-primary">Total Earnings</h4>
                <h2>@currency($wallet->total_earnings)</h2>
            </div>
            <div class = "wallet-block">
                <h4 class = "text-primary">Available for Withdraw</h4>
                <h2>@currency($wallet->remaining_amount)</h2>
            </div>
            <div class = "wallet-block">
                <h4 class = "text-primary">Need to Withdraw?</h4>
                <a href = "#">Withdraw now</a>
            </div>
        </div>
        
        
    </div>
@endsection
