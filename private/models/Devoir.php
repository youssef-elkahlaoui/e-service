<?php 
class Devoir extends Model
{
    protected $fillable = [
        'id_etudiant',
        'sujet',
        'fichier',
        'fichier_chemin', // Nouvelle colonne pour le chemin du fichier
        'id_module',
        'description',
        'date_creation',
    ];
}