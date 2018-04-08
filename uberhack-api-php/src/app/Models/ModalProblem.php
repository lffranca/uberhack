<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModalProblem extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modal()
    {
        return $this->belongsTo(Modal::class);
    }
}
