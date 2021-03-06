<?php

namespace seregazhuk\tests\Helpers;

use seregazhuk\PinterestBot\Api\Response;

trait FollowResponseHelper
{
    use SetsResponse;

    /**
     * @param int $entityId
     * @param string $sourceUrl
     * @return $this
     */
    protected function setFollowErrorResponse($entityId, $sourceUrl)
    {
        $this->setFollowRequest(
            $entityId, $sourceUrl, $this->createErrorApiResponse()
        );

        return $this;
    }

    /**
     * @param int $entityId
     * @param string $sourceUrl
     * @return $this
     */
    protected function setFollowSuccessResponse($entityId, $sourceUrl)
    {
        $this->setFollowRequest(
            $entityId, $sourceUrl, $this->createSuccessApiResponse()
        );

        return $this;
    }

    /**
     * @param int $entityId
     * @param string $sourceUrl
     * @param array $response
     * @return mixed
     */
    protected function setFollowRequest($entityId, $sourceUrl, $response)
    {
        $this->requestMock
            ->shouldReceive('exec')
            ->once()
            ->withArgs([
                $sourceUrl,
                $this->provider->createFollowRequestQuery($entityId)
            ])
            ->andReturn(new Response($response));


        return $this;
    }
}
