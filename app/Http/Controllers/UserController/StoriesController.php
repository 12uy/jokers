<?php

namespace App\Http\Controllers\UserController;

use App\Models\StoryModel;
use Illuminate\Http\Request;

class StoriesController
{
    public function __construct(StoryModel $story) {
        $this->story = $story;
    }

    public function index() {
        return response()->json($this->story->paginate(10));
    }

    public function getWithCategory($category_id) {
        $categoryId = $category_id;
        $list = $this->story->join('story_category', 'story.id', '=', 'story_category.story_id')->where('story_category.category_id',$categoryId);
        return response()->json($list->paginate(10));
    }
    public function search_story(Request $request){
        $search = $this->story->where('story_name','like','%'.$request->key.'%')->get();
        return response()->json($search);
    }
}
