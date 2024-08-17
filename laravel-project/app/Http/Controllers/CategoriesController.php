<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use App\UseCase\Categories\CreateInput;
use App\UseCase\Categories\CreateInteractor;
use App\UseCase\Categories\EditInput;
use App\UseCase\Categories\EditInteractor;
use App\UseCase\Categories\DeleteInteractor;

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

        $input = new CreateInput($validatedData['category_name'], $userId);
        $interactor = new CreateInteractor();
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

        $input = new EditInput($validatedData['category_name'], $id);
        $interactor = new EditInteractor();
        $interactor->handle($input);

        return redirect()->route('index');
    }


    public function destroy($id)
    {
        $interactor = new deleteInteractor();
        $interactor->handle($id);
        return redirect()->route('index');
    }
}
