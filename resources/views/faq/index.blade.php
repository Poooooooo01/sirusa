@extends('layouts.sidebar')
@section('container')
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger">
            {{ session('errorMessage') }}
        </div>
    @endif
    @if (session()->has('successMessage'))
        <div class="alert alert-success">
            {{ session('successMessage') }}
        </div>
    @endif

    <a href="{{ route('faq.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus" aria-hidden="true"></i>Add</a>

    <table id="datatable1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="50px">Id</th>
                <th>Question</th>
                <th>Answer</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faqs as $index => $faq)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $faq->question }}</td>
                    <td>{{ $faq->answer }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('configuration.show', $faq->id) }}" class="btn btn-sm btn-info mr-2">Show</a>
                            <a href="{{ route('configuration.edit', $faq->id) }}"
                                class="btn btn-sm btn-warning mr-2">Edit</a>

                            <form action="{{ route('faq.destroy', $faq->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Anda yakin mau menghapus data ini {{ $faq->id }}?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
