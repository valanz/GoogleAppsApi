<?php declare(strict_types=1);
namespace Vmnrd\GoogleAppsApi\Transformer;

use Nekland\BaseApi\Transformer\TransformerInterface;

class RawTransformer implements TransformerInterface
{
    /**
     * @param  string $data
     * @param  string $type Type of data that is sent
     * @return mixed
     */
    public function transform($data, $type = TransformerInterface::UNKNOWN)
    {
        return $data;
    }
}
