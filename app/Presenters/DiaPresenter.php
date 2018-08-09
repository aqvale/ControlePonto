<?php

namespace App\Presenters;

use App\Transformers\DiaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DiaPresenter.
 *
 * @package namespace App\Presenters;
 */
class DiaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DiaTransformer();
    }
}
