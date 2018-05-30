<?php
namespace Kepler;

use \Phalcon\Di\Injectable as Injectable;

abstract class RCONRequestID
{
    const OnlineCount = 1;
    const RefreshAppearance = 2;
    const RefreshBadges = 3;
    const HotelAlert = 99;
    const RoomAlert = 100;
}

class RemoteConnection extends Injectable
{
    private $_connection = false;

    public function __construct(array $options)
    {
        // TODO: validate host and port?
        $this->_host = $options['host'];
        $this->_port = $options['port'];
        $this->_ttl = $options['ttl'];
    }

    private function _connect()
    {
        $this->_connection = fsockopen($this->_host, $this->_port);

        if (!!$this->_connection) {
            stream_set_timeout($this->_connection, 0, 10 * 1000); // 10ms in microseconds
        }

        return $this->_connection;
    }

    function __destruct()
    {
        if (!$this->_connection) {
            return;
        }

        fclose($this->_connection);
    }

    public function getOnlineCount(): int
    {
        /*$cachedCount = $this->cache->get('online-count');

        if ($cachedCount !== NULL) {
            return $cachedCount;
        }

        if ($this->_connect() === false) {
            return 0;
        }

        fwrite($this->_connection, RCONRequestID::OnlineCount);
        $onlineCount = intval(fgets($this->_connection, 10));

        $this->cache->save('online-count', $onlineCount, $this->_ttl);

        return $onlineCount;*/
        return 3;
    }

    public function ping(): bool
    {
        /*$cachedPing = $this->cache->get('emulator-ping');

        if ($cachedPing !== NULL) {
            return $cachedPing;
        }

        $online = $this->_connect() !== false;
        $this->cache->save('emulator-ping', $online, $this->_ttl);

        return $online;*/
        return true;
    }

    public function refreshLook(int $user_id)
    {
        if ($this->_connect() === false) {
            return;
        }

        fwrite($this->_connection, RCONRequestID::RefreshAppearance . $user_id);
    }

    public function refreshBadges(int $user_id)
    {
        if ($this->_connect() === false) {
            return;
        }

        fwrite($this->_connection, RCONRequestID::RefreshBadges . $user_id);
    }

    public function sendAlert(string $message): bool
    {
        return false;
    }
}
