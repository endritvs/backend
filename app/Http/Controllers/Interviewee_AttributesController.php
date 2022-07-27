<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interviewee_Attributes;
use App\Models\interviewee_types;


class Interviewee_AttributesController extends Controller
{
    public function index()
    {
        $intervieweesA = Interviewee_Attributes::orderBy('id', 'asc')->paginate(5);
        $intervieweesT = interviewee_types::orderBy('id', 'desc')->get();
        return view('intervieweeAttributesComponents/table')->with(['intervieweesA' => $intervieweesA, 'intervieweesT' => $intervieweesT]);
    }

    public function create()

    {
        return view('intervieweeAttributesComponents/create');
    }

    public function store(Request $request)
    {
        Interviewee_Attributes::create([
            'name' => $request['name'],
            'intervieweeTypes_id' => $request['intervieweeTypes_id']
        ]);
        return  redirect()->route('intervieweeAttributes.index');
    }
    public function show($id)
    {

        $interviewee = Interviewee_Attributes::find($id);
        return view('admin.userposts.show', compact('interviewee'));
    }
    public function edit($id)
    {
        $interviewee = Interviewee_Attributes::findOrFail($id);

        return view('intervieweeAttributesComponents/edit')->with(['interviewee' => $interviewee]);
    }
    public function update(Request $request, $id)
    {
        $interviewee = Interviewee_Attributes::findOrFail($id);

        $interviewee->name = $request->name;
        $interviewee->intervieweeTypes_id = $request->intervieweeTypes_id;
        $interviewee->save();

        return redirect('interviewee');
    }
    public function destroy($id)
    {
        $interviewee = Interviewee_Attributes::findOrFail($id);

        $interviewee->delete();
        return  back();
    }
}