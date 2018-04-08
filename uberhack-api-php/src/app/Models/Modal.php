<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modal_lines()
    {
        return $this->hasMany(ModalLine::class);
    }
}
