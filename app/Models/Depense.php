<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;

    protected $fillable = ['nom_produit', 'quantité', 'prix_unitaire', 'prix_total'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->prix_total = $model->quantité * $model->prix_unitaire;
        });
    }

    public static function depensesParDate($date)
    {
        return static::whereDate('created_at', $date)->get();
    }
}
