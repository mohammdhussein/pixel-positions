<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'salary', 'location', 'schedule', 'url', 'featured'];

    protected function casts(): array
    {
        return [
            'featured' => 'boolean',
        ];
    }

    public function tag(string $name): void
    {
        $tag = Tag::firstOrCreate(['name' => $name]);
        $this->tags()->attach($tag);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function getViewOrEditUrlAttribute()
    {
        return auth()->check() && auth()->user()->employer->id === $this->employer->id
            ? route('jobs.edit', $this)
            : $this->url;
    }

}
