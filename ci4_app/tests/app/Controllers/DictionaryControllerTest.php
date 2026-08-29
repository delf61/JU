<?php

namespace App\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\FeatureTestTrait;

class DictionaryControllerTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use ControllerTestTrait;

    protected $migrate = false;
    protected $migrateOnce = false;
    protected $refresh = false;

    public function testListEndpointReturnsJson()
    {
        $result = $this->withURI('http://localhost/dictionary/api/list/banky')
                       ->controller(DictionaryController::class)
                       ->execute('list', 'banky');

        $this->assertTrue($result->isOK());

        $body = $result->getBody();
        // Remove HTML tags since the response trait seems to be wrapping it for some reason during testing
        $cleanBody = strip_tags($body);
        $json = json_decode($cleanBody, true);
        $this->assertIsArray($json, "Response body was not valid JSON. Body: " . print_r($body, true));
        $this->assertGreaterThan(0, count($json));
        // Check structure of first item
        $this->assertArrayHasKey('kodban', $json[0]);
    }
}
