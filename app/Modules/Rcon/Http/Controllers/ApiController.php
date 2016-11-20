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
            return $rcon->getBEServerVersion();
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function players()
    {
        try {
            $rcon = $this->connect();
            return $rcon->getPlayersArray();
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function bans()
    {
        try {
            $rcon = $this->connect();
            return $rcon->getBansArray();
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
            return $rcon->banPlayer($player, $reason, $time);
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
            return $rcon->banPlayer($player, $reason, $time);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function removeBan($banId)
    {
        try {
            $rcon = $this->connect();
            return $rcon->removeBan($banId);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function sayGlobal($message)
    {
        try {
            $rcon = $this->connect();
            return $rcon->sayGlobal($message);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function sayPlayer($player, $message)
    {
        try {
            $rcon = $this->connect();
            return $rcon->sayPlayer($player, $message);
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
        return new ARC('127.0.0.1', 'password');
    }

    protected function handleSuccess($response)
    {
        return ['executed' => false, 'response' => $response];
    }

    protected function handleException(Exception $exception)
    {
        return ['executed' => false, 'message' => $exception->getMessage()];
    }
}
