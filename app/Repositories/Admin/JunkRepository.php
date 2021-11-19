<?php

namespace App\Repositories\Admin;

use App\Models\Category;
use App\Models\Junk;

class JunkRepository
{
    public function getAll()
    {
        try {
            $junk = Junk::all();
            return $junk;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    public function create($request)
    {
        try {
            $junk = Junk::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'weight' => $request->weight,
                'price' => $request->price
            ]);
            return $junk;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    public function update($request, $id)
    {
        try {
            $junk = Junk::find($id);
            $junk->category_id = $request->category_id;
            $junk->name = $request->name;
            $junk->weight = $request->weight;
            $junk->save();
            return $junk;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    public function show($id)
    {
        try {
            $junk = Junk::find($id);
            return $junk;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    public function delete($id)
    {
        try {
            $junk = Junk::find($id)->delete();
            return $junk;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }
}
