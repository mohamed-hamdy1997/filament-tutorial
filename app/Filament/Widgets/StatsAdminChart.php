<?php

namespace App\Filament\Widgets;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Team;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminChart extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::where('is_admin', false)->count()),
            Stat::make('Total Employees', Employee::count()),
            Stat::make('Total Departments', Department::count()),
            Stat::make('Total Teams', Team::count()),
        ];
    }
}
