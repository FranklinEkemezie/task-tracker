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

        $categories = $user->categories()->paginate();

        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('categories.create');
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
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //

        return view('categories.edit', ['category' => $category]);
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
