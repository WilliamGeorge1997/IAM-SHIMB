<?php

namespace Modules\User\App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Modules\User\DTO\UserDto;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\User\Service\UserService;
use Modules\User\App\Http\Requests\UserStoreRequest;

class StudentAdminController extends Controller
{
    public function __construct(private UserService $userService)
    {
        $this->middleware('auth:user');
        $this->middleware('role:Super Admin|Trainer');
    }
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $students = $this->userService->findAll($data, [], 'Student');
        return returnMessage(true, 'Students Fetched Successfully.', $students);
    }
    public function store(UserStoreRequest $request): JsonResponse
    {
        $data = (new UserDto($request))->dataFromRequest();
        $data['role'] = 'Student';
        $student = $this->userService->save($data);
        return returnMessage(true, 'Student Created Successfully.', $student);
    }
}
