Feature: sign_in
  In order to access the web application
  As a user
  I need to sign in using my account

  Scenario: try signing in while logged in
    Given I am logged in
    When I am on "/login"
    Then I should see "PokeMarket"

  Scenario Outline: try signing in while not logged in
    Given I am on "/login"
    When I enter <email> in email input
    And I enter <password> in password input
    And I click on "Login"
    Then I should see <result>

    Examples:
      | email                   | password      | result             |
      | "reimarrosas"           | "reimarrosas" | "Email Invalid"    |
      | "reimarrosas@example.com" | "reim"        | "Password Invalid" |
      | "reimarrosas@example.com" | "reimarrosas" | "PokeMarket"       |