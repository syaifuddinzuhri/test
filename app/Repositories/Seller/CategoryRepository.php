<?php

namespace App\Repositories\Seller;

use App\Models\Category;

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

    public function create()
    {
        # code...
    }

    public function update()
    {
        # code...
    }

    public function show()
    {
        # code...
    }

    public function delete()
    {
        # code...
    }
}
