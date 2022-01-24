<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Rank;
use App\Models\Category;
use App\Models\Relic;
use App\Models\Tag;

class RelicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relics = Relic::all();
        return view('admin.relics.index', compact('relics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ranks = Rank::all();
        $categories = Category::all();
        $provinces = Province::all();
        return view('admin.relics.add', compact('provinces', 'ranks', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try {
            DB::beginTransaction();
            if ($request['tag'] != null) {
                $arrval = explode(',', $request['tag']);
                $arrtag = array();
                foreach ($arrval as $key => $value) {
                    $check = Tag::where('name', trim($value))->first();
                    if (!$check) {
                        $maxid = DB::table('tags')->max('id') + 1;
                        $new = new Tag();
                        $new->id = $maxid;
                        $new->name = trim($value);
                        $new->save();
                        array_push($arrtag, $maxid);
                    } else {
                        array_push($arrtag, $check->id);
                    }
                }
            }

            $request['tag'] = $arrtag;

            $dataRelic = $request->only(['name', 'slug', 'address', 'category', 'rate', 'tag', 'featured_img', 'description', 'content', 'image', 'document']);
            $newRelic = new Relic($dataRelic);
            $newRelic->user_id = Auth::user()->id;
            $newRelic->save();
            DB::commit();
            return redirect()->route('relics.index');
        // } catch (\Throwable $th) {
        //     DB::rollback();
        //     return redirect()->back()->withInput();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ranks = Rank::all();
        $categories = Category::all();
        $provinces = Province::all();
        $relic = Relic::find($id);
        if (!$relic) {
            return redirect()->back()->withInput();
        }

        $tagdb = DB::table('tags')->whereIn('id', $relic->tag)->get();
        $tag = '';
        foreach ($tagdb as $key => $value) {
            if ($tag == '') {
                $tag = $value->name;
            } else {
                $tag = $tag. ', ' .$value->name;
            }
        }
        return view('admin.relics.edit', compact('provinces', 'ranks', 'categories', 'relic', 'tag'));
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
            if ($request['tag'] != null) {
                $arrval = explode(',', $request['tag']);
                $arrtag = array();
                foreach ($arrval as $key => $value) {
                    $check = Tag::where('name', trim($value))->first();
                    if (!$check) {
                        $maxid = DB::table('tags')->max('id') + 1;
                        $new = new Tag();
                        $new->id = $maxid;
                        $new->name = trim($value);
                        $new->save();
                        array_push($arrtag, $maxid);
                    } else {
                        array_push($arrtag, $check->id);
                    }
                }
            }
            $request['tag'] = $arrtag;

            $relic = Relic::find($id);
            $relic->update([
                'name' => $request['name'], 
                'slug' => $request['slug'], 
                'address' => $request['address'], 
                'category' => $request['category'], 
                'rate' => $request['rate'], 
                'tag' => $request['tag'], 
                'featured_img' => $request['featured_img'], 
                'description' => $request['description'], 
                'content' => $request['content'], 
                'image' => $request['image'], 
                'document' => $request['document'], 
            ]);
            DB::commit();

            return redirect()->route('relics.index');
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
        dd(1);
    }

    public function loaddistrict()
    {
        if (isset($_POST['val']) && $_POST['val'] != '') {
            $idpro = $_POST['val'];
            $districts = District::where('province_id', $idpro)->get();
            return $districts;
        }

        return 0;
    }

    public function loadward()
    {
        if (isset($_POST['val']) && $_POST['val'] != '') {
            $idpro = $_POST['val'];
            $wards = Ward::where('district_id', $idpro)->get();
            return $wards;
        }

        return 0;
    }
}
