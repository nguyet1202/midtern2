<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class APIController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();
        return response()->json($products);
    }
    // public function getProducts_type()
    // {
    //     $products = Product::where('typeProduct','Hoa quả')->paginate(4);
    //     $products1 = Product::where('typeProduct','thực phẩm khô')->paginate(4);
    //     $products2 = Product::where('typeProduct','rau hữu cơ')->paginate(4);										
    //     return view('page', compact('products','products1','products2'));
    //     return response()->json($products,$products1, $products2);
    // }
    public function getOneProduct($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $fileName = 'images/products/' . $product->image;
        if (File::exists($fileName)) {
            File::delete($fileName);
        }
        $product->delete();
        return ['status' => 'ok', 'msg' => 'Delete successed'];
    }
    

    
    public function searchByName(Request $request)
    {
        if($request->keyword == null)
        {
            return DB::all();
        }
        $result = DB::table('products')
                ->where('nameProduct', 'like', "% $request->keyword %")
                ->get();
        return $result;
    }
}






//     public function getAdd(){
//         return view('formAdd');
//     }
//     public function getIndex()
//     {
//         $products = Product::where('typeProduct','Hoa quả')->paginate(4);
//         $products1 = Product::where('typeProduct','thực phẩm khô')->paginate(4);
//         $products2 = Product::where('typeProduct','rau hữu cơ')->paginate(4);										
//         return view('page', compact('products','products1','products2'));
//     }
//     public function postAdminAdd (Request $request) {
//         $product = new Product();
//         if ($request->hasFile('inputImage')) {
//             $file = $request->file('inputImage');
//             $fileName = $file->getClientOriginalName('inputImage');
//             $file->move('assets/images/products', $fileName);
//         }
//         $file_name=null;
//         if($request->file('inputImage') !=null){
//             $file_name = $request->file('inputImage') ->getClientOriginalName();
//         }

//         $product->nameProduct = $request->inputName;
//         $product->image = $file_name;
//         $product->describe=$request->inputDescription;
//         $product->unit_price = $request->inputPrice;
//         $product->promotion_price = $request->inputPromotionPrice;
//         $product->typeProduct=$request->inputType;
//         $product->save();
//         return $this -> getIndex();
//     }
// }
