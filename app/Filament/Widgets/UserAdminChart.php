<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class UserAdminChart extends ChartWidget
{
    protected ?string $heading = 'User Admin Chart';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = User::query()
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
                    'label' => 'Users Count',
                    'data' => $filledData->values(),
                ],
            ],
            'labels' => $filledData->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
