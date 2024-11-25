<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class Image extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    protected $fillable = [
        'product_id',
        'photo_url',
    ];

    protected $appends = [
        'time_ago',
    ];

    public function getTimeAgoAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
