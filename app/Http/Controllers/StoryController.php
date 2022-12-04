<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class StoryController extends Controller
{
    public function __construct(Story $story) {
        $this->story = $story;
    }

    public function index() {
        return response()->json($this->story->with(['category'])->paginate(10));
    }

    public function getWithCategory(Request $request) {
        $id = $request['catId'];
        $list = $this->story->where('cat_id',$id)->paginate(10);
        return response()->json($list);
    }
}
