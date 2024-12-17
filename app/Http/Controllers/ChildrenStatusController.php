<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaritalStatus;
use Redirect;
use Validator;

class ChildremStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:show_marital_status'])->only('index');
        $this->middleware(['permission:edit_marital_status'])->only('edit');
        $this->middleware(['permission:delete_marital_status'])->only('destroy');

        $this->rules = [
            'name'      => ['required','max:255'],
        ];

        $this->messages = [
            'name.required'    => translate('Name is required'),
            'name.max'         => translate('Max 255 characters'),
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $sort_search   = null;
      $children_statuses = ChildrenStatus::latest();

      if ($request->has('search')){
          $sort_search       = $request->search;
          $children_statuses  = $children_statuses->where('name', 'like', '%'.$sort_search.'%');
      }
      $children_statuses = $children_statuses->paginate(10);
      return view('admin.member_profile_attributes.children_statuses.index', compact('children_statuses','sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules      = $this->rules;
        $messages   = $this->messages;
        $validator  = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            flash(translate('Sorry! Something went wrong'))->error();
            return Redirect::back()->withErrors($validator);
        }

        $marital_status              = new ChildrenStatus;
        $marital_status->name        = $request->name;
        if($marital_status->save())
        {
            flash('New Marital Status has been added successfully')->success();
            return redirect()->route('marital-statuses.index');
        }
        else {
            flash('Sorry! Something went wrong.')->error();
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marital_status       = ChildrenStatus::findOrFail(decrypt($id));
        return view('admin.member_profile_attributes.children_statuses.edit', compact('children_status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules      = $this->rules;
        $messages   = $this->messages;
        $validator  = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            flash(translate('Sorry! Something went wrong'))->error();
            return Redirect::back()->withErrors($validator);
        }

        $children_status              = ChildrenStatus::findOrFail($id);
        $children_status->name        = $request->name;
        if($children_status->save())
        {
            flash('Children Status has been updated successfully')->success();
            return redirect()->route('children-statuses.index');
        }
        else {
            flash('Sorry! Something went wrong.')->error();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (ChildrenStatus::destroy($id)) {
            flash('Children Status info has been deleted successfully')->success();
            return redirect()->route('children-statuses.index');
        } else {
            flash('Sorry! Something went wrong.')->error();
            return back();
        }
    }
}
