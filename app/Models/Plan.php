<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use CrudTrait;
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
        'annual_fee',
        'annual_fee_paid',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'services' => 'array',
        'extras' => 'array',
        'contacts' => 'array',
        'is_paid' => 'boolean',
        'annual_fee' => 'decimal:2',
        'annual_fee_paid' => 'boolean',
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
     * Retorna os preços dos serviços.
     *
     * @return array
     */
    public static function servicePrices()
    {
        return [
            'convivio_7_dia' => 1000,
            'caminhada_comemorativa' => 500,
            'plantacao_arvore' => 200,
            'transmissao_vivo' => 300,
            'homenagem_musical' => 400,
            'discurso_personalizado' => 500,
            'lanterna_ceu' => 200,
            'fotografia_memorial' => 300,
            'video_comemorativo' => 400,
            'livro_memorias' => 500,
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

    /**
     * Retorna os preços dos extras.
     *
     * @return array
     */
    public static function extraPrices()
    {
        return [
            'flores' => 200,
            'padlet' => 150,
            'velas_memoria' => 150,
            'mensagem_video' => 275,
            'banco_memorial' => 350,
            'caixinha_memorias' => 225,
            'pulseira_memorial' => 120,
            'quadro_fotos' => 300,
            'colagem_fotos' => 140,
            'arvore_memorial' => 500,
            'album_digital' => 250,
            'lancamento_fogos' => 500,
            'musica_especial' => 300,
            'livro_condolencias' => 100,
            'caixa_cinzas_personalizada' => 500,
        ];
    }

    /**
     * Retorna os tipos de cerimónia disponíveis.
     *
     * @return array
     */
    public static function ceremonyTypes(): array
    {
        return [
            0 => 'Enterro',
            1 => 'Cremação',
            2 => 'Outro',
        ];
    }

    /**
     * Retorna a label legível do tipo de cerimónia.
     */
    public function getCeremonyTypeLabel(): string
    {
        return self::ceremonyTypes()[$this->ceremony_type] ?? 'Desconhecido';
    }
}
