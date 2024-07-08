<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

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

    public function edit(Support $support, string|int $id)
    {
        if(!$support = $support->where('id', $id)->first())
        {
            return back();
        }

            return view('Admin/supports.edit', compact('support'));
    }

    public function update(Request $request, Support $support, string $id)
    {
        if(!$support = $support->find($id))
        {
            return back();
        }
            // alternative:
            // $support->subject = $request->subject;
            // $support->body = $request->body;
            // $support->save();

            $support->update($request->only([
                'subject',
                'body'
            ]));
            return redirect()->route('supports.index');
    }
    

}