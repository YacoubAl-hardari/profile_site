<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateFilamentResources extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    /**
     * The console command description.
     *
     * @var string
     */
    protected $signature = 'generate:filament-resources';

    protected $description = 'Generate Filament resources for all models';
    /**
     * Execute the console command.
     */
    public function handle()
    {
       // Define an array of model names
       $models = [
        "Category",
        "AboutUs",
        "WorkExperience",
        "MyExpertArea",
        "Service",
        "FrequentlyAskedQuestion",
        "Brand",
        "CategoryPortfolio",
        "Portfolio",
        "ClientReview",
        "CategoryBlog",
        "TagBlog",
        "Blog"
    ];

    // Loop through the array and generate Filament resources for each model
    foreach ($models as $model) {
        $this->call('make:filament-resource', [
            'name' => $model,
            '--generate' => true,
            '--view' => true
        ]);
    }

    $this->info('Filament resources generated successfully for all models.');

    }
}
