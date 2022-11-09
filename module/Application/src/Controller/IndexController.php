<?php

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Session\Container as SessionContainer;
use Laminas\View\Model\ViewModel;
use Laminas\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    /** @var SessionContainer */
    private $sessionContainer;

    public function __construct(SessionContainer $sessionContainer)
    {
        $this->sessionContainer = $sessionContainer;
    }

    public function indexAction()
    {
        return new ViewModel([
            'updated_at' => $this->sessionContainer->cacheStorage ?? -1
        ]);
    }

    public function updateAction()
    {
        $this->sessionContainer->cacheStorage = time();

        return $this->redirect()->toRoute('home');
    }

    public function deleteAction()
    {
        $this->sessionContainer->cacheStorage = null;

        return $this->redirect()->toRoute('home');
    }
}
