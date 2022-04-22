Feature: sign_in
  In order to access the web application
  As a user
  I need to sign in using my account

  Scenario: try signing in while logged in
    Given I am logged in
    When I am on "/login"
    Then I should see "PokeMarket"

  Scenario Outline: try signing in without 2FA
    Given I am not logged in
    And I am on "/login"
    When I enter <email> in email input
    And I enter <password> in password input
    And I click on "Login"
    Then I should see <result>
    And I should see <tries>

    Examples:
      | email                     | password      | result    | tries           |
      | "reimarrosas@example.com" | "reimarrosas" | "QR Code" | "2 more tries"  |
      | "rosasreimar@example.com" | "reimarrosas" | "Login"   | "No more tries" |

  Scenario Outline: try signing in while not logged in with incorrect 2FA token
    Given I am not logged in
    And I am on "/login"
    When I enter "reimarrosas@example.com" in email input
    And I enter "reimarrosas" in password input
    And I enter <token> in two_fa input
    And I click on "Login"
    Then I should see "Token Invalid"

    Examples:
      | token     |
      | "123456"  |
      | "23456"   |
      | "1234567" |
      | "abcdef"  |
      | "@!#$%^"  |

  Scenario Outline: try signing in while not logged in with correct 2FA token
    Given I am not logged in
    And I am on "/login"
    When I enter <email> in email input
    And I enter <password> in password input
    And I enter token in two_fa input
    And I click on "Login"
    Then I should see <result>

    Examples:
      | email                     | password      | result             |
      | "reimarrosas"             | "reimarrosas" | "Email Invalid"    |
      | "reimarrosas@example.com" | "reim"        | "Password Invalid" |
      | "reimarrosas@example.com" | "reimarrosas" | "PokeMarket"       |