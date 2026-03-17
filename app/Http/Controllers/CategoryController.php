<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Support\Toast;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $user = $request->user();

        $categories = $user->categories()->latest()->paginate();

        return view('categories.index', ['categories' => $categories]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //

        $categoryData = $request->validated();

        $request->user()->categories()->create($categoryData);

        Toast::success('Category created successfully!');

        return redirect()->route('categories.index');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //

        $category->update($request->validated());

        Toast::success('Category updated successfully!');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //

        $category->delete();

        Toast::success('Category deleted successfully!');

        return redirect()->route('categories.index');
    }
}
