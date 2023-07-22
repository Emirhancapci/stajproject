<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{
    protected $table = 'products';

    public function index()
    {
        $categories = Category::all();

        return view('product.create',compact('categories'));
    }

    public function list()
    {
        $products=Product::with('category')->orderBy('id','desc')->paginate(10);

        return view('product.list', compact('products'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);
    $product = new Product();

    $product->name = $request->name;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        $path = 'images/' .$filename;
        $image->move(public_path('images'), $filename);
        $product->image = $path;
    }
    $product->slug = Str::slug($product->name);
    $product->price =  $request->price;
    $product->discount = $request->discount;
    $product->category_id = $request->category_id;
    $product->description = $request->description;


    $product->save();

    Alert::success('TEBRİKLER', 'Ürün başarıyla eklendi.');

    return redirect()->route('product.list');
    }

    public function edit(Request $request, $id)
    {
        $product = Product::where('id', $id)->with('category')->first();

        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $product->name = $request->name;


    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        $path = 'images/' .$filename;
        $image->move(public_path('images'), $filename);
        $product->image = $path;
    }

    $product->price = $request->price;
    $product->discount = $request->discount;
    $product->description = $request->description;

    $product->save();

    Alert::success('TEBRİKLER', 'Ürün başarıyla düzenlendi.');

    return redirect()->route('product.list');
}


    public function delete($id)
{
    $product = Product::findOrFail($id);
    $product->delete();
    Alert::success('TEBRİKLER', 'Ürün başarıyla silindi.');
    return back();
}

    public function productlist(){

     $products = Product::all();

     return view('frontend.home', compact('products'));

    }

    public function product_detail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('frontend.product-detail', compact('product'));
    }

    public function productlist1(){

        $products = Product::all();

        return view('frontend.products', compact('products'));

       }


}
