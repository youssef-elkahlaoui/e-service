<?php 
class Devoir extends Model
{
    protected $fillable = [
        'id_etudiant',
        'sujet',
        'fichier',
        'fichier_chemin',
        'id_module',
        'description',
        'date_creation',
    ];
}