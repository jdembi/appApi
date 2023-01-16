<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;


class CategoryController extends Controller
{

  /**
   *SALVAR DADOS NA TABELA CATEGORIA *
   */
  public function store(Request $request)
  {
    Category::create($request->except(['_token'], []));
    return response()->json(['success' => 'Category Created Successfully!']);
  }

/**
   *LISTAR TODAS CATEGORIAS *
   */
  public function show(Category $category)
  {
    $categorias = Category::all();
    return $categorias;
  }

 /**
   *ACTUALIZAR DADOS NA TABELA PEDIDOS *
   */
  public function update(Request $request)
  {
    $category = Category::where('id', $request->id)->first();

    $category->fill($request->post())->save();

    return response()->json(['success' => 'Category Updated Successfully!']);

  } /**
  *ELIMINAR DADOS NA TABELA CATEGORIA *
  */
  public function delete($id)
  {
    Category::find($id)->delete();

    return response()->json(['success' => 'Category Deleted Successfully!']);
  }
}