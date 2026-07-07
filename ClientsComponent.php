<?php

namespace Apps\Tms\Components\System\Api\Server\Clients;

use System\Base\BaseComponent;

class ClientsComponent extends BaseComponent
{
    protected $apiClients;

    public function initialize()
    {
        $this->apiClients = $this->api->init()->clients;
    }

    public function viewAction()
    {
        return;
    }

    public function addAction()
    {
        return;
    }

    public function updateAction()
    {
        return;
    }

    public function removeAction()
    {
        return;
    }

    public function generateClientKeysAction()
    {
        if (isset($this->checkPermissions()['update']) && $this->checkPermissions()['update'] == 0) {
            $this->addResponse('Permission Denied', 1);

            return;
        }

        $this->requestIsPost();

        $this->apiClients->generateClientKeys($this->postData());

        $this->addResponse(
            $this->apiClients->packagesData->responseMessage,
            $this->apiClients->packagesData->responseCode,
            $this->apiClients->packagesData->responseData ?? []
        );
    }
}