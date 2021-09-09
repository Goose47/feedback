@extends('layouts.app')

@section('content')
    <main class="">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><a class="text-dark" href="{{ route('request.create') }}">Add a request</a></h1>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
        </div>

        <h2>Your requests</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Company</th>
                    <th scope="col">Title</th>
                    <th scope="col">Message</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $request->name }}</td>
                        <td>{{ $request->phone_number }}</td>
                        <td>{{ $request->company }}</td>
                        <td>{{ $request->title }}</td>
                        <td>{{ substr($request->message, 0, 20) . '...' }}</td>
                        <td>
                            <div class="btn-group mr-2">
                                <a href="{{ route('request.edit', $request->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                <a href="{{ route('request.show', $request->id) }}" class="btn btn-sm btn-outline-secondary">Show</a>
                                <form action="{{ route('request.destroy', $request->id ) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
