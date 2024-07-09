<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class SupportController extends Controller
{
    public function __construct( 
        protected SupportService $service
    ) {}

    public function index(Request $request)
    {
        $supports = $this->service->getAll($request->filter);

        return view('Admin/supports/index', compact('supports'));
    }
    public function show(string $id)
    {
        if(!$support = $this->service->findOne($id))
        {
            return back();
        }
        
        return view('Admin/supports/show', compact('support'));
    }

    public function create()
    {
        return view('Admin/supports/create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {
        $data = $request->validated();
        $data['status'] = 'a';

        $support = $support->create($data);
        
        return redirect()->route('supports.index');
    }

    public function edit(Support $support, string $id)
    {
        // if(!$support = $support->where('id', $id)->first())
        if(!$support = $this->service->findOne($id))
        {
            return back();
        }

            return view('Admin/supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support, string $id)
    {
        if(!$support = $support->find($id))
        {
            return back();
        }
            // alternative:
            // $support->subject = $request->subject;
            // $support->body = $request->body;
            // $support->save();

            $support->update($request->validated());
            return redirect()->route('supports.index');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);
        
        return redirect()->route('supports.index');
    }
    

}