<?php

require_once __DIR__ . '../../../vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
require_once __DIR__ . '../../../vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
require_once __DIR__ . '../../../vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
require_once __DIR__ . '../../../vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
 */
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;


    /**
     * @Given I am logged in
     */
    public function iAmLoggedIn()
    {
        // if ($this->loadSessionSnapshot('login')) return;

        $ga = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        $token = $ga->getCode('XGH3DJLAAFRC77E5');

        $this->amOnPage('/login');
        $this->fillField('email', 'reimarrosas@example.com');
        $this->fillField('password', 'reimarrosas');
        $this->fillField('two_fa', $token);
        $this->click('Login');

        // $this->saveSessionSnapshot('login');
    }

    /**
     * @Given I am on :page
     */
    public function iAmOn($page)
    {
        // $this->loadSessionSnapshot('login');
        $this->amOnPage($page);
    }

    /**
     * @When I clicked on log out link
     */
    public function iClickedOnLogOutLink()
    {
        $this->click('Logout');
    }

    /**
     * @Then I should see :text
     */
    public function iShouldSee($text)
    {
        $this->see($text);
    }

    /**
     * @When I go to my profile
     */
    public function iGoToMyProfile()
    {
        $this->amOnPage('/profile/my_profile');
    }

    /**
     * @Then I should not see :text
     */
    public function iShouldNotSee($text)
    {
        $this->dontSee($text);
    }

    /**
     * @When I go to another profile
     */
    public function iGoToAnotherProfile()
    {
        $this->amOnPage('/profile/2');
    }

    /**
     * @When I enter :email in email input
     */
    public function iEnterInEmailInput($email)
    {
        $this->fillField('email', $email);
    }

    /**
     * @When I enter :password in password input
     */
    public function iEnterInPasswordInput($password)
    {
        $this->fillField('password', $password);
    }

    /**
     * @When I enter :verify_password in verify_password input
     */
    public function iEnterInVerify_passwordInput($verify_password)
    {
        $this->fillField('verify_password', $verify_password);
    }

    /**
     * @Given I am not logged in
     */
    public function iAmNotLoggedIn()
    {
        $this->deleteSessionSnapshot('login');
    }

    /**
     * @When I click on profile link
     */
    public function iClickOnProfileLink()
    {
        $this->click('Profile');
    }

    /**
     * @Then I should see my username
     */
    public function iShouldSeeMyUsername()
    {
        $this->see('reimarrosas');
    }

    /**
     * @When I click on :button
     */
    public function iClickOn($button)
    {
        $this->click($button);
    }

    /**
     * @When I enter :token in two_fa input
     */
    public function iEnterInTwo_faInput($token)
    {
        $this->fillField('two_fa', $token);
    }

    /**
     * @When I enter token in two_fa input
     */
    public function iEnterTokenInTwo_faInput()
    {
        $ga = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();       
        $token = $ga->getCode('XGH3DJLAAFRC77E5');
        $this->fillField('two_fa', $token);
    }
}
