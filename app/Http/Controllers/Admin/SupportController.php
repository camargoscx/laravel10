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
    public function show(string|int $id)
    {
        if(!$support = Support::find($id))
        {
            return back();
        }
        
        return view('Admin/supports/show', compact('support'));
    }

    public function create()
    {
        return view('Admin/supports/create');
    }

    public function store(Request $request, Support $support)
    {
        $data = $request->all();
        $data['status'] = 'a';

        $support = $support->create($data);
        
        return redirect()->route('supports.index');
    }

}