<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        // try{
            $items = Item::latest()->get();
            return response($items);
        // } catch(Exception $e){
        //     return response()->json('Items Not');
        // }
    }
    public function store(Request $request)
    {
        try{
            Item::create([
                'name' => $request->name,
                'price' => $request->price ?? 0
            ]);
            return response()->json('Item created', 200);
        }
        catch(Exception $e){
            // return response()->json($e);
            // dd($e);
            return response()->json($e, 500);
        }
    }
    public function update(Request $request, $id)
    {
        try{
            $item = Item::find($id);
            $request->validate([
                'name' => 'required'
            ]);
            $item->update([
                'name' => $request->name,
                'price' => $request->price ?? 0
            ]);
            return response()->json('Item Updated', 200);
        }
        catch(Exception $e){
            // return response()->json($e);
            return response()->json('Not Updated');
        }
    }
    public function destroy($id)
    {
        try{
            $item = Item::find($id);
            $item->delete();
            return response()->json('Deleted', 200);
        } catch(Exception $e){
            return response()->json('Not Deleted', 500);
        }
    }
}
