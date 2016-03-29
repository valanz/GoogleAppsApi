<?php

namespace Scoringline\GoogleAppsApi\Api;

use Nekland\BaseApi\Api\AbstractApi;
use Scoringline\GoogleAppsApi\Transformer\RawTransformer;

class Drive extends AbstractApi
{
    /**
     * @return string
     */
    public function getUrl()
    {
        return '/drive/v3/files/';
    }

    /**
     * Get all the files
     * @link https://developers.google.com/drive/v2/reference/files/list
     *
     * @param array $options
     * @return array
     */
    public function getFiles(array $options = [])
    {
        return $this->get($this->getUrl(), $options);
    }

    /**
     * Get a specific file
     * @link https://developers.google.com/drive/v2/reference/files/get
     *
     * @param string $fileId
     * @param array $options
     * @return array
     */
    public function getFile($fileId, array $options = [])
    {
        return $this->get($this->getUrl() . $fileId, $options);
    }

    /**
     * Watch a file
     * @link https://developers.google.com/drive/v2/reference/files/watch
     *
     * @param string $fileId
     * @param array $options
     * @return array
     */
    public function watchFile($fileId, array $options = [])
    {
        return $this->get($this->getUrl() . $fileId . '/watch', $options);
    }

    /**
     * Copy a file
     * @link https://developers.google.com/drive/v2/reference/files/copy
     *
     * @param string $fileId
     * @param array $options
     * @return array
     */
    public function copyFile($fileId, array $options = [])
    {
        return $this->post(
            $this->getUrl() . $fileId . '/copy',
            json_encode($options, JSON_UNESCAPED_SLASHES),
            ['Content-Type' => 'application/json']
        );
    }

    /**
     * Upload a file
     * @link https://developers.google.com/drive/v2/reference/files/insert
     *
     * @param string $file
     * @param array $options
     * @return array
     */
    public function uploadFile($file, array $options = [])
    {
        return $this->post('/upload' . $this->getUrl(), $file, $options);
    }

    /**
     * Update a specific file
     * @link https://developers.google.com/drive/v2/reference/files/update
     *
     * @param string $fileId
     * @param array $options
     * @return array
     */
    public function updateFile($fileId, array $options = [])
    {
        return $this->get('/upload' . $this->getUrl() . $fileId, $options);
    }

    /**
     * Export a specific file
     * @link https://developers.google.com/drive/v3/reference/files/export
     *
     * @param string $fileId
     * @param array $options
     * @return array
     */
    public function exportFile($fileId, array $options = [])
    {
        $this->setTransformer(new RawTransformer());

        return $this->get($this->getUrl() . $fileId . '/export', $options);
    }
}
