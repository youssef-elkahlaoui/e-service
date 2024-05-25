<?php

/**
 * Demande Model
 */
class Demand extends Model
{
    protected $allowedColumns = [
        'student_id',
        'demand_type',
        'demand_description',
        'demand_date',
        'status',
    ];
}
