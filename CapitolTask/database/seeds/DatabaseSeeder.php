<?php

use App\Employee;
use App\Job;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmployeesSeeder::class);
        $this->call(JobsSeeder::class);

        $jobs      = Job::all();
        $employees = Employee::query()->whereBetween('id', [1, 5])->get();
        foreach ($employees as $employee) {
            $employee->jobs()->sync([(rand(1, $jobs->count())), (rand(1, $jobs->count()))]);
        }
        $employees = Employee::query()->whereBetween('id', [6, 10])->get();
        foreach ($employees as $employee) {
            $employee->jobs()->sync([(rand(1, $jobs->count()))]);
        }
    }
}
