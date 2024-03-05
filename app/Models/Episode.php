<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $table = 'episodes';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description','episode_number', 'tab_name', 'tab_url', 'series_id'];

    public function anime()
    {
        return $this->belongsTo(Series::class, 'series_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function previousEpisode()
    {
        return self::where('series_id', $this->series_id)
            ->where('episode_number', '<', $this->episode_number)
            ->orderBy('episode_number', 'desc')
            ->first();
    }

    /**
     * Returnează episodul următor
     *
     * @return Episode|null
     */
    public function nextEpisode()
    {
        return self::where('series_id', $this->series_id)
            ->where('episode_number', '>', $this->episode_number)
            ->orderBy('episode_number', 'asc')
            ->first();
    }
}
