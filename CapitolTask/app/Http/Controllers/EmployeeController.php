<?php

namespace App\Http\Controllers;

use App\Job;
use App\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function all(Request $request): JsonResponse
    {
        if ($request->with) {
            dd('with');
            /** @var Job $jobs */
            $jobs = Job::query()->where('job_code', $request->with)->get();
            return response()->json($jobs->employees()->get());
        }

        if ($request->without) {
            dd('without');
            /** @var Job $jobs */
            $jobs = Job::query()->where('job_code', $request->without)->get();
            return response()->json($jobs->employees()->get());
        }

        return response()->json(Employee::all());
    }
}
