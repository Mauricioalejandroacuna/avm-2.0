<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appreciation extends Model
{
    use HasFactory, SoftDeletes;

    public function file(): HasMany
    {
        return $this->hasMany(File::class);
    }

    public function client(): HasMany
    {
        return $this->hasMany(User::class, 'id', 'client_id');
    }

    public function commune(): HasMany
    {
        return $this->hasMany(Commune::class, 'id', 'commune_id');
    }
    public function type_asset(): HasMany
    {
        return $this->hasMany(TypeAsset::class, 'id', 'type_assets_id');
    }
}
