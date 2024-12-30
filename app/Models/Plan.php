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

    /**
     * Retorna os serviços disponíveis.
     *
     * @return array
     */
    public static function additionalServices()
    {
        return [
            'convivio_7_dia' => __('Convívio do 7º Dia'),
            'caminhada_comemorativa' => __('Caminhada Comemorativa'),
            'plantacao_arvore' => __('Plantação de Árvore em Memória'),
            'transmissao_vivo' => __('Transmissão ao Vivo'),
            'homenagem_musical' => __('Homenagem Musical'),
            'discurso_personalizado' => __('Discurso Personalizado'),
            'lanterna_ceu' => __('Lanterna para o Céu'),
            'fotografia_memorial' => __('Fotografia Memorial'),
            'video_comemorativo' => __('Vídeo Comemorativo'),
            'livro_memorias' => __('Livro de Memórias'),
        ];
    }

    /**
     * Retorna os extras disponíveis.
     *
     * @return array
     */
    public static function extras()
    {
        return [
            'flores' => __('Flores'),
            'padlet' => __('Padlet de Mensagens'),
            'velas_memoria' => __('Velas de Memória'),
            'mensagem_video' => __('Mensagem em Vídeo'),
            'banco_memorial' => __('Banco Memorial'),
            'caixinha_memorias' => __('Caixinha de Memórias'),
            'pulseira_memorial' => __('Pulseira Memorial'),
            'quadro_fotos' => __('Quadro de Fotos'),
            'colagem_fotos' => __('Colagem de Fotos'),
            'arvore_memorial' => __('Árvore Memorial'),
            'album_digital' => __('Álbum Digital'),
            'lancamento_fogos' => __('Lançamento de Fogos'),
            'musica_especial' => __('Música Especial'),
            'livro_condolencias' => __('Livro de Condolências'),
            'caixa_cinzas_personalizada' => __('Caixa de Cinzas Personalizada'),
        ];
    }
}
