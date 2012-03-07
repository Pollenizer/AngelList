<?php
/**
 * Startup
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
 * Startup
 *
 * AngelList API / Startups
 *
 * @link http://angel.co/api/spec/startups
 */
class Startup extends AngelList
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
     * Returns up to 50 startups at a time, given an array of ids.
     *
     * @param array $ids
     * @return array $response
     * @link http://angel.co/api/spec/startups#GET%2Fstartups%2Fbatch
     */
    public function batch($ids = array())
    {
        $url = $this->endpointUrl . '/' . $this->name . '/batch?ids=' . implode(',', $ids);
        return $this->getResponse($url);
    }

    /**
     * Get
     *
     * Get a startup's information given an id.
     *
     * @param int $id
     * @return array $response
     * @link http://angel.co/api/spec/startups#GET%2Fstartups%2F%3Aid
     */
    public function get($id = null)
    {
        $url = $this->endpointUrl . '/' . $this->name . '/' . $id;
        return $this->getResponse($url);
    }

    /**
     * Search
     *
     * Search for a startup given a URL slug. Responds like GET /startups/:id.
     *
     * @param array $parameters
     * @return array $response
     * @link http://angel.co/api/spec/startups#GET%2Fstartups%2Fsearch
     */
    public function search($parameters = array())
    {
        $query = http_build_query($parameters);
        $url = $this->endpointUrl . '/' . $this->name . '/search?' . $query;
        return $this->getResponse($url);
    }
}
