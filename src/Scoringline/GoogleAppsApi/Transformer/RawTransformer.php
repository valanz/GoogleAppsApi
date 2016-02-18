<?php

namespace Scoringline\GoogleAppsApi\Transformer;

use Nekland\BaseApi\Transformer\TransformerInterface;

class RawTransformer implements TransformerInterface
{
    /**
     * @param  string $data
     * @param  string $type Type of data that is sent
     * @return mixed
     */
    public function transform($data, $type = self::UNKNOWN)
    {
        return $data;
    }
}
