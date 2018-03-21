<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemsModel;
use Exception;
use DB;

class ItemsController extends Controller
{
    protected $item;

    public function __construct(ItemsModel $item) {
      $this->item = $item;
    }

    public function addItem(Request $request) {
      $item = [
        "item_id" => $request->item_id,
        "user_id" => $request->user_id,
        "item_name" => $request->item_name,
        "item_price" => $request->item_price,
        "item_stock" => $request->item_stock
      ];
      try {
        $item = $this->item->create($item);
        return response('Item successfully created', 201);
      } catch(Exception $ex) {
        return response($ex, 400);
      }
    }

    public function showItem(Request $request) {
      try {
        $items = $this->item->all();
        return $items;
      } catch(Exception $ex) {
        return response($ex, 400);
      }
    }

    public function deleteItem($id) {
      try {
        $itemToDelete = $this->item->find($id);
        $itemToDelete->delete();
        return response('Item successfully deleted', 200);
      } catch(Exception $ex) {
        return response($ex, 401);
      }
    }

    public function updateItem(Request $request, $id) {
      try {
        $item = $this->item->find($id);
        $item->item_id = $request->item_id;
        $item->user_id = $request->user_id;
        $item->item_name = $request->item_name;
        $item->item_price = $request->item_price;
        $item->item_stock = $request->item_stock;
        $item->save();
        return response('Item successfully updated', 200);
      } catch(Exception $ex) {
        return response($ex, 401);
      }
    }

}
