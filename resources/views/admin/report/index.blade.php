@extends('layouts.sidebar')
@section('container')

@if(session()->has("errorMessage"))
    <div class="alert alert-danger">
        {{ session("errorMessage") }}
    </div>
@endif


<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="50px">No</th>
            <th>Name</th>
            <th>Email Sender</th>
            <th>Message</th>
            <th>Subject</th>
            <th width="100px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reports as $index => $report)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $report->name }}</td>
            <td>{{ $report->email }}</td>
            <td>{{ $report->subject }}</td>
            <td>{{ $report->message }}</td>
            <td>
                <div class="d-flex">
                    <form action="#" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
