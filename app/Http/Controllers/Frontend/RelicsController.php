<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use DateTime;

use App\Models\Category;
use App\Models\Relic;
use App\Models\Tag;
use App\Models\Rank;
use App\Models\Festival;

class RelicsController extends Controller
{
    public function index()
    {
        $relics = Relic::where('status', 1)->get();
        $categories = Category::all();
        $ranks = Rank::all();
        $festivals = Festival::orderby('date', 'DESC')->limit(3)->get();
        return view('frontend.relics.index', compact('relics', 'categories', 'ranks', 'festivals'));
    }

    public function detail($slug)
    {
        $festivals = Festival::orderby('date', 'DESC')->limit(3)->get();
        foreach ($festivals as $festival) {
            $currentdate = new DateTime();
            $startdate = new DateTime($festival->date);
            echo $time = ceil(($currentdate->getTimestamp() - $startdate->getTimestamp()) / (24*60*60*1000));       
        }
        return 1;
        $festivals = Festival::select(['*', DB::raw("'{$time}' as datehi")])->limit(3)->get();
        return $festivals;
        $relic = Relic::where('slug', $slug)->where('status', 1)->first();
        if (!$relic) {
            return redirect()->back();
        }
        return view('frontend.relics.detail', compact('relic'));
    }
}
