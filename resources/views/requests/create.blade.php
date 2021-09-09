@extends('layouts.app')

@section('content')
    <form action="{{ route('request.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label>Phone Number</label>
            <input class="form-control" name="phone_number">
        </div>
        <div class="mb-3">
            <label>Company Name</label>
            <input class="form-control" name="company">
        </div>
        <div class="mb-3">
            <label>Title</label>
            <input class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label>Message</label>
            <input class="form-control" name="message">
        </div>
        <div class="mb-3">
            <label>File (pdf, image, archive)</label>
            <input class="form-control" type="file" name="file">
        </div>

        <button class="btn btn-outline-secondary">Save</button>
    </form>

@endsection
