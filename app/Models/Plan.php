<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public const PENDENTE = 'pendente';
    public const EM_REVISAO = 'em revisão';
    public const AGUARDA_PAGAMENTO = 'aguarda pagamento';
    public const CONCLUIDO = 'concluído';
    public const CANCELADO = 'cancelado';

    protected $table = 'plans';

    protected $fillable = [
        'user_id',
        'name',
        'birth_date',
        'email',
        'phone',
        'estimated_value',
        'ceremony_type',
        'location',
        'religion',
        'services',
        'extras',
        'contacts',
        'final_observations',
        'status',
        'is_paid',
        'final_value',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'services' => 'array',
        'extras' => 'array',
        'contacts' => 'array',
        'is_paid' => 'boolean',
    ];
}
