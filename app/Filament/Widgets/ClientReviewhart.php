<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\ClientReview;
use Filament\Widgets\ChartWidget;

class ClientReviewhart extends ChartWidget
{
    protected static ?int $sort =3;
    protected static string $color = 'info';
    protected static ?string $heading = 'مراجعة العملاء';

    protected function getData(): array
    {
        $reviews = ClientReview::all();

        // Initialize an array to hold review counts for each month
        $reviewCounts = [];
        for ($i = 1; $i <= 12; $i++) {
            $reviewCounts[$i] = 0; // Initialize count for each month
        }
        
        // Count reviews for each month
        foreach ($reviews as $review) {
            $month = $review->created_at->month;
            $reviewCounts[$month]++;
        }
        
        // Generate labels based on the current month
        $labels = [];
        for ($i = 1; $i <= 12; $i++) {
            $month = Carbon::create(null, $i, 1)->format('M');
            $labels[] = $month;
        }
        
        // Generate dataset
        $dataset = [];
        foreach ($reviewCounts as $count) {
            $dataset[] = $count;
        }
        
        return [
            'datasets' => [
                [
                    'label' => 'Review Counts', 
                    'data' => $dataset,
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
