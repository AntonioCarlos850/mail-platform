<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{

    /**
     * @Given a request of type POST with key called :arg1 with text :arg2
     */
    public function aRequestOfTypePostWithKeyCalledWithText($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @When try save on queue
     */
    public function trySaveOnQueue()
    {
        throw new PendingException();
    }

    /**
     * @Then insert that in queue
     */
    public function insertThatInQueue()
    {
        throw new PendingException();
    }

    /**
     * @Then response :arg1 HTTP code
     */
    public function responseHttpCode($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given a request with anything in body
     */
    public function aRequestWithAnythingInBody()
    {
        throw new PendingException();
    }

    /**
     * @When try to insert in queue
     */
    public function tryToInsertInQueue()
    {
        throw new PendingException();
    }

    /**
     * @Then throw a error with message :arg1
     */
    public function throwAErrorWithMessage($arg1)
    {
        throw new PendingException();
    }
}
