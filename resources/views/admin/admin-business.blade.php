@extends('admin.layouts.app')

@section('content')
<div class="admin-main-wrapper section-padding-top section-padding-bottom">
    <div class="container">
        <div class="admin-title-container">
            <h3 class="text-primary">Business Overview</h3>
        </div>

        <div class="table-container" style="margin-top: 1.5rem;">
            <h4 class="text-primary">Orders for {{ \Carbon\Carbon::now()->format('F Y') }}</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Amount</th>
                        <th>Company Income</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>@currency($order->order_amount)</td>
                            <td>@currency($order->company_earning)</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No orders found for the current month.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="income-container" style="margin-top: 2rem;">
            <div class="container wallet-container">
                <div class="wallet-block">
                    <h4 class="text-primary">Income for This Month</h4>
                    <h2 style = "font-size: 2em; margin-top: 2rem;">@currency($lastMonthIncome)</h2>
                </div>
                <div class="wallet-block">
                    <h4 class="text-primary">Income for Last Month</h4>
                    <h2 style = "font-size: 2em; margin-top: 2rem;">@currency($lastMonthIncomereal)</h2>
                </div>
                <div class="wallet-block">
                    <h4 class="text-primary">Overall Income</h4>
                    <h2 style = "font-size: 2em; margin-top: 2rem;">@currency($totalIncome)</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
