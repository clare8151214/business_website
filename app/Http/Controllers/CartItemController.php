<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute 是必要的',
            'between' => ':attribute 不再 :min 和 :max',
        ];
        $validator =  Validator::make($request->all(),[
            'cart_id' => 'required | integer',
            'product_id' => 'required | integer',
            'quantity' => 'required | integer | between:1,10',
        ],$messages);
        if($validator->fails()){
            return response($validator->errors(),400);
        }
        $form = $validator->validate();
       // dd($form);
        //$form = $request->all();
        DB::table('cart_items')->insert(['cart_id' => $form['cart_id'],
                                    'product_id' => $form['product_id'],
                                    'quantity' => $form['quantity'],
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                    ]);
        return response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartItem $request, $id)
    {
        $form = $request->validated();
        DB::table('cart_items')->where('id',$id)->update([
                                    'quantity' => $form['quantity'],
                                    'updated_at' => now(),
                                    ]);
        return response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('cart_items')->where('id',$id)->delete();
        return response()->json(true);
    }
}
