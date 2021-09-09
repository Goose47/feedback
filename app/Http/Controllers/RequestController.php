<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestStoreRequest;
use App\Http\Requests\RequestUpdateRequest;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RequestController extends Controller
{
    public function index()
    {
        $requests = Auth::user()->requests;

        return view('home', compact('requests'));
    }

    public function show($id)
    {
        $model = Request::findOrFail($id);

        return view('requests.show', compact('model'));
    }

    public function create()
    {
        return view('requests.create');
    }

    public function store(RequestStoreRequest $request)
    {
        $link = $this->upload($request->file('file'));

        Request::create($request->except('file') + [
                'file' => $link,
                'user_id' => $request->user()->id
            ]);

        return redirect(route('home'));
    }

    public function edit(Request $request)
    {
        return view('requests.edit', compact('request'));
    }

    public function update(RequestUpdateRequest $request)
    {
        $data = $request->except('file');

        $model = Request::findOrFail($request->input('id'));

        $link = $model->link;

        if($request->has('file')){
            Storage::delete($model->file);

            $link = $this->upload($request->file('file'));
        }
        $data = array_merge($data, ['file' => $link]);

        $model->update($data);

        return redirect(route('home'));
    }

    public function destroy($id)
    {
        $model = Request::findOrFail($id);

        Storage::delete($model->file);

        Request::destroy($id);

        return redirect(route('home'));
    }

    public function upload($file)
    {
        $name = Str::random(10);

        return Storage::putFileAs('public/uploads', $file, $name . '.' . $file->extension());
    }
}
