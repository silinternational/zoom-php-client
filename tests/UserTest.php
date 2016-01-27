<?php
namespace tests;

include __DIR__ . '/../vendor/autoload.php';

use Zoom\UserClient;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testAutoCreate()
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

    public function testGet()
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

    public function testGetByEmail()
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

    private function getUserClient($extra = [])
    {
        $testConfig = include __DIR__ . '/config-test.php';
        $config = array_merge_recursive($testConfig, $extra);
        
        return new UserClient($config);
    }
}
