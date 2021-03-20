<?php

namespace adamCameron\serviceOnlyContainers\test\functional;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

/** @testdox PHP config tests */
class PhpTest extends TestCase
{
    /**
     * @testdox test.php outputs G'day world
     * @coversNothing
     */
    public function testGdayWorldPhpReturnsExpectedContent()
    {
        $client = new Client([
            'base_uri' => 'http://service-only-containers.adam-cameron/'
        ]);

        $response = $client->get('test.php');

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());

        $content = $response->getBody()->getContents();

        $this->assertSame("G'day world", $content);
    }
}
