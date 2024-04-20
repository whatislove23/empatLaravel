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
        // dd($request->input('categories'));
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
        $products->sale = false;
        $products->img = $request->file('img')->get();
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
        $products = Product::where("category_id", $category_id)->get();
        dd($products);
    }
    public function getProducts()
    {
        $products = Product::get();


        return view('products', [
            "products" => $products
        ]);
    }
}
