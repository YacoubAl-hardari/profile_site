<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use IbrahimBougaoua\FilamentSortOrder\Traits\SortOrder;

class AddingScript extends Model
{
    use HasFactory,SortOrder;
    protected $table = "adding_scripts";
    protected $fillable = ['name','script','status'];
}
