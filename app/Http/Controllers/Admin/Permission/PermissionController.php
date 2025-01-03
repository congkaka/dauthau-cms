<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Admin\CrudController;
use App\Repositories\EloquentRepository;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class PermissionController extends CrudController
{
    private PermissionRepository $storeRepo;
    public function __construct()
    {
        $this->storeRepo = new PermissionRepository();
    }

    public function getRepository(): EloquentRepository
    {
        return $this->storeRepo;
    }

    public function getViewFolder(): string
    {
        return 'admin.permissions';
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
    // public function create()
    // {
    //     //
    // }

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
    // public function edit(string $id)
    // {
    //     //
    // }

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
