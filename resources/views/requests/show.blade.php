@extends('layouts.app')

@section('content')
        <div class="mb-3">
            <label>Name</label>
            <p>{{ $model->name }}</p>
        </div>
        <div class="mb-3">
            <label>Phone Number</label>
            <p>{{ $model->phone_number }}</p>
        </div>
        <div class="mb-3">
            <label>Company Name</label>
            <p>{{ $model->company }}</p>
        </div>
        <div class="mb-3">
            <label>Title</label>
            <p>{{ $model->title }}</p>
        </div>
        <div class="mb-3">
            <label>Message</label>
            <p>{{ $model->message }}</p>
        </div>
@endsection

