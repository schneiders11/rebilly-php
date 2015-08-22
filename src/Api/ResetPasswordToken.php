<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Api;

use ArrayObject;
use Rebilly\Client;
use Rebilly\Resource\Entity;
use Rebilly\Resource\Collection;

/**
 * Class ResetPasswordToken.
 *
 * ```json
 * {
 *   "token"
 *   "username"
 *   "password"
 *   "expiredAt"
 * }
 * ```
 *
 * @todo Make time properties consistent, rename `expiredAt` to `expiredTime`
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class ResetPasswordToken extends Entity
{
    /********************************************************************************
     * Resource Getters and Setters
     *******************************************************************************/

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getToken();
    }

    /**
     * {@inheritdoc}
     */
    public function setId($value)
    {
        return $this->setToken($value);
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->getAttribute('token');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setToken($value)
    {
        return $this->setAttribute('token', $value);
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->getAttribute('username');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setUsername($value)
    {
        return $this->setAttribute('username', $value);
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->getAttribute('password');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPassword($value)
    {
        return $this->setAttribute('password', $value);
    }

    /**
     * @return string
     */
    public function getExpiredTime()
    {
        return $this->getAttribute('expiredAt');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExpiredTime($value)
    {
        return $this->setAttribute('expiredAt', $value);
    }

    /********************************************************************************
     * Reset Password Token API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @param array|ArrayObject $params
     *
     * @return ResetPasswordToken[]|Collection
     */
    public static function search($params = [])
    {
        return Client::get('password-tokens', $params);
    }

    /**
     * Facade for client command
     *
     * @param string $token
     * @param array|ArrayObject $params
     *
     * @return ResetPasswordToken
     */
    public static function load($token, $params = [])
    {
        $params['token'] = $token;

        return Client::get('password-tokens/{token}', $params);
    }

    /**
     * Facade for client command
     *
     * @param array|ResetPasswordToken $data
     * @param string $token
     *
     * @return ResetPasswordToken
     */
    public static function create($data, $token = null)
    {
        if (isset($token)) {
            return Client::put($data, 'password-tokens/{token}', ['token' => $token]);
        } else {
            return Client::post($data, 'password-tokens');
        }
    }
}