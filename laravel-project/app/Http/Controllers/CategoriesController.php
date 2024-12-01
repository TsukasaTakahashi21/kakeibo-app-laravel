<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use App\UseCase\Categories\CreateCategoryInput;
use App\UseCase\Categories\CreateCategoryInteractor;
use App\UseCase\Categories\EditCategoryInput;
use App\UseCase\Categories\EditCategoryInteractor;
use App\UseCase\Categories\DeleteCategoryInteractor;
use App\ValueObject\categoryName;

class CategoriesController extends Controller
{
    private $createCategoryInteractor;
    private $editCategoryInteractor;
    private $deleteCategoryInteractor;

    public function __construct(CreateCategoryInteractor $createCategoryInteractor, EditCategoryInteractor $editCategoryInteractor, DeleteCategoryInteractor $deleteCategoryInteractor)
    {
        $this->createCategoryInteractor = $createCategoryInteractor;
        $this->editCategoryInteractor = $editCategoryInteractor;
        $this->deleteCategoryInteractor = $deleteCategoryInteractor;
    }

    public function index()
    {
        $categories = Categories::where('user_id', Auth::id())->get();

        return view('spendings.categories', compact('categories'));
    }

    public function create()
    {
        return view('spendings.create_categories');
    }

    public function store(CategoryRequest $request)
    {
        $userId = Auth::id();
        $categoryName = new CategoryName($request['category_name']);

        $input = new CreateCategoryInput($categoryName, $userId);

        $this->createCategoryInteractor->handle($input);

        return redirect()->route('index');
    }

    public function edit(int $id)
    {
        $category = categories::where('id', $id)
            ->where('user_id', Auth::id())->firstOrFail();
        return view('spendings.edit_categories', compact('category'));
    }

    public function update(CategoryRequest $request, int $id)
    {
        $categoryName = new CategoryName($request->category_name);

        $input = new EditCategoryInput($categoryName, $id);

        $this->editCategoryInteractor->handle($input);

        return redirect()->route('index');
    }

    public function destroy(int $id)
    {
        $this->deleteCategoryInteractor->handle($id);
        return redirect()->route('index');
    }
}
