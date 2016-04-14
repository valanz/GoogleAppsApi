<?php

namespace Scoringline\GoogleAppsApi\Api;

use Nekland\BaseApi\Api\AbstractApi;

class Gmail extends AbstractApi
{
    const LABEL_UNREAD = 'UNREAD';
    const LABEL_INBOX = 'INBOX';
    const LABEL_IMPORTANT = 'IMPORTANT';
    const LABEL_SPAM = 'SPAM';

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
     * Modify labels on a given email
     *
     * @param $id
     * @param array $options
     * @return array
     */
    public function modifyMessage($id, array $options = [])
    {
        return $this->post(
            $this->getUrl() . '/' . $id . '/modify',
            json_encode($options),
            ['Content-Type' => 'application/json']
        );
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
     * @return Gmail
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabels()
    {
        return $this->get('/gmail/v1/users/' . $this->user . '/labels');
    }
}
