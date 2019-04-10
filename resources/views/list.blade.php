@extends('master.master')
@section('title','Donation | List')
@section('content')

    <div class="container">
    <table class="table table-hover" align="center">
        <thead>
        <tr>
            <th scope="col">S.No.</th>
            <th scope="col">Name</th>
            <th scope="col">Contact</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col">Zip Code</th>
            <th scope="col">Amount/Month</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $data as $index => $info)

            <tr class="table-warning">
                <th scope="row">{{ $index+1 }}</th>
                <td>{{$info->name}}</td>
                <td>{{$info->contact}}</td>
                <td>{{$info->city}}</td>
                <td>{{$info->state}}</td>
                <td>{{$info->zip}}</td>
                <td>{{$info->amount}}</td>
                <td>{{$info->date}}</td>
                <td>
                    <a target="_blank" href="{{url('print').'/'.$info->id}}" class="btn btn-warning"
                       title="For future reference">Print Receipt</a>
                </td>
            </tr>
        @endforeach
        {{ $data->links() }}
        </tbody>
    </table>
    {{ $data->links() }}
    </div>

@stop