<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $data = $this->getData();
        //$data = DB::table('products')->get();
        /*$data = DB::table('sbl_team_data')
                        ->join('sbl_teams',function($join){
                            $join->on('sbl_teams.id','=','sbl_team_data.team_id')
                                 ->where('sbl_teams.total_win','>','200');
                        })
                         ->join('sbl_teams','sbl_teams.id','=','sbl_team_data.team_id')
                        ->select('*')
                        ->get();*/
        //$data = $data->addSelect('season')->get();
        
        DB::enableQueryLog();
        $data = DB::table('owner')->insertGetId(['sbl_team_id'=>2]);
        $data = DB::table('owner')->insertGetId(['sbl_team_id'=>2]);
        dd(DB::getQueryLog());
        return response($data);
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
        $data = $this->getData();
        $newData = $request->all();
        $data->push($newData);
        dump($data);
        return response($data);
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
    public function update(Request $request, $id)
    {
        $form = $request->all();
        $data = $this->getData();
        $selectData = $data->where('id',$id)->first();
        $selectData = $selectData->merge(collect($form));
        return response($selectData);
        dump($selectData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->getData();
        $data = $data->filter(function ($product) use ($id){
            return $product['id'] != $id;
        });
        return response($data->values());
    }
    public function getData()
    {
        return collect([
            collect([
                'id' => 0,
                'title' => '測試商品1'
                ,'content' => 'asdfa',
                'price' => 50
            ]),
            collect([
                'id' => 1,
                'title' => '測試商品2',
                'content' => 'asdfa',
                'price' => 30
            ])
        ]);
    }
}
