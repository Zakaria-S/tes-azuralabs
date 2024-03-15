<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index')->with('categories', $categories);
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('category.show')->with('category', $category);
    }

    public function create()
    {
        return view('category.add');
    }

    public function store(StoreCategoryRequest $request)
    {
        $request->validated();
        $categoryModel = new Category;
        $category = $categoryModel->addCategory($request);
        if (!$category) {
            return redirect()->back()->withErrors('category', 'There was some internal error when adding the data');
        }
        return redirect()->back()->with('success', 'Successfully added the data');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit')->with('category', $category);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $new_category = $category->updateCategory($request);
        if (!$new_category) {
            return redirect()->back()->withErrors('category', 'There was some internal error when updating the data');
        }
        return redirect()->back()->with('success', 'Successfully updated the data');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->deleteCategory();
        return redirect()->back()->with('success', 'Successfully delete the data');
    }
}
