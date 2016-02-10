<?php
namespace tests;

include __DIR__ . '/../vendor/autoload.php';

use Zoom\UserClient;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testAutoCreate_mock_successful()
    {
        // Arrange:
        $userClient = $this->getUserClient();
        $mockBody = Stream::factory(json_encode([
            'email' => 'test@abc.com',
            'id' => 'dsfs23css23',
            'created_at' => '2012-11-25T12:00:00Z',
            'first_name' => 'Lucy',
            'last_name' => 'Li',
            'disable_chat' => false,
            'enable_e2e_encryption' => false,
            'pic_url' => '',
            'type' => 1,
            'enable_silent_mode' => true,
            'disable_group_hd' => false,
            'disable_recording' => false,
            'enable_cmr' => false,
            'enable_auto_recording' => false,
            'enable_cloud_auto_recording' => false,
            'verified' => 1,
            'pmi' => 2035134243,
            'meeting_capacity' => 0,
            'enable_webinar' => true,
            'webinar_capacity' => 100,
            'enable_large' => false,
            'large_capacity' => 0,
            'disable_feedback' => false,
            'disable_jbh_reminder' => true,
            'dept' => 'Engineer',
            'token' => ''
        ]));
        $mock = new Mock([
            new Response(200, [], $mockBody),
        ]);
        $userClient->getHttpClient()->getEmitter()->attach($mock);

        // Act:
        $result = $userClient->autoCreate([
            'email' => 'test@abc.com',
            'password' => 'abc123',
        ]);

        // Assert:
        $this->assertEquals(
            200,
            $result['statusCode'],
            'Failed to receive expected HTTP status code from mocked API call.'
        );
        $this->assertEquals(
            'test@abc.com',
            $result['email'],
            'Failed to receive expected email address from mocked API call.'
        );
        $this->assertNotFalse(
            strtotime($result['created_at']),
            'Failed to receive valid created_at string from mocked API call.'
        );
    }

    public function testAutoCreate_mock_userAlreadyExists()
    {
        // Arrange:
        $userClient = $this->getUserClient();
        $mockBody = Stream::factory(json_encode([
            'error' => [
                'code' => 1000,
                'message' => 'User already in the account: test@abc.com',
            ]
        ]));
        $mock = new Mock([
            new Response(200, [], $mockBody),
        ]);
        $userClient->getHttpClient()->getEmitter()->attach($mock);

        // Act:
        $result = $userClient->autoCreate([
            'email' => 'test@abc.com',
            'password' => 'abc123',
        ]);

        // Assert:
        $this->assertEquals(
            200,
            $result['statusCode'],
            'Failed to receive expected HTTP status code from mocked API call: '
            . json_encode($result)
        );
        $this->assertArrayHasKey(
            'error',
            $result,
            'Failed to receive error when asking mock for non-existent user: '
            . json_encode($result)
        );
        $this->assertArrayHasKey(
            'code',
            $result['error'],
            'Failed to receive expected error format from mocked API call (no '
            . '"code" field was found): '
            . json_encode($result)
        );
        $this->assertEquals(
            1000,
            $result['error']['code'],
            'Received unexpected mocked error code for non-existent user.'
        );
    }

    public function testDelete_mock_success()
    {
        // Arrange:
        $userClient = $this->getUserClient();
        $mockBody = Stream::factory(json_encode([
            'id' => '65q23kd9sqliy612h23k',
            'account_id' => '562q23kd9sqliy612h78k',
            'deleted_at' => '2012-11-25T12:00:00Z',
        ]));
        $mock = new Mock([
            new Response(200, [], $mockBody),
        ]);
        $userClient->getHttpClient()->getEmitter()->attach($mock);

        // Act:
        $result = $userClient->delete([
            'id' => '65q23kd9sqliy612h23k',
        ]);

        // Assert:
        $this->assertEquals(
            200,
            $result['statusCode'],
            'Failed to receive expected HTTP status code from mocked API call.'
        );
        $this->assertEquals(
            '65q23kd9sqliy612h23k',
            $result['id'],
            'Failed to receive expected id from mocked API call.'
        );
        $this->assertNotFalse(
            strtotime($result['deleted_at']),
            'Failed to receive valid deleted_at string from mocked API call.'
        );
    }

    public function testDelete_mock_noSuchUser()
    {
        // Arrange:
        $userClient = $this->getUserClient();
        $mockBody = Stream::factory(json_encode([
            'error' => [
                'code' => 1001,
                'message' => 'User not exist: 65q23kd9sqliy612h23k',
            ],
        ]));
        $mock = new Mock([
            new Response(200, [], $mockBody),
        ]);
        $userClient->getHttpClient()->getEmitter()->attach($mock);

        // Act:
        $result = $userClient->delete([
            'id' => '65q23kd9sqliy612h23k',
        ]);

        // Assert:
        $this->assertEquals(
            200,
            $result['statusCode'],
            'Failed to receive expected HTTP status code from mocked API call: '
            . json_encode($result)
        );
        $this->assertArrayHasKey(
            'error',
            $result,
            'Failed to receive error when asking mock to delete a non-existent '
            . 'user: '
            . json_encode($result)
        );
        $this->assertArrayHasKey(
            'code',
            $result['error'],
            'Failed to receive expected error format from mocked API call (no '
            . '"code" field was found): '
            . json_encode($result)
        );
        $this->assertEquals(
            1001,
            $result['error']['code'],
            'Received unexpected mocked error code for deleting a non-existent '
            . 'user.'
        );
    }

    public function testGet_mock()
    {
        // Arrange:
        $userClient = $this->getUserClient();
        $mockBody = Stream::factory(json_encode([
            'email' => 'test@abc.com',
            'id' => 'dsfs23css23',
            'account_id' => '8af3444232345',
            'created_at' => '2012-11-25T12:00:00Z',
            'first_name' => 'Lucy',
            'last_name' => 'Li',
            'type' => 1,
            'pic_url' => 'https://www.zoom.us/p/bNsPi',
            'disable_chat' => false,
            'enable_e2e_encryption' => false,
            'enable_silent_mode' => true,
            'disable_group_hd' => false,
            'disable_recording' => false,
            'enable_cmr' => false,
            'enable_auto_recording' => false,
            'enable_cloud_auto_recording' => false,
            'verified' => 1,
            'pmi' => 2035134243,
            'meeting_capacity' => 0,
            'enable_webinar' => true,
            'webinar_capacity' => 100,
            'enable_large' => false,
            'large_capacity' => 0,
            'disable_feedback' => false,
            'disable_jbh_reminder' => true,
            'dept' => 'Engineer',
            'timezone' => 'America/Los_Angeles',
            'token' => 'adlfjadslfkjasdkljfkjalkadfskjdsafkjdfsajkllajsdfaljsdf'
        ]));
        $mock = new Mock([
            new Response(200, [], $mockBody),
        ]);
        $userClient->getHttpClient()->getEmitter()->attach($mock);

        // Act:
        $result = $userClient->get([
            'id' => 'dsfs23css23',
        ]);

        // Assert:
        $this->assertEquals(
            200,
            $result['statusCode'],
            'Failed to receive expected HTTP status code from mocked API call.'
        );
        $this->assertEquals(
            'dsfs23css23',
            $result['id'],
            'Failed to receive expected id from mocked API call.'
        );
        $this->assertNotFalse(
            strtotime($result['created_at']),
            'Failed to receive valid created_at string from mocked API call.'
        );
    }

    public function testGetByEmail_mock()
    {
        // Arrange:
        $userClient = $this->getUserClient();
        $mockBody = Stream::factory(json_encode([
            'email' => 'test@abc.com',
            'id' => 'dsfs23css23',
            'account_id' => '8af3444232345',
            'created_at' => '2012-11-25T12:00:00Z',
            'first_name' => 'Lucy',
            'last_name' => 'Li',
            'type' => 1,
            'pic_url' => 'https://www.zoom.us/p/bNsPi',
            'disable_chat' => false,
            'enable_e2e_encryption' => false,
            'enable_silent_mode' => true,
            'disable_group_hd' => false,
            'disable_recording' => false,
            'enable_cmr' => false,
            'enable_auto_recording' => false,
            'enable_cloud_auto_recording' => false,
            'verified' => 1,
            'pmi' => 2035134243,
            'meeting_capacity' => 0,
            'enable_webinar' => true,
            'webinar_capacity' => 100,
            'enable_large' => false,
            'large_capacity' => 0,
            'disable_feedback' => false,
            'disable_jbh_reminder' => true,
            'dept' => 'Engineer',
            'timezone' => 'America/Los_Angeles',
            'token' => 'adlfjadslfkjasdkljfkjalkadfskjdsafkjdfsajkllajsdfaljsdf'
        ]));
        $mock = new Mock([
            new Response(200, [], $mockBody),
        ]);
        $userClient->getHttpClient()->getEmitter()->attach($mock);

        // Act:
        $result = $userClient->getByEmail([
            'email' => 'test@abc.com',
            'login_type' => UserClient::LOGIN_TYPE_SNS_GOOGLE,
        ]);

        // Assert:
        $this->assertEquals(
            200,
            $result['statusCode'],
            'Failed to receive expected HTTP status code from mocked API call.'
        );
        $this->assertEquals(
            'test@abc.com',
            $result['email'],
            'Failed to receive expected email address from mocked API call.'
        );
        $this->assertNotFalse(
            strtotime($result['created_at']),
            'Failed to receive valid created_at string from mocked API call.'
        );
    }

    public function testGetByEmail_doesNotExist()
    {
        // Arrange:
        $realTestData = $this->getRealTestDataFor('getByEmail');
        $nonExistentEmail = 'non_existent_account_@sil.org';
        $loginType = $realTestData['login_type'];
        $userClient = $this->getUserClient([
            'api_key' => $realTestData['api_key'],
            'api_secret' => $realTestData['api_secret'],
            'http_client_options' => $realTestData['http_client_options'],
        ]);
        
        // Act:
        $result = $userClient->getByEmail([
            'email' => $nonExistentEmail,
            'login_type' => $loginType,
        ]);

        // Assert:
        $this->assertEquals(
            200,
            $result['statusCode'],
            'Failed to receive expected HTTP status code from API call.'
        );
        $this->assertArrayHasKey(
            'error',
            $result,
            'Failed to receive error when asking for non-existent user: '
            . json_encode($result)
        );
        $this->assertArrayHasKey(
            'code',
            $result['error'],
            'Failed to receive expected error format from API call (no "code" '
            . 'field was found): '
            . json_encode($result)
        );
        $this->assertEquals(
            1001,
            $result['error']['code'],
            'Received unexpected error code for non-existent user.'
        );
    }

    public function testGetByEmail_exists()
    {
        // Arrange:
        $realTestData = $this->getRealTestDataFor('getByEmail');
        $email = $realTestData['email'];
        $loginType = $realTestData['login_type'];
        $expectedId = $realTestData['id'];
        $userClient = $this->getUserClient([
            'api_key' => $realTestData['api_key'],
            'api_secret' => $realTestData['api_secret'],
            'http_client_options' => $realTestData['http_client_options'],
        ]);

        // Act:
        $result = $userClient->getByEmail([
            'email' => $email,
            'login_type' => $loginType,
        ]);

        // Assert:
        $this->assertEquals(
            200,
            $result['statusCode'],
            'Failed to receive expected HTTP status code from API call.'
        );
        $this->assertArrayNotHasKey(
            'error',
            $result,
            'Received error back from API call: ' . json_encode($result)
        );
        $this->assertEquals(
            $expectedId,
            $result['id'],
            'Failed to receive expected id from API call.'
        );
        $this->assertEquals(
            $email,
            $result['email'],
            'Failed to receive expected email address real API call.'
        );
    }

    private function getRealTestDataFor($methodName)
    {
        $testDataFilePath = __DIR__ . '/real-test-data.local.php';
        
        $this->assertFileExists(
            $testDataFilePath,
            'The file with real test data was not found. Please see README.md.'
        );
        
        $fullData = require $testDataFilePath;
        return $fullData[$methodName];
    }

    private function getUserClient($extra = [])
    {
        $testConfig = include __DIR__ . '/config-test.php';
        $config = array_replace_recursive($testConfig, $extra);
        
        return new UserClient($config);
    }
}
