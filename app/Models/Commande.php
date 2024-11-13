<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Commande extends Model
{
    use HasFactory;

    const ETAT_EN_ATTENTE = 'en attente';
    const ETAT_EN_COURS = 'en cours';
    const ETAT_LIVRE = 'livré';

    protected $fillable = [
        'client_id',
        'prix_total',
        'etat',
        'adresse_livraison',
    ];

    // Relation avec le client
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    // Relation many-to-many avec la table articles
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'commande_article')
                    ->withPivot('quantite')
                    ->withTimestamps();
    }

    // Méthode pour mettre à jour l'état de la commande
    public function setEtat($etat)
    {
        $this->etat = $etat;
        $this->save();
    }

    // Indique qu'une commande peut avoir plusieurs livreurs
    public function livreurs()
    {
        return $this->belongsTo(Livreur::class);
    }
}
