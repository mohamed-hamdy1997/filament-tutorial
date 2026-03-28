<?php

namespace App\Filament\App\Widgets;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Team;
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAppChart extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Users', Team::query()->find(Filament::getTenant())->first()->members()->count())
                ->description('All users from the DB')
                ->descriptionIcon('heroicon-o-users')
                ->chart([7, 2, 3, 6, 1, 7, 19])
                ->color('success'),

            Stat::make('Departments', Department::query()->whereBelongsTo(Filament::getTenant())->count())
                ->description('All departments from the DB')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('danger'),

            Stat::make('Employees', Employee::query()->whereBelongsTo(Filament::getTenant())->count())
                ->description('All employees from the DB')
                ->descriptionIcon('heroicon-o-users')
                ->color('warning'),
        ];
    }
}
