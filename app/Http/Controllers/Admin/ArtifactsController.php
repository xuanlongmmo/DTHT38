<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Artifact;
use App\Models\Relic;

class ArtifactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artifacts = Artifact::all();
        return view('admin.artifacts.index', compact('artifacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relics = Relic::all();
        return view('admin.artifacts.add', compact('relics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $request['image'] = !empty($request['image']) ? explode(',', $request['image']): '';
            $request['document'] = !empty($request['document']) ? explode(',', $request['document']): '';

            $dataArtifact = $request->only(['name', 'slug', 'featured_img', 'description', 'image', 'document', 'relic_id']);
            $newArtifact = new Artifact($dataArtifact);
            $newArtifact->user_id = Auth::user()->id;
            $newArtifact->save();
            DB::commit();
            
            if (isset($request['next']) && !empty($request['relic_id'])) {
                return redirect()->route('characters.create', ['relic' => $request['relic_id'], 'next' => '1']);
            } else {
                return redirect()->route('artifacts.index');
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withInput();
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
        $artifact = Artifact::find($id);
        if (!$artifact) {
            return redirect()->route('artifacts.index');
        }
        $relics = Relic::all();
        return view('admin.artifacts.edit', compact('relics', 'artifact'));
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
        try {
            DB::beginTransaction();
            
            $artifact = Artifact::find($id);
            $artifact->update([
                'name' => $request['name'], 
                'slug' => $request['slug'], 
                'featured_img' => $request['featured_img'], 
                'relic_id' => $request['relic_id'], 
                'description' => $request['description'], 
                'image' => !empty($request['image']) ? explode(',', $request['image']): '', 
                'document' => !empty($request['document']) ? explode(',', $request['document']): '', 
            ]);
            DB::commit();

            return redirect()->route('artifacts.index');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withInput();
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
        $artifact = Artifact::find($id);
        if (!$artifact) {
            return redirect()->route('artifacts.index');
        }
        $artifact->delete();
        return redirect()->route('artifacts.index');
    }
}
