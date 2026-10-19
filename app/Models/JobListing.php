<?php

namespace App\Models;

use Database\Factories\JobListingFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'location', 'employment_type', 'summary', 'is_open', 'sort_order'])]
class JobListing extends Model
{
    /** @use HasFactory<JobListingFactory> */
    use HasFactory;

    /**
     * @param  Builder<JobListing>  $query
     */
    #[Scope]
    protected function open(Builder $query): void
    {
        $query->where('is_open', true)->orderBy('sort_order')->orderBy('title');
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_open' => 'boolean',
        ];
    }
}
