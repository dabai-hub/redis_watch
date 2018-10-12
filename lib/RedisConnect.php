<?php
/**
 * Created by PhpStorm.
 * User: lhh
 * Date: 2018/10/12
 * Time: 14:50
 */

namespace Lib;


class RedisConnect
{
    private $_host = '';
    private $_port = 6379;
    private $_auth = '';
    private $_timeout = 5;
    public  $redis ;

    public function __construct(array $redisConf = [])
    {
        $this->_host = $redisConf['host'];
        $this->_port = isset($redisConf['port']) ? intval($redisConf['port']) : 6379;
        $this->_auth = isset($redisConf['auth']) ? $redisConf['auth'] : '';
        $this->_timeout = !isset($redisConf['_timeout'])?intval($redisConf['timeout']) : 300;
        $this->redis = new Redis();
    }

    public function redisConnect(&$msg)
    {
        //链接
        try {
            $this->redis->connect($this->_host,$this->_port, $this->_timeout);
        } catch (Exception $re) {
            $msg = $re -> getMessage();
            return null;
        }
        // 验证
        if ($this->_auth != '') {
            try {
                $this->redis->auth($this->_auth);
            } catch (Exception $re) {
                $msg = $re -> getMessage();
                return null;
            }
        }
        return $this->redis;
    }
}