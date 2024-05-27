<?php

/**
 * Notification Model
 */
class Notification extends Model
{
    protected $allowedColumns = [
        'IdNotification',
        'Filiere',
        'Message',
        'DateNotification',
        'Archivé'
    ];
}
