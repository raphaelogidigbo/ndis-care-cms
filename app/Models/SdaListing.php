<?php

namespace App\Models;

use App\Enums\SdaDesignCategory;
use App\Enums\SdaListingStatus;
use Database\Factories\SdaListingFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'suburb', 'address', 'design_category', 'bedrooms', 'bathrooms', 'status', 'image', 'summary', 'is_published', 'sort_order'])]
class SdaListing extends Model
{
    /** @use HasFactory<SdaListingFactory> */
    use HasFactory;

    /**
     * @param  Builder<SdaListing>  $query
     */
    #[Scope]
    protected function published(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    /**
     * @param  Builder<SdaListing>  $query
     */
    #[Scope]
    protected function ordered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('title');
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'design_category' => SdaDesignCategory::class,
            'status' => SdaListingStatus::class,
            'bedrooms' => 'integer',
            'bathrooms' => 'integer',
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
