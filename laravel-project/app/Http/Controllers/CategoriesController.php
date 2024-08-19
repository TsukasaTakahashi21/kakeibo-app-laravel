<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use App\UseCase\Categories\Create_Categories_Input;
use App\UseCase\Categories\Create_Categories_Interactor;
use App\UseCase\Categories\Edit_Categories_Input;
use App\UseCase\Categories\Edit_Categories_Interactor;
use App\UseCase\Categories\Delete_Categories_Interactor;

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

        $input = new Create_Categories_Input($validatedData['category_name'], $userId);
        $interactor = new Create_Categories_Interactor();
        $interactor->handle($input);

        return redirect()->route('index');
    }


    public function edit($id)
    {
        $category = categories::where('id', $id)
                                ->where('user_id', Auth::id())->firstOrFail();
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

        $input = new Edit_Categories_Input($validatedData['category_name'], $id);
        $interactor = new Edit_Categories_Interactor();
        $interactor->handle($input);

        return redirect()->route('index');
    }


    public function destroy($id)
    {
        $interactor = new delete_Categories_Interactor();
        $interactor->handle($id);
        return redirect()->route('index');
    }
}
