<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        $sortOrder = 1; // Initial sort order value

        foreach (config('filament-sort-order') as $key => $table) {
            if (strpos($key, 'table') === 0) {
                Schema::table($table, function (Blueprint $table) {
                    $table->integer('sort_order')->unsigned()->default(0);
                });

                $sortColumn = 'sort_order'; // Change this to the actual column name representing the sort order

                DB::table($table)
                    ->update([$sortColumn => DB::raw('id')]);

                $sortOrder++; // Increment the sort order for the next table
            }
        }
    }
    
};
