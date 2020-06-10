<?php

namespace App\Http\Controllers;

use App\Map;
use App\Store;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource. stores
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("layouts.maps.stores");
    }
    /**
     * Display a listing of the resource. stores
     *
     * @return \Illuminate\Http\Response
     */
    public function getStores()
    {
        $stores = Store::all();
        $results = [];
        $i=0;
        foreach ($stores as $store) {
            $i++;
            if ($store->location) {
                $results[]=[
                    'storeId'=>$store->id,
                    'storeName'=>$store->name,
                    'lat'=>$store->location->lat,
                    'lng'=>$store->location->lng
                ];
            }
            if ($i ==10) {
            // break;
            }
        }
        return $results;
    }

}
