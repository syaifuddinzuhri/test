<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryRequest;
use App\Models\Category;
use App\Repositories\Admin\CategoryRepository;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class CategoryController extends Controller
{

    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $category = $this->repository->getAll();
            return response()->success($category, 'Find Data');
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
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
    public function store(AdminCategoryRequest $request)
    {
        try {
            $category = $this->repository->create($request);
            return response()->success($category, 'Successful add data');
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $category = $this->repository->show($id);
            return response()->success($category, 'Data Found');
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
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
    public function update(AdminCategoryRequest $request, $id)
    {
        try {
            $category = $this->repository->update($request, $id);
            return response()->success($category, 'Data Updated');
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = $this->repository->delete($id);
            return response()->success($category, 'Data Deleted');
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }
}
