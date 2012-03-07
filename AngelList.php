<?php
/**
 * AngelList
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
 *
 * AngelList API
 *
 * @link http://angel.co/api
 */
class AngelList
{
    /**
     * Endpoint URL
     *
     * @var string
     */
    public $endpointUrl = 'https://api.angel.co/1';

    /**
     * Get Response
     *
     * Returns a response for an API request
     *
     * @param string $url
     * @return array $response
     */
    public function getResponse($url)
    {
        $response = array();
        if ($json = file_get_contents($url)) {
            if ($response = json_decode($json, true)) {
                return $response;
            }
        }
        return $response;
    }
}
