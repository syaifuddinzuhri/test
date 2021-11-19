<?php

use App\Models\Rating;

class RatingRepository
{
    public function getAll()
    {
        try {
            $rating = Rating::all();
            return $rating;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    public function create($request)
    {
        try {
            $rating = Rating::create([
                'seller_id' => $request->seller_id,
                'buyer_id' => $request->buyer_id,
                'star' => $request->star,
                'comment' => $request->comment
            ]);
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    public function update($id, $request)
    {
        try {
            $rating = Rating::find($id);
            $rating->buyer_id = $request->buyer_id;
            $rating->seller_id = $request->seller_id;
            $rating->star = $request->star;
            $rating->comment = $request->comment;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    public function show($id)
    {
        try {
            $rating = Rating::find($id);
            return $rating;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    public function delete($id)
    {
        try {
            return Rating::find($id)->delete();
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }
}
