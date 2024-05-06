<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use App\Models\AwardandRecognition;

class AwardandRecognitionhart extends ChartWidget
{
    protected static ?int $sort =2;

    protected static ?string $heading = 'جوائز وتقديرات';

    protected function getData(): array
    {
        $users = AwardandRecognition::all()->pluck('title','id')->toArray();

// Generate labels based on the current month
$currentMonth = Carbon::now()->month;
$labels = [];
for ($i = 1; $i <= 12; $i++) {
    $month = Carbon::create(null, $i, 1)->format('M');
    $labels[] = $month;
}

return [
    'datasets' => [
        [
            'label' => array_values($users), // Use titles directly as the label
            'data' => array_keys($users), // Use IDs as the data
        ],
    ],
    'labels' => $labels,
];

    }

    protected function getType(): string
    {
        return 'line';
    }
}
