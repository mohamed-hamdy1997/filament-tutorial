<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Facades\Filament;
use Filament\Widgets\ChartWidget;

class EmployeeAdminChart extends ChartWidget
{
    protected ?string $heading = 'Employee Admin Chart';
    protected string $color = 'info';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = Employee::query()
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as aggregate')
            ->whereBetween('created_at', [
                now()->startOfYear(),
                now()->endOfYear(),
            ])
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = collect(range(1, 12))->mapWithKeys(function ($month) {
            $key = now()->startOfYear()->addMonths($month - 1)->format('Y-m');
            return [$key => 0];
        });

        $filledData = $months->merge(
            $data->pluck('aggregate', 'month')
        );

        return [
            'datasets' => [
                [
                    'label' => 'Employees Count',
                    'data' => $filledData->values(),
                ],
            ],
            'labels' => $filledData->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
