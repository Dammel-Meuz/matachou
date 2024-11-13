<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'email',
        'phone',
        'adresse',
    ];

    // Relation hasMany avec les commandes
    public function commandes(): HasMany
    {
        return $this->hasMany(Commande::class);
    }
}
