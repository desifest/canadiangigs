<?php

namespace Google\Site_Kit_Dependencies\GuzzleHttp\Event;

use Google\Site_Kit_Dependencies\GuzzleHttp\Exception\RequestException;
/**
 * Event emitted when an error occurs while sending a request.
 *
 * This event MAY be emitted multiple times. You MAY intercept the exception
 * and inject a response into the event to rescue the request using the
 * intercept() method of the event.
 *
 * This event allows the request to be retried using the "retry" method of the
 * event.
 */
class ErrorEvent extends \Google\Site_Kit_Dependencies\GuzzleHttp\Event\AbstractRetryableEvent
{
    /**
     * Get the exception that was encountered
     *
     * @return RequestException
     */
    public function getException()
    {
        return $this->transaction->exception;
    }
}
