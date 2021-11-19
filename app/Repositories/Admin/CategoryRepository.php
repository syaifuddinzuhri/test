<?php

namespace App\Repositories\Admin;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository
{

    public function getAll()
    {
        try {
            $category = Category::all();
            return $category;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    public function create($request)
    {
        try {
            $category = Category::create([
                'name' => $request->name,
                'status' => $request->status
            ]);
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    public function update($request, $id)
    {
        try {
            // dd($request);
            $category = Category::find($id);
            $category->name = $request->name;
            $category->status = $request->status;
            $category->save();
            return $category;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    public function show($id)
    {
        try {
            $category = Category::find($id);
            return $category;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    public function delete($id)
    {
        try {
            return Category::find($id)->delete();
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }
}
