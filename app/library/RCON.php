<?php
namespace Kepler;

class RemoteConnection
{
    public function __construct(array $options)
    {
    }

    public function getOnlineCount(): int
    {
        return 1337;
    }
}