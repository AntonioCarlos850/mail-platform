<?php

use App\Models\Mail;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends TestCase implements Context
{
    public TestResponse $response;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        parent::setUp();
    }

    /**
     * @When try create mail
     */
    public function tryCreateMail()
    {
        $this->response = $this->post(
            route('mails.store'),
            [
                'content' => '<h1>Test</h1>',
                'to' => 'contato@toninho.dev',
                'subject' => 'Test',
                'title' => 'Test in Behat'
            ],
            ['Authorization' => 'Bearer ' . config('auth.bearer_token')]
        );
    }

    /**
     * @Then insert that mail
     */
    public function insertThatMail()
    {
        $this->response->assertExactJson(['message' => 'Mail added in queue']);
    }

    /**
     * @Then response :arg1 HTTP code
     */
    public function responseHttpCode($arg1)
    {
        $this->response->assertStatus(intval($arg1));
    }

    /**
     * @When try to insert in queue with invalid data
     */
    public function tryToInsertInQueueWithInvalidData()
    {
        $this->response = $this->post(
            route('mails.store'),
            [],
            [
                'Authorization' => 'Bearer ' . config('auth.bearer_token'),
                'Accept' => 'application/json'
            ]
        );
    }

    /**
     * @Then throw a error with message :arg1
     */
    public function throwAErrorWithMessage($arg1)
    {
        $this->response->assertJson(['message' => $arg1]);
    }
}
