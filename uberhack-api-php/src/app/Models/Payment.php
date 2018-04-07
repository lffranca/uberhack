<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const STATE_CREATED = 0;
    const STATE_APPROVED = 1;
    const STATE_FAILED = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];


    protected static function boot()
    {
        parent::boot();

        // Assert to always create payment as CREATED
        static::creating(function (Payment $model) {
            $model->state = self::STATE_CREATED;
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function payable() {
        return $this->morphTo();
    }
}
