<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    function index(){
        return view('productos.index' , ['productos' => Product::all()]);
    }

    function list(){
        return view('productos.admin', ['productos' => Product::all()]);
    }

    function create(){
        return view('producto.create');
    }

    function search(Request $request){
        $productos = [];
        if ($request->category == 0) {
            $productos = Product::where('name', 'like', '%'.$request->name.'%')->get();

        } elseif (empty($request->name)) {
            $productos = Product::where('category_id', $request->category)->get();
 
        } else {
            $productos = Product::where('name', 'like', '%'.$request->name.'%')
                ->where('category_id', $request->category)
                ->get();

        }
        if(Auth::check()){
            return view('productos.admin', ['productos' => $productos]);
        }
        return view('productos.index', ['productos' => $productos]);
    }
    
    

    function store(Request $request){
        $errors = [];
        $producto = new Product();
        if ($request->has('name')  && $request->name != '' && Product::where('name', $request->name)->count() == 0){
            $producto->name = $request->name;
        }else{
            $errors[] = ["name"=>"hay problemas con el nombre"];
        }
        $producto->description = $request->description;
        if ($request->has('price') && $request->price != '' && is_numeric($request->price) && $request->price > 0){
            $producto->price = $request->price;
        }else{
            $errors[] = ["price"=>"hay problemas con el precio"];
        }
        if ($request->has('stock') && $request->stock != '' && is_numeric($request->stock) && $request->stock > 0){
            $producto->stock = $request->stock;
        }else{
            $errors[] = ["stock"=>"hay problemas con el stock"];
        }
        if ($request->has('category') && $request->category != '' && is_numeric($request->category) && Category::find($request->category) != null){
            $producto->category_id = $request->category;
        }else{
            $errors[] = ["category"=>"hay problemas con la categoria"];
        }
        
        if ($errors != []){
            return redirect()->route('producto.list')->withErrors($errors);
        }
        $producto->save();
        return redirect()->route('producto.list');
    }

    function update(Request $request){
        $errors = [];
        $producto = Product::find($request->id);
        if ($request->has('name')  && $request->name != ''){
            $producto->name = $request->name;
        }else{
            $errors[] = ["name"=>"hay problemas con el nombre"];
        }
        $producto->description = $request->description;
        if ($request->has('price') && $request->price != '' && is_numeric($request->price) && $request->price > 0){
            $producto->price = $request->price;
        }else{
            $errors[] = ["price"=>"hay problemas con el precio"];
        }
        if ($request->has('stock') && $request->stock != '' && is_numeric($request->stock) && $request->stock > 0){
            $producto->stock = $request->stock;
        }else{
            $errors[] = ["stock"=>"hay problemas con el stock"];
        }
        if ($request->has('category') && $request->category != '' && is_numeric($request->category) && Category::find($request->category) != null){
            $producto->category_id = $request->category;
        }else{
            $errors[] = ["category"=>"hay problemas con la categoria"];
        }
        if ($errors != []){
            return redirect()->route('producto.list')->withErrors($errors);
        }
        $producto->save();
        return redirect()->route('producto.list');
    }

    function delete(Request $request){
        $producto = Product::find($request->id);
        $producto->delete();
        return redirect()->route('producto.list');
    }

    function sustractstock(Request $request){
        $producto = Product::find($request->id);
        $producto->stock = $producto->stock - 1;
        $producto->save();
        if (Auth::check()){
            return redirect()->route('producto.list');
        }
        return redirect()->route('producto');
    }

    function sortby(Request $request){
        $productos = [];
        if ($request->sort == 'name'){
            $productos = Product::orderBy('name')->get();
   
        }elseif($request->sort == 'category'){
            $productos = Product::orderBy('category_id')->get();
 
        }
        if(Auth::check()){
            return view('productos.admin', ['productos' => $productos]);
        }
        return view('productos.index', ['productos' => $productos]);
    }

}
