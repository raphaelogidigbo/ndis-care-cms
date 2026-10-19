<?php

namespace App\Models\Concerns;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Records created/updated/deleted events to the activity_logs table
 * so admin actions on sensitive records are auditable.
 */
trait LogsActivity
{
    public static function bootLogsActivity(): void
    {
        static::created(fn (Model $model) => static::logActivity($model, 'created'));
        static::updated(fn (Model $model) => static::logActivity($model, 'updated'));
        static::deleted(fn (Model $model) => static::logActivity($model, 'deleted'));
    }

    protected static function logActivity(Model $model, string $action): void
    {
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => $action,
            'subject_type' => $model->getMorphClass(),
            'subject_id' => $model->getKey(),
            'subject_label' => static::activitySubjectLabel($model),
            'properties' => $action === 'updated' ? $model->getChanges() : null,
            'ip' => app()->runningInConsole() ? null : request()?->ip(),
        ]);
    }

    protected static function activitySubjectLabel(Model $model): string
    {
        return (string) ($model->title ?? $model->name ?? $model->email ?? $model->getKey());
    }
}
