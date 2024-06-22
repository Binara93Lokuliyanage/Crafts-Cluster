@extends('admin.layouts.app')

@section('content')
    <div class="admin-main-wrapper section-padding-top section-padding-bottom">

        <div class="container wallet-container">
            <div class="wallet-block">
                <h4 class="text-primary">Total Spent</h4>
                <h2>@currency($wallet->total_spent)</h2>
            </div>
            <div class="wallet-block">
                <h4 class="text-primary">Remaining Balance</h4>
                <h2>@currency($wallet->remaining_amount)</h2>
            </div>
            <div class="wallet-block">
                <h4 class="text-primary">Low Balance?</h4>
                <a href="#" id="top-up-link">Top up now</a>
            </div>
        </div>
        
    </div>

    <!-- Popup Form for Top-up -->
    <div id="top-up-popup" class="popup">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <h3 class= "text-primary">Top Up Amount</h3>
            <form id="top-up-form" action="{{ route('wallet.topup') }}" method="POST" style="margin-top: 1.5rem">
                @csrf
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" required style="margin-top: 1rem">
                <button type="submit" class="btn-primary" required style="margin-top: 2rem">OK</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var popup = $('#top-up-popup');
            var closeBtn = $('.close-btn');
    
            $('#top-up-link').click(function(event) {
                event.preventDefault();
                popup.show();
            });
    
            closeBtn.click(function() {
                popup.hide();
            });
    
            $(window).click(function(event) {
                if (event.target == popup[0]) {
                    popup.hide();
                }
            });
        });
    </script>
@endsection

