<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\category;


class OrderController extends Controller
{
  /**
   *LISTAR DADOS NA TABELA *
   */
  public function index()
  {
    $ordeis = Order::select(
      "orders.id",
      "orders.contact_phone",
      "orders.contact_name",
      "orders.deadline",
      "orders.agency",
      "orders.company",
      "orders.description",
      "categorys.category as category"
    )
      ->join("categorys", "categorys.id", "=", "orders.category")
      ->get()
      ->toArray();

    $categoria = Category::all();

    return view('home', compact('ordeis', 'categoria'));

  }

   /**
   *SALVAR DADOS NA TABELA PEDIDOS *
   */
  public function store(Request $request)
  {
    Order::create($request->except(['_token'], []));

    return redirect()->route('home.index');
  }

  public function storeaApi(Request $request)
  {
    Order::create($request->except(['_token'], []));

    return redirect()->route('home.index');
  }


  public function show(Order $order)
  {
    $ordeis = Order::select(
      "orders.id",
      "orders.contact_phone",
      "orders.contact_name",
      "orders.deadline",
      "orders.agency",
      "orders.company",
      "orders.description",
      "categorys.category as category"
    )
      ->join("categorys", "categorys.id", "=", "orders.category")
      ->get()
      ->toArray();
    return $ordeis;
  }


 /**
   *ACTUALIZAR DADOS NA TABELA PEDIDOS *
   */
  public function update(Request $request)
  {
    $order = Order::where('id', $request->id)->first();

    $order->fill($request->post())->save();

    return response()->json(['success' => 'Order Updated Successfully!']);
  }
 /**
   *ELIMINAR DADOS NA TABELA PEDIDOS *
   */
  public function delete($id)
  {
    Order::find($id)->delete();

    return response()->json(['success' => 'Order Deleted Successfully!']);
  }


}