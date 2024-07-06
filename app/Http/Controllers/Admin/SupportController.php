<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(support $support)
    {
        $supports = $support->all();

        return view('Admin/supports/index', compact('supports'));
    }

    public function create()
    {
        return view('Admin/supports/create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

}