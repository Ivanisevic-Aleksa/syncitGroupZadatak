@extends('layouts.app')

@section('title')
    <h2>Contacts</h2>
@endsection()

@section('content')
    @if(count($data) == 0)
    <div class="text-center mt-4">
        <h4>There is no contacts yet!</h4>
    </div>
    @else
    <table class="table">
        <thead class="thead-dark">
            <tr class="table-row ">
                <th scope="col-md-3">Firstname</th>
                <th scope="col-md-3">Lastname</th>
                <th scope="col-md-3">Number Type</th>
                <th scope="col-md-3">Number</th>
            </tr>
        </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{ $row['users']['firstname'] }}</td>
            <td>{{ $row['users']['lastname'] }}</td>
            <td>{{ $row['number_types']['type'] }}</td>
            <td>{{ $row['number'] }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    @endif
@endsection
