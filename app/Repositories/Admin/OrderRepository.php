<?php

use App\Models\Order;

class OrderRepository
{
    public function getAll()
    {
        try {
            $order = Order::all();
            return $order;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    public function create($request)
    {
        try {
            $order = Order::create([
                'buyer_id' => $request->buyer_id,
                'junk_id' => $request->junk_id,
                'status' => $request->status
            ]);
            return $order;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    public function update($request, $id)
    {
        try {
            $order = Order::find($id);
            $order->buyer_id = $request->buyer_id;
            $order->junk_id = $request->junk_id;
            $order->status = $request->status;
            $order->save();
            return $order;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }

    public function show($id)
    {
        try {
            $order = Order::find($id);
            return $order;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }



    public function delete($id)
    {
        try {
            $order = Order::find($id)->delete();
            return $order;
        } catch (\Throwable $th) {
            throw $th;
            report($th);
            return $th;
        }
    }
}
