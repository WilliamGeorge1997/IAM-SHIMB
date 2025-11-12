<?php

namespace Modules\User\App\Http\Controllers\Api;

use Modules\User\DTO\UserDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\User\Service\UserService;
use Modules\User\App\Http\Requests\UserStoreRequest;

class TrainerAdminController extends Controller
{
    public function __construct(private UserService $userService)
    {
        $this->middleware('auth:user');
        $this->middleware('role:Super Admin');
        $this->userService = $userService;
    }
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $trainers = $this->userService->findAll($data,[],'Trainer');
        return returnMessage(true, 'Trainers Fetched Successfully.', $trainers);
    }
    public function store(UserStoreRequest $request): JsonResponse
    {
        $data = (new UserDto($request))->dataFromRequest();
        $data['role'] = 'Trainer';
        $trainer = $this->userService->save($data);
        return returnMessage(true, 'Trainer Created Successfully.', $trainer);
    }
}
