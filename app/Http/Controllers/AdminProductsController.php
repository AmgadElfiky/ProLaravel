<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\File;

class AdminProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
        return view("admin.displayProducts", ["products" => $products]);
    }

    //dispaly create product form
    public function createProductForm()
    {
        return view("admin.createProductForm");
    }

    public function sendCreateProductForm(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $type = $request->input('type');

        Validator::make($request->all(), ['image' => "required|file|image|mimes:png,jpg,jpeg|max:5000"])->validate();
        $extt = $request->file("image")->getClientOriginalExtension();
        $stringImageReFormat = str_replace(" ", "", $request->input('name'));

        $imageName = Storage::disk('public')->put('product_images/', $request->image);



        $newProductArray  = array('name' => $name, 'description' => $description,'image' => $imageName, 'type' => $type, 'price' => $price);
        $created = DB::table('products')->insert($newProductArray);

        if($created)
        {
            return redirect()->route("adminDisplayProducts");
        }
        else
        {
            return "Product Was Not Created";
        }
        /*$request->validate(['image' => "image|max:5000"]);
        //Validator::make($request->all(), ['image' => "image|max:5000"])->validate();
        //$ext = $request->file('image')->getClientOriginalExtension();
         $stringImageReFormat = str_replace(" ", "", $request->input('name'));

        $imageName = $stringImageReFormat.".jpg";

        //$imageEncoded = File::get($request->image);
        Storage::disk('local')->put('public/product_images/', $request->file("image"));

        $newProductArray  = array('name' => $name, 'description' => $description,'image' => $imageName, 'type' => $type, 'price' => $price);

        $created = DB::table('products')->insert($newProductArray);

        if($created)
        {
            return redirect()->route("adminDisplayProducts");
        }
        else
        {
            return "Product Was Not Created";
        }*/
    }

    //dispaly edit product form
    public function editProductForm($id)
    {
        $product = Product::find($id);
        return view('admin.editProductForm', ['product' => $product]);
    }

    //dispaly edit product Image form
    public function editProductImageForm($id)
    {
        $product = Product::find($id);
        return view('admin.editProductImageForm', ['product' => $product]);
    }

    public function updateProductImage(Request $request, $id)
    {
        Validator::make($request->all(), ['image' => "required|image|mimes:png,jpg,jpeg|max:5000"])->validate();

        if($request->hasFile("image"))
        {
            $product = Product::find($id);
            $exists = Storage::disk('local')->exists("public/product_images/".$product->image);

            //delete old image
            if($exists)
            {
                Storage::delete('public/product_images/'.$product->image);
            }

            //upload new image
            $ext = $request->file('image')->getClientOriginalExtension();

            $request->image->storeAs("public/product_images/", $product->image);

            $arrayToUpdate = array('image' => $product->image);
            DB::table('products')->where('id', $id)->update($arrayToUpdate);

            return redirect()->route("adminDisplayProducts");
        }
        else
        {
            $error = "No Image Was Selected";
            return $error;
        }
    }

    public function updateProduct(Request $request, $id)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $type = $request->input('type');
        $price = $request->input('price');

        $updateArray = array('name' => $name, 'description' => $description, 'type' => $type, 'price' => $price);
        DB::table('products')->where('id', $id)->update($updateArray);

        return redirect()->route("adminDisplayProducts");
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        $exists = Storage::disk('local')->exists("public/product_images/".$product->image);//return T|F

        //delete old image
        if($exists)
        {
            Storage::delete('public/product_images/'.$product->image);
        }
        Product::destroy($id);

        return redirect()->route("adminDisplayProducts");
    }
}
