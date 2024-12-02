<?php

namespace App\Http\Controllers\Admin\Regulation;

use App\Http\Controllers\Admin\CrudController;
use App\Repositories\RegulationRepository;

class RegulationController extends CrudController
{
    private RegulationRepository $repo;
    public function __construct()
    {
        $this->repo = new RegulationRepository();
    }

    public function getRepository(): RegulationRepository
    {
        return $this->repo;
    }

    public function getViewFolder(): string
    {
        return 'admin.regulation';
    }
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
        
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create($data = [])
    {
        $data['categories'] = (new \App\Repositories\CategoryRepository())->getAll();
        $data['stores'] = (new \App\Repositories\StoreRepository())->getAll();

        return parent::create($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     dd($request->input());
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
        $data['stores'] = (new \App\Repositories\StoreRepository())->getAll();

        return parent::edit($id, $data);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     dd($request->input());
    // }

    // public function updateValidated(Request $request, int $id): array
    // {
    //     $data['featured'] = $request->input('featured') ? true : false;

    //     return $data;
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
