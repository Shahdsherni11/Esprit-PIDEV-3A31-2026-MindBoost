<?php

namespace App\EventSubscriber;

use App\Service\UserSessionService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class AdminAccessSubscriber implements EventSubscriberInterface
{
    public function __construct(private UserSessionService $userSessionService)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();
        $this->userSessionService->bootstrap($request);

        $path = $request->getPathInfo();
        $needsAdmin = str_starts_with($path, '/admin')
            || str_starts_with($path, '/tests/general')
            || str_starts_with($path, '/tests/specific')
            || str_starts_with($path, '/lifecycle');

        if ($needsAdmin && !$this->userSessionService->isAdmin($request)) {
            $event->setResponse(new RedirectResponse('/user'));
        }
    }
}
