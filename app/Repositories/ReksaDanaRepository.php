<?php

namespace App\Repositories;

use App\Models\ReksaDana;
use App\Repositories\BaseRepository;

/**
 * Class ReksaDanaRepository
 * @package App\Repositories
 * @version May 25, 2024, 9:54 am UTC
*/

class ReksaDanaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NamaRD',
        'Jenis',
        'NAV',
        'AUM'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ReksaDana::class;
    }
}
