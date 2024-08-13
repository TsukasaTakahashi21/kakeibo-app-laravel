<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Categories::where('user_id', Auth::id())->get();

        return view('spendings.categories', compact('categories'));
    }


    public function create()
    {
        return view('spendings.create_categories');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:50|unique:categories,name',
        ], [
            'category_name.required' => 'カテゴリ名が入力されていません',
            'category_name.unique' => 'すでに登録済みのカテゴリです',
        ]);

        $userId = Auth::id();

        $category = new Categories();
        $category->name = $validatedData['category_name'];
        $category->user_id = $userId;
        $category->save();

        return redirect()->route('index');
    }


    public function edit($id)
    {
        $category = categories::FindOrFail($id);
        return view('spendings.edit_categories', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:50|unique:categories,name',
        ], [
            'category_name.required' => 'カテゴリ名が入力されていません',
            'category_name.unique' => 'すでに登録済みのカテゴリです',
        ]);

        $category = Categories::findOrFail($id);
        $category->name = $validatedData['category_name'];
        $category->save();

        return redirect()->route('index');
    }


    public function destroy($id)
    {
        $category = Categories::FindOrFail($id);
        $category->delete();

        return redirect()->route('index');
    }
}
