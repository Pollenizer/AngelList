<?php
/**
 * User
 *
 * PHP 5
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the below copyright notice.
 *
 * @author     Robert Love <robert@pollenizer.com>
 * @copyright  Copyright 2012, Pollenizer Pty. Ltd. (http://pollenizer.com)
 * @license    MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * AngelList
 */
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'AngelList.php';

/**
 * User
 *
 * AngelList API / Users
 *
 * @link http://angel.co/api/spec/users
 */
class User extends AngelList
{
    /**
     * Name
     *
     * @var string
     */
    public $name = 'users';

    /**
     * Batch
     *
     * Returns up to 50 users at a time, given an array of ids.
     *
     * @param array $ids
     * @return array $response
     * @link http://angel.co/api/spec/users#GET%2Fusers%2Fbatch
     */
    public function batch($ids = array())
    {
        $url = $this->endpointUrl . '/' . $this->name . '/batch?ids=' . implode(',', $ids);
        return $this->getResponse($url);
    }

    /**
     * Get
     *
     * Get a user's information given an id.
     *
     * @param int $id
     * @return array $response
     * @link http://angel.co/api/spec/users#GET%2Fusers%2F%3Aid
     */
    public function get($id = null)
    {
        $url = $this->endpointUrl . '/' . $this->name . '/' . $id;
        return $this->getResponse($url);
    }

    /**
     * Search
     *
     * Search for a user given a URL slug or md5 hash of an email address. Responds like GET /users/:id.
     *
     * @param array $parameters
     * @return array $response
     * @link http://angel.co/api/spec/users#GET%2Fusers%2Fsearch
     */
    public function search($parameters = array())
    {
        $query = http_build_query($parameters);
        $url = $this->endpointUrl . '/' . $this->name . '/search?' . $query;
        return $this->getResponse($url);
    }
}
