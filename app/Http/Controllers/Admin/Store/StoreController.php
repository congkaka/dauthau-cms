<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Admin\CrudController;
use App\Repositories\EloquentRepository;
use App\Repositories\StoreRepository;
use Illuminate\Http\Request;

class StoreController extends CrudController
{
    private StoreRepository $storeRepo;
    public function __construct()
    {
        $this->storeRepo = new StoreRepository();
    }

    public function getRepository(): EloquentRepository
    {
        return $this->storeRepo;
    }

    public function getViewFolder(): string
    {
        return 'admin.stores';
    }

    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create($data=[])
    {
        $data['categories'] = (new \App\Repositories\CategoryRepository())->getAll();

        return parent::create($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id, $data = [])
    {
        $data['categories'] = (new \App\Repositories\CategoryRepository())->getAll();

        return parent::edit($id, $data);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
