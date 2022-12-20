<?php

namespace App\Http\Controllers\UserController;

use App\Models\CategoryModel;

class CategoriesController
{
    public function __construct(CategoryModel $categoryModel) {
        $this->category = $categoryModel;
    }

    public function getAllCategories() {
        return response()->json($this->category);
    }
}
