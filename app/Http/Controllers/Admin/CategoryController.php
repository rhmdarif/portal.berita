<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->has('search')) {
            $categories = Category::where('name', 'like', "%".$request->search."%")->paginate(10);
        } else {
            $categories = Category::paginate(10);
        }
        return view('pages.admin.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:categories,name,NULL,id,deleted_at,NULL'
        ]);

        if($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        Category::withTrashed()->updateOrCreate([
            'name' => $request->name
        ], [
            'deleted_at' => null
        ]);

        return back()->with('success', "Category berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('pages.admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:categories,name,'.$category->id
        ]);

        if($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $category->update([
            'name' => $request->name
        ]);

        return back()->with('success', "Category berhasil diperbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return ['status' => true, 'msg' => "Category berhasil dihapus"];
    }
}
