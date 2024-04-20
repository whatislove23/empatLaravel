<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Category;

class ProductsController extends Controller
{
    public function addProduct(Request $request)
    {

        $request->validate([
            "img" => "required|image",
            "name" => "required",
            "price" => "required",
            "description" => "required",
            "categories" => "required",
        ]);
        $products = new Product();
        $products->product_name = $request->input('name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->sale = $request->input("sale") == "on" ? 1 : 0;
        $path = $request->file('img')->store('images', 'public');
        $products->img_path = $path;
        $products->save();
        foreach ($request->input('categories') as $category) {
            $products->categories()->attach($category);
        }
        return redirect()->route('products');
    }
    public function loadAddForm()
    {
        $categories = Category::all();
        return view("create", ["categories" => $categories]);
    }
    public function getProduct($id)
    {
        $data = Product::where("id", $id)->first();
        $categories = $data->categories()->get();
        $comments = $data->comments()->get();

        return view('product', [
            "item" => $data,
            "categories" => $categories,
            "comments" => array_reverse($comments->toArray())
        ]);
    }
    public function getProductsByCategory($category_id)
    {
        $categories = Category::all();
        $products = Category::find($category_id)->products;
        return view('products', [
            "products" => $products,
            "categories" => $categories
        ]);
    }
    public function getProducts()
    {
        $categories = Category::all();
        $products = Product::get();


        return view('products', [
            "products" => $products,
            "categories" => $categories
        ]);
    }
}
