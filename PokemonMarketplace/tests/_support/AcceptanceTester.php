<?php


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
        $this->amOnPage('/login');
        $this->fillField('email', 'reimarrosas@email');
        $this->fillField('password', 'reimarrosas');
        $this->click('Login');
    }

    /**
     * @Given I am on :page
     */
    public function iAmOn($page)
    {
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
        $this->click('Profile');
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
        $this->see($_SESSION['username']);
    }

    /**
     * @When I click on :button
     */
    public function iClickOn($button)
    {
        $this->click($button);
    }
}