@extends('layouts.doctor')

@section('container')
<div class="container">
    <h1>Telemedicine for Consultation #{{ $consultation->id }}</h1>

    @if (session('successMessage'))
        <div class="alert alert-success">
            {{ session('successMessage') }}
        </div>
    @endif

    <a href="{{ route('telemedicine.create', $consultation->id) }}" class="btn btn-primary">Add Telemedicine</a>

    @if($telemedicines->isEmpty())
        <div class="alert alert-info">
            No telemedicine sessions yet.
        </div>
    @else
        <table id="datatable1" class="table table-striped">
            <thead>
                <tr>
                    <th>Service Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($telemedicines as $telemedicine)
                    <tr>
                        <td>{{ $telemedicine->service_name }}</td>
                        <td>{{ $telemedicine->description }}</td>
                        <td>
                            <a href="{{ route('telemedicine.edit', $telemedicine->id) }}" class="btn btn-secondary">Edit</a>
                            <a href="{{ route('telemedicinedoctor.details', $telemedicine->id) }}" class="btn btn-secondary">Detail</a>
                            <form action="{{ route('telemedicine.destroy', $telemedicine->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
