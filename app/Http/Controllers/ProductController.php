<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function indexProduct()
    {
        $data = DB::table("products")->get();
        return view('product.indexProduct',['products'=>$data]);
    } 

    public function deleteProduct($id){
        $delete=DB::table("products")
        ->where("id", "=", $id)
        ->delete();

        return redirect("/product")->with("success", "Product deleted Successfully");
    }
    public function addProduct(){
        return view('product.addProduct');
    }
    public function saveProduct(Request $req){
        $validated=$req->validate([
            "description"=>['required' , 'min:4'],
            "quantity"=>['required' , 'min:1'],
            "price"=> ['required' , 'min:1']
        ]);
        $data=Product::create($validated);
        return redirect("/product")->with('success2', 'Product added successfully.');

    }
    public function editProduct($id){
        $data=Product::findOrFail($id);
        return view('product.editProduct', ['product' => $data]);

    }
    public function updateProduct(Request $req){
        $req->validate([
            "description"=>['required' , 'min:4'],
            "quantity"=>['required' , 'min:1'],
            "price"=> ['required' , 'min:1']
        ]);

        $data=Product::find($req->id);
        $data->description=$req->description;
        $data->quantity=$req->quantity;
        $data->price=$req->price;

        $data->save();
        return redirect("/product")->with('success3', 'Product edited successfully.');
    }
}
