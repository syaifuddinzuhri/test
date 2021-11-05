<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\SellerLoginRequest;
use App\Repositories\Seller\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $repository;

    /**
     * @param AuthRepository $repository
     */
    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function login(SellerLoginRequest $request)
    {
        try {
            $data = $this->repository->login($request);
            return response()->success($data, 'Login successful!');
        } catch (\Throwable $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }

    public function logout()
    {
        try {
            $this->repository->logout();
            return response()->success('Logout successful!');
        } catch (\Throwable $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }

    public function refresh()
    {
        try {
            $token = $this->repository->refresh();
            return response()->success(['token' => $token], 'Refresh token successful');
        } catch (\Throwable $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }

    public function me()
    {
        try {
            $data = $this->repository->me();
            return response()->success($data, 'Data has been obtained');
        } catch (\Throwable $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }
}
