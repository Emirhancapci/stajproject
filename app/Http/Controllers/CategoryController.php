<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::all();
        return view('category.list', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'category' => 'required',
        ]);

        $category = new Category();
        $category->create([
            'name' => $request->input('category'),
        ]);

        Alert::success('TEBRİKLER', 'Kategori başarıyla eklendi.');

        return redirect()->route('category.list');
    }

    public function edit($id)
    {
    $category = Category::find($id);

    return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        Alert::success('TEBRİKLER', 'Kategori başarıyla düzenlendi.');
        return redirect()->route('category.list');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Alert::success('', 'Kategori başarıyla silindi.');
        return back();
    }

    public function subcategoryCreate()
    {
        $categories = Category::all();
        return view('subCategory.create',compact('categories'));
    }

    public function subCategoryIndex()
    {
        $subCategories = SubCategory::with('category')->get();

        return view('subCategory.list', compact('subCategories'));
    }

   public function subCategoryStore(Request $request)
    {
        $subCategory = new SubCategory();
        $subCategory->category_id = $request->input('category');
        $subCategory->name = $request->input('subcategory');
        $subCategory->created_at = Carbon::now();
        $subCategory->save();

        Alert::success('TEBRİKLER', 'Alt kategori başarıyla eklendi.');
        return redirect()->route('subCategory.list');
    }

    public function subCategoryEdit($id)
    {
        $categories = Category::get();
        $subCategory = SubCategory::find($id);

        return view('subCategory.edit', compact('categories', 'subCategory'));
    }

    public function subCategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required'
        ]);

        $subCategory = SubCategory::findOrFail($id);
        $subCategory->category_id = $request->input('category');
        $subCategory->name = $request->name;
        $subCategory->save();

        Alert::success('TEBRİKLER', 'Kategori başarıyla düzenlendi.');
        return redirect()->route('subCategory.list');
    }

    public function subCategoryDelete($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();

        Alert::success('TEBRİKLER', 'Kategori başarıyla silindi.');
        return back();
    }


}
