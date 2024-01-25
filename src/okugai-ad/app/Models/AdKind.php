<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AdKind extends Model
{
    use HasFactory;

    public function ad()
    {
        return $this->hasOne(Ad::class);
    }
}
