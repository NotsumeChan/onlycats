<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoriaController extends Controller
{
    function index(){
        return view('categorias.index', ['categorias' => Category::all()]);
    }

    function list(){
        return view('categorias.admin', ['categorias' => Category::all()]);
    }

    function create(){
        return view('categorias.create');
    }

    function store(Request $request){
        $errors = [];
        $categoria = new Category();
        if ($request->has('name')  && $request->name != '' && Category::where('name', $request->name)->count() == 0){
            $categoria->name = $request->name;
        }else{
            $errors[] = ["name"=>"hay problemas con el nombre"];
        }
        
        if ($errors != []){
            return redirect()->route('categoria.list')->withErrors($errors);
        }
        $categoria->save();
        return redirect()->route('category.list');
    }

    function update(Request $request){
        $errors = [];
        $categoria = Category::find($request->id);
        if ($request->has('name')  && $request->name != ''){
            $categoria->name = $request->name;
        }else{
            $errors[] = ["name"=>"hay problemas con el nombre"];
        }
        
        if ($errors != []){
            return redirect()->route('category.list')->withErrors($errors);
        }
        $categoria->save();
        return redirect()->route('category.list');
    }

    function delete(Request $request){
        $categoria = Category::find($request->id);
        if (Product::where('category_id', $categoria->id)->count() > 0){
            return redirect()->route('category.list')->withErrors(["category"=>"hay productos asociados a esta categoria"]);
        }
            $categoria->delete();
        return redirect()->route('category.list');
    }
}
