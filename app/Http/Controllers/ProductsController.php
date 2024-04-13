<?php
namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductsController extends Controller
{
    public function addProduct(Request $request)
    {
        $request->validate([
            "img" => "required|image",
            "name" => "required",
            "price" => "required",
            "description" => "required",
        ]);

        $products = new Products();
        $products->product_name = $request->input('name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->sale = false;
        $products->img = $request->file('img')->get();
        $products->save();
        return redirect()->route('products');
    }
    public function loadAddForm()
    {
        return view("create");
    }
    public function getProduct($id)
    {
        $data = Products::where("id", $id)->first();
        return view('product', [
            "item" => $data
        ]);
    }
    public function getProducts()
    {
        $products = Products::get();
        return view('products', [
            "products" => $products
        ]);
    }
}
