@extends('layouts.app')

@section('content')
    <form action="{{ route('request.update', $request->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input class="form-control" name="name" value="{{ $request->name }}">
        </div>
        <div class="mb-3">
            <label>Phone Number</label>
            <input class="form-control" name="phone_number" value="{{ $request->phone_number }}">
        </div>
        <div class="mb-3">
            <label>Company Name</label>
            <input class="form-control" name="company" value="{{ $request->company }}">
        </div>
        <div class="mb-3">
            <label>Title</label>
            <input class="form-control" name="title" value="{{ $request->title }}">
        </div>
        <div class="mb-3">
            <label>Message</label>
            <input class="form-control" name="message" value="{{ $request->message }}">
        </div>
        <div class="mb-3">
            <label>File(pdf, image, archive)</label>
            <input class="form-control" type="file" name="file">
        </div>
        <input type="hidden" name="id" value="{{ $request->id }}">

        <button class="btn btn-outline-secondary">Save</button>
    </form>

@endsection
