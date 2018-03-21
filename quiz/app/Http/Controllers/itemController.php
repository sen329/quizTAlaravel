<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\itemModel;
use DB;
use Exception;


class itemController extends Controller
{
  protected $items;

  public function __construct(itemModel $items){
    $this->item = $items;
  }
  //

  public function register(Request $request){
      $items = [
        "user_id" => $request->user_id,
        "name"  => $request->name,
        "price" => $request->price,
        "stock" =>$request->stock
      ];

      try{
        $items = $this->item->create($items);
        return response('Created',201);
      }catch(Exception $ex){
        return response('Failed',400);
      }
    }

  public function all(){
    $items = $this->item->all();
    return response()->json($items,200);
  }

  public function finditem($id){
    $items = $this->item->find($id);
    return $items;
  }

  public function delete($id){
      DB::table('item')->where('id',$id)->delete();
      return response()->json('Deleted',200);
    }

    public function updateItem(Request $request, $id) {
    $newUserId = $request->user_id;
    $newName = $request->name;
    $newPrice = $request->price;
    $newStock = $request->stock;
    DB::update('update user set user_id =?, name = ?, price = ?, stock = ? where id = ?', [$newUserId, $newName, $newPrice, $newStock, $id]);
    return response()->json('updated',200);

}

}
