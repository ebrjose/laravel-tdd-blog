<?php

namespace App\Http\Controllers;

use App\Models\Status;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class StatusesController extends Controller
{

    public function index()
    {
        return Status::latest()->paginate();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|min:5'
        ]);

        $status = Status::create([
            'user_id' => auth()->id(),
            'body' => $request->get('body')
        ]);

        return response()->json(['body' => $status->body]);
    }


    public function show(Status $status)
    {
        //
    }


    public function edit(Status $status)
    {
        //
    }


    public function update(Request $request, Status $status)
    {
        //
    }


    public function destroy(Status $status)
    {
        //
    }
}
