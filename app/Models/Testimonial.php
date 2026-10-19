<?php

namespace App\Models;

use App\Enums\TestimonialStatus;
use Database\Factories\TestimonialFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['status', 'author_name', 'author_role', 'author_photo', 'content', 'rating', 'consent_to_publish'])]
class Testimonial extends Model
{
    /** @use HasFactory<TestimonialFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => TestimonialStatus::class,
            'rating' => 'integer',
            'consent_to_publish' => 'boolean',
        ];
    }

    #[Scope]
    protected function published(Builder $query): Builder
    {
        return $query->where('status', TestimonialStatus::Published);
    }
}
