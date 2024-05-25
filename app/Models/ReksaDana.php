<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



/**
 * Class ReksaDana
 * @package App\Models
 * @version May 25, 2024, 9:54 am UTC
 *
 * @property string $NamaRD
 * @property string $Jenis
 * @property integer $NAV
 * @property integer $AUM
 */
class ReksaDana extends Model
{


    public $table = 'tb_reksadana';
    



    public $fillable = [
        'NamaRD',
        'Jenis',
        'NAV',
        'AUM'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'NamaRD' => 'string',
        'Jenis' => 'string',
        'NAV' => 'integer',
        'AUM' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
