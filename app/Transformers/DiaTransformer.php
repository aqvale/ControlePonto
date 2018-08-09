<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Dia;

/**
 * Class DiaTransformer.
 *
 * @package namespace App\Transformers;
 */
class DiaTransformer extends TransformerAbstract
{
    /**
     * Transform the Dia entity.
     *
     * @param \App\Entities\Dia $model
     *
     * @return array
     */
    public function transform(Dia $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
