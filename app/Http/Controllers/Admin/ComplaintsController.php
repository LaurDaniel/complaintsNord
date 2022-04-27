<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyComplaintRequest;
use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use App\Models\Complaint;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;

class ComplaintsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('complaint_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complaints = Complaint::all();

        return view('admin.complaints.index', compact('complaints'));
    }

    public function create()
    {
        abort_if(Gate::denies('complaint_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.complaints.create');
    }

    public function store(StoreComplaintRequest $request)
    {
       $fileName = '';
        if($request->hasFile('fisier')) {
            // Upload path
            
            // Get file extension
            $extension = $request->file('fisier')->getClientOriginalExtension();
            // Valid extensions
      
              // Rename file 
              $fileName = $request->file('fisier')->getClientOriginalName();
              // Uploading file to given path
              Storage::disk('public')->put($fileName, 'Contents');
            }
            // dd($request->all());
        $complaint = Complaint::create(['numar_intrare'=>$request->input('numar_intrare'),
        'data_intrare'=>$request->input('data_intrare'),
        'modul_preluare'=>$request->input('modul_preluare'),
        'localitate'=>$request->input('localitate'),
        'reclamant'=>$request->input('reclamant'),
        'tip_client'=>$request->input('tip_client'),
        'tip_document'=>$request->input('tip_document'),
        'continut'=>$request->input('continut'),
        'concluzia_analizarii'=>$request->input('concluzia_analizarii'),
        'masuri'=>$request->input('masuri'),
        'termen'=>$request->input('termen'),
        'date_contact'=>$request->input('date_contact'),
        'responsabil'=>$request->input('responsabil'),
        'raspuns'=>$request->input('raspuns'),
        'fisier'=>$fileName,
    ]);

        return redirect()->route('admin.complaints.index');
    }

    public function edit(Complaint $complaint)
    {
        abort_if(Gate::denies('complaint_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.complaints.edit', compact('complaint'));
    }

    public function update(UpdateComplaintRequest $request, Complaint $complaint)
    {
        $complaint->update($request->all());

        return redirect()->route('admin.complaints.index');
    }

    public function show(Complaint $complaint)
    {
        abort_if(Gate::denies('complaint_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.complaints.show', compact('complaint'));
    }

    public function destroy(Complaint $complaint)
    {
        abort_if(Gate::denies('complaint_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complaint->delete();

        return back();
    }

    public function massDestroy(MassDestroyComplaintRequest $request)
    {
        Complaint::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
