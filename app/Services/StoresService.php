<?php

namespace App\Services;
use App\Models\Store;

class StoresService
{
    public function listingByZip() {
        $stores = Store::orderBy('zip','desc')->orderBy('name')->get();
        return $stores;
    }

    public function listingByDepartment()
    {
        $stores = Store::join(
            'departments', 'stores.state', '=', 'departments.zip')
            ->orderBy('departments.name', 'asc')
            ->orderBy('name', 'asc')
            ->orderBy('city', 'asc')
            ->select('stores.*','departments.name as department_name')
            ->get();
        return $stores;
    }

    public function all()
    {
        $stores = Store::orderBy('name')->get();
        foreach ( $stores as $store) {
            $gps = $store->getCoordinates();
            $store->lat = $gps[0]['lat'];
            $store->lng = $gps[0]['lng'];
        }
        return $stores;
    }

    public function getId($id)
    {
        return Store::find($id)->orderBy('zip', 'asc')->first();
    }

    
}