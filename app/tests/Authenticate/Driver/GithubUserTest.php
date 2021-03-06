<?php
namespace App\Tests\Authenticate\Driver;

use App\Authenticate\Driver\GithubUser;
use App\Tests\TestCase;

class GithubUserTest extends TestCase
{

    /** @var GithubUser  */
    protected $user;

    public $array = [
        'user_id' => 1,
        'remember_token' => 'abcdefghijklmn'
    ];

    public function setUp()
    {
        $this->user = new GithubUser($this->array);
    }

    public function testInstance()
    {
        $this->assertInstanceOf("App\Authenticate\Driver\GithubUser", $this->user);
        $this->assertSame(1, $this->user->getAuthIdentifier());
        $this->assertSame('', $this->user->getAuthPassword());
        $this->assertSame('abcdefghijklmn', $this->user->getRememberToken());
    }
} 