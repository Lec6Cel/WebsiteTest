@php
$title="Chi Tiết Đơn Hàng";
@endphp

@extends('layouts.master-admin')

@section('content')
<div class="row">
    <div class="col-md-4">
        <table class="table table-bordered">
            <tr>
                <th>Fullname</th>   
                <td>{{ $OrderItem->fullname }}</td>   
            </tr>
            <tr>
                <th>Email</th>   
                <td>{{ $OrderItem->email }}</td>   
            </tr>
            <tr>
                <th>Phone Number</th>   
                <td>{{ $OrderItem->phone_number }}</td>   
            </tr>
            <tr>
                <th>Address</th>   
                <td>{{ $OrderItem->address }}</td>   
            </tr>
            <tr>
                <th>Note</th>   
                <td>{{ $OrderItem->note }}</td>   
            </tr>
        </table>
        <p>
            <a href="{{ route('order.index') }}">Back to List</a>
        </p>
    </div>
    <div class="col-md-8">
        <table class="table mb-0 table-bordered table-hover align-middle text-nowrap">
            <thead>
                <tr>
                    <th class="border-top-0">No</th>
                    <th class="border-top-0">Title</th>
                    <th class="border-top-0">Thumbnail</th>
                    <th class="border-top-0">Price</th>
                    <th class="border-top-0">Num</th>
                    <th class="border-top-0">Total Price</th>
                </tr>
            </thead>
            <tbody>
               
                    @foreach($itemList as $item)
                     <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $item-> title }}</td>
                        <td><img src="{{ $item-> thumbnail }}" style="width: 180px;"> </td>
                        <td>{{ number_format($item-> price,0) }}</td>
                        <td>{{ number_format($item-> num,0) }}</td>
                        <td>{{ number_format($item-> price * $item-> num,0) }}</td>
                        
                    </tr>
                    @endforeach      
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total Money</td>
                        <td>{{ number_format($OrderItem->total_money) }}</td>
                    </tr>      
            </tbody>
        </table>
    </div>
</div>

@endsection

