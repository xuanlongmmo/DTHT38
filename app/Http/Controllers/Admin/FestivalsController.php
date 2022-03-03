<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Festival;
use App\Models\Relic;

class FestivalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $festivals = Festival::all();
        return view('admin.festivals.index', compact('festivals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relics = Relic::all();
        return view('admin.festivals.add', compact('relics'));
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

            $dataFestival = $request->only(['name', 'slug', 'featured_img', 'description', 'image', 'document', 'relic_id', 'date']);
            $newFestival = new Festival($dataFestival);
            $newFestival->user_id = Auth::user()->id;
            // $newFestival->save();
            // DB::commit();
            return redirect()->route('relics.index');
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
        $festival = Festival::find($id);
        if (!$festival) {
            return redirect()->route('festivals.index');
        }
        $relics = Relic::all();
        return view('admin.festivals.edit', compact('relics', 'festival'));
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
            
            $festival = Festival::find($id);
            $festival->update([
                'name' => $request['name'], 
                'slug' => $request['slug'], 
                'featured_img' => $request['featured_img'], 
                'date' => $request['date'], 
                'relic_id' => $request['relic_id'], 
                'description' => $request['description'], 
                'image' => !empty($request['image']) ? explode(',', $request['image']): '', 
                'document' => !empty($request['document']) ? explode(',', $request['document']): '', 
            ]);
            DB::commit();

            return redirect()->route('festivals.index');
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
        $festival = Festival::find($id);
        if (!$festival) {
            return redirect()->route('festivals.index');
        }
        $festival->delete();
        return redirect()->route('festivals.index');
    }
}
