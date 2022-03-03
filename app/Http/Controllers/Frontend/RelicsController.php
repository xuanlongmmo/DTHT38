<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function detail()
    {
        $relic = Relic::where('status', 1)->get();
        return view('frontend.relics.detail', compact('relic'));
    }
}
