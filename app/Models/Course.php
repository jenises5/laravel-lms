<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'content',
        'instructor_id',
    ];

    /**
     * Get the instructor (User) who owns the course
     */
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    /**
     * Get the bookmarks for this course
     */
    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class);
    }

    /**
     * Check if this course is bookmarked by a specific user
     */
    public function isBookmarkedBy(int $userId): bool
    {
        return $this->bookmarks()->where('user_id', $userId)->exists();
    }

    /**
     * Check if this course is marked completed by a specific user
     */
    public function isCompletedBy(int $userId): bool
    {
        return $this->bookmarks()
                    ->where('user_id', $userId)
                    ->where('completed', true)
                    ->exists();
    }
}
