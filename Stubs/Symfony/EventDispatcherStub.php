<?php declare(strict_types=1);

namespace RichCongress\TestTools\Stubs\Symfony;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class EventDispatcherStub
 *
 * @package   RichCongress\TestTools\Stubs\Symfony
 * @author    Nicolas Guilloux <nguilloux@richcongress.com>
 * @copyright 2014 - 2020 RichCongress (https://www.richcongress.com)
 */
class EventDispatcherStub implements EventDispatcherInterface
{
    /**
     * @var array
     */
    public $events = [];

    /**
     * @param object|string        $event
     * @param object|string|null   $eventName
     *
     * @return object
     */
    public function dispatch($event, $eventName = null): object
    {
        if (\is_string($event) && \is_object($eventName)) {
            return $this->dispatch($eventName, $event);
        }

        $this->events[] = $event;

        return $event;
    }

    /** Other functions required for the interface */

    /**
     * @inheritDoc
     *
     * @codeCoverageIgnore
     */
    public function addListener($eventName, $listener, $priority = 0): void
    {
    }

    /**
     * @inheritDoc
     *
     * @codeCoverageIgnore
     */
    public function addSubscriber(EventSubscriberInterface $subscriber): void
    {
    }

    /**
     * @inheritDoc
     *
     * @codeCoverageIgnore
     */
    public function removeListener($eventName, $listener): void
    {
    }

    /**
     * @inheritDoc
     *
     * @codeCoverageIgnore
     */
    public function removeSubscriber(EventSubscriberInterface $subscriber): void
    {
    }

    /**
     * @inheritDoc
     *
     * @codeCoverageIgnore
     */
    public function getListeners($eventName = null): array
    {
        return [];
    }

    /**
     * @inheritDoc
     *
     * @codeCoverageIgnore
     */
    public function getListenerPriority($eventName, $listener): ?int
    {
        return null;
    }

    /**
     * @inheritDoc
     *
     * @codeCoverageIgnore
     */
    public function hasListeners($eventName = null): bool
    {
        return false;
    }
}
