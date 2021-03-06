@extends('layouts.global')
@section('title')Edit Order @endsection
@section('content')

    <div class="row">
        <div class="col-md-8">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif

            <form action="{{route('orders.update',['id'=>$order->id])}}" method="POST" class="shadow-sm bg-white p-3">
                @csrf
                @method('PUT')
                <label for="invoice_number">Invoice Number</label>
                <br>
                <input type="text" class="form-control" value="{{$order->invoice_number}}" disabled>
                <br>
                <label for="">Buyer</label>
                <br>
                <input disabled class="form-control" type="text" value="{{$order->user->name}}">
                <br>
                <label for="created_at">Order Date</label>
                <br>
                <input type="text" class="form-control" value="{{$order->created_at}}" disabled>
                <br>
                <label for="">Books ({{$order->totalQuantity}})</label>
                <br>
                <ul>
                    @foreach($order->books as $book)
                        <li>{{$book->title}} <b> ({{$book->pivot->quantity}})</b></li>
                    @endforeach
                </ul>
                <label for="">Total Price</label>
                <br>
                <select name="status" id="status" class="form-control">
                    <option {{$order->status == "SUBMIT" ? "selected":""}} value="SUBMIT">SUBMIT</option>
                    <option {{$order->status == "PROCESS" ? "selected":""}} value="PROCESS">PROCESS</option>
                    <option {{$order->status == "FINISH" ? "selected":""}} value="FINISH">FINISH</option>
                    <option {{$order->status == "CANCEL" ? "selected":""}} value="CANCEL">CANCEL</option>
                </select>
                <br>
                <input type="submit" class="btn btn-primary" value="Update">
            </form>
        </div>
    </div>
@endsection