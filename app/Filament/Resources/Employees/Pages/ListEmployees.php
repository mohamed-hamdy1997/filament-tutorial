<?php

namespace App\Filament\Resources\Employees\Pages;

use App\Filament\Resources\Employees\EmployeeResource;
use App\Models\Employee;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make()->badge(Employee::query()->count()),
            'This Week' => Tab::make()->modifyQueryUsing(fn(Builder $query) => $query->whereDate('created_at', '>=', now()->startOfWeek()))
                ->badge(Employee::query()->whereDate('created_at', '>=', now()->startOfWeek())->count()),
            'This Month' => Tab::make()->modifyQueryUsing(fn(Builder $query) => $query->whereDate('created_at', '>=', now()->startOfMonth()))
                ->badge(Employee::query()->whereDate('created_at', '>=', now()->startOfMonth())->count()),
            'This Year' => Tab::make()->modifyQueryUsing(fn(Builder $query) => $query->whereDate('created_at', '>=', now()->startOfYear()))
                ->badge(Employee::query()->whereDate('created_at', '>=', now()->startOfYear())->count()),
        ];
    }
}
