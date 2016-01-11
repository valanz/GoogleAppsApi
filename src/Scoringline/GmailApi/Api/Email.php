<?php

namespace Scoringline\GmailApi\Api;

use Nekland\BaseApi\Api\AbstractApi;

class Email extends AbstractApi
{
    /**
     * @var string The user account
     */
    private $user = 'me';

    /**
     * @return string
     */
    public function getUrl()
    {
        return '/gmail/v1/users/' . $this->user . '/messages';
    }

    /**
     * Get all the emails
     *
     * @param array $options
     * @return array
     */
    public function getMessages(array $options = [])
    {
        return $this->get($this->getUrl(), $options);
    }

    /**
     * Get a specific email from a given email id
     *
     * @param $id
     * @param array $options
     * @return array
     */
    public function getMessage($id, array $options = [])
    {
        return $this->get($this->getUrl() . '/' . $id, $options);
    }

    /**
     * Get a specific attachment from a given message id
     *
     * @param $id
     * @param $messageId
     * @return array
     */
    public function getAttachment($id, $messageId)
    {
        return $this->get($this->getUrl() . '/' . $messageId . '/attachments/' . $id);
    }

    /**
     * @param $user
     * @return Email
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
}
