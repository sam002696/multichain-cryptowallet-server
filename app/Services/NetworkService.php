<?php

namespace App\Services;

use App\Models\Network;

class NetworkService
{
    public function getAllNetworks()
    {
        return Network::all();
    }

    public function getMainnets()
    {
        return Network::where('isTestnet', false)->get();
    }

    public function getTestnets()
    {
        return Network::where('isTestnet', true)->get();
    }

    public function getByChainId($chainId)
    {
        return Network::where('chainId', intval($chainId))->first();
    }
}
