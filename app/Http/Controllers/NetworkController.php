<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\NetworkService;
use Exception;

class NetworkController extends Controller
{
    protected $networkService;

    public function __construct(NetworkService $networkService)
    {
        $this->networkService = $networkService;
    }

    /**
     * Get all networks.
     */
    public function index()
    {
        try {
            $networks = $this->networkService->getAllNetworks();
            return ApiResponseService::successResponse($networks, 'All networks retrieved successfully.');
        } catch (Exception $e) {
            return ApiResponseService::handleUnexpectedError($e);
        }
    }

    /**
     * Get only mainnets.
     */
    public function mainnets()
    {
        try {
            $mainnets = $this->networkService->getMainnets();
            return ApiResponseService::successResponse($mainnets, 'Mainnet networks retrieved successfully.');
        } catch (Exception $e) {
            return ApiResponseService::handleUnexpectedError($e);
        }
    }

    /**
     * Get only testnets.
     */
    public function testnets()
    {
        try {
            $testnets = $this->networkService->getTestnets();
            return ApiResponseService::successResponse($testnets, 'Testnet networks retrieved successfully.');
        } catch (Exception $e) {
            return ApiResponseService::handleUnexpectedError($e);
        }
    }

    /**
     * Get a network by chainId.
     */
    public function show($chainId)
    {
        try {
            $network = $this->networkService->getByChainId($chainId);

            if (!$network) {
                return ApiResponseService::errorResponse('Network not found.', 404);
            }

            return ApiResponseService::successResponse($network, 'Network retrieved successfully.');
        } catch (Exception $e) {
            return ApiResponseService::handleUnexpectedError($e);
        }
    }
}
