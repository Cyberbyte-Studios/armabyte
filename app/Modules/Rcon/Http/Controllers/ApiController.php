<?php

namespace App\Modules\Rcon\Http\Controllers;

use Auth;
use Exception;
use Nizarii\ARC;

class ApiController
{
    protected $rcon;

    public function ping()
    {
        try {
            $rcon = $this->connect();
            $timeStart = microtime();
            $version = $rcon->getBEServerVersion();
            $timeEnd = microtime();
            $time = $timeEnd - $timeStart;
            return $this->handleSuccess($version, ['time' => $time]);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function players()
    {
        try {
            $rcon = $this->connect();
            return $this->handleSuccess($rcon->getPlayersArray());
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function bans()
    {
        try {
            $rcon = $this->connect();
            return $this->handleSuccess($rcon->getBansArray());
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function banPlayer($player, $time = 0, $reason = null)
    {
        if (empty($reason)) {
            $reason = $this->getDefaultBan();
        }
        try {
            $rcon = $this->connect();
            return $this->handleSuccess($rcon->banPlayer($player, $reason, $time));
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function addBan($player, $time = 0, $reason = null)
    {
        if (empty($reason)) {
            $reason = $this->getDefaultBan();
        }
        try {
            $rcon = $this->connect();
            return $this->handleSuccess($rcon->banPlayer($player, $reason, $time));
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function removeBan($banId)
    {
        try {
            $rcon = $this->connect();
            return $this->handleSuccess($rcon->removeBan($banId));
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function sayGlobal($message)
    {
        try {
            $rcon = $this->connect();
            return $this->handleSuccess($rcon->sayGlobal($message));
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function sayPlayer($player, $message)
    {
        try {
            $rcon = $this->connect();
            return $this->handleSuccess($rcon->sayPlayer($player, $message));
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    protected function getDefaultBan()
    {
        return 'Banned by '.Auth::getName();
    }

    protected function connect()
    {
        return new ARC('ourlegion.co.uk', 'scollins', 2326);
    }

    protected function handleSuccess($response, array $extra = [])
    {
        return array_merge(['executed' => true, 'response' => $response], $extra);
    }

    protected function handleException(Exception $exception)
    {
        return ['executed' => false, 'message' => $exception->getMessage()];
    }
}
