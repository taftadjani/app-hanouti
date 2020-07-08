<?php

namespace App\Http\Controllers;

use App\ProductStore;
use App\Store;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function results(Request $request)
    {
        $request->validate([
            'data' => "bail|string|required|min:1"
        ]);
        $data = $request['data'];
        $products = ProductStore::where('name', 'LIKE', "%{$data}%")
            ->orWhere('description', 'LIKE', "%{$data}%")
            ->orWhere('keywords', 'LIKE', "%{$data}%")
            ->get();
        $stores = Store::where('name', 'LIKE', "%{$data}%")
            ->orWhere('description', 'LIKE', "%{$data}%")
            ->orWhere('keywords', 'LIKE', "%{$data}%")
            ->get();
        if ($products->count() <= 0 && $stores->count() <= 0) {
            return redirect()->back();
        }
        return view('search-result', compact('products', 'data', 'stores'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
