@extends('admin.layouts.app')

@section('content')

<div class = "admin-main-wrapper section-padding-top section-padding-bottom" >
    <!DOCTYPE html>

    <div class="container mt-5">
        <h3 class = "text-primary">My Orders</h3>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Amount</th>
                        <th>Withdrawable Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->order_amount }}</td>
                            <td>{{ $order->mentor_payment }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


