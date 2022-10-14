<?php

namespace App\Http\Controllers;


use App\Contracts\UserServiceContract;
use App\Http\Requests\CreateRequest;
use App\Models\User;
use App\Services\ResponseService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

/**
 *
 */
class UserController extends Controller
{
    /**
     * @var UserService|UserServiceContract
     */
    protected UserService $userService;

    /**
     * @var ResponseService
     */
    protected ResponseService $responseService;

    /**
     * @param UserServiceContract $userService
     * @param ResponseService $responseService
     */
    public function __construct(UserServiceContract $userService, ResponseService $responseService)
    {
        $this->userService = $userService;
        $this->responseService = $responseService;
        //dd(1);
    }

    /**
     * @param CreateRequest $createRequest
     * @return array
     */
    public function createUser(CreateRequest $createRequest)
    {
        return $this->responseService->getResponse(
            $this->userService->create(
                $createRequest->all()
            )
        );
    }

    /**
     * @param Request $request
     * @return array
     */
    public function deleteUser(Request $request)
    {
        return $this->responseService->getResponse(
            $this->userService->delete(
                $request->only('user_id')
            )
        );
    }

    /**
     * @param Request $request
     * @param User $user
     * @return array
     */
    public function updateUser(Request $request, User $user)
    {
        return $this->responseService->getResponse(
            $this->userService->update(
                $request->all(), $user)
        );
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getListUser(Request $request)
    {
        return $this->responseService->getResponse(
            $this->paginate(
                $this->userService->getUsers(), $request->get('limit') ?? 10
            )
        );
    }
}
