<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function all(Request $request): JsonResponse
    {
        if (!empty($request->with)) {
            /** @var Job $jobs */
            $jobs = Job::query()->where('job_code', $request->with)->firstOrFail();
            return response()->json($jobs->employees()->get());
        }

        if (!empty($request->without)) {
            /** @var Job $jobs */
            $jobs             = Job::query()->where('job_code', $request->without)->firstOrFail();
            $employeesWithJob = $jobs->employees()->get();
            $allEmployees     = Employee::all();

            return response()->json($allEmployees->diff($employeesWithJob));
        }

        return response()->json(Employee::all());
    }
}
