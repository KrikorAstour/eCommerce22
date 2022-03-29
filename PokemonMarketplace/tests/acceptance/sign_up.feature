Feature: sign_up
  In order to create an account
  As a user
  I need to sign up using my credentials

  Scenario: try signing up while logged in
    Given I am logged in
    When I am on "/login/signup"
    Then I should see "PokeMarket"

  Scenario Outline: try signing up while not logged in
    Given I am on "/login/signup"
    When I enter <email> in email input
    And I enter <password> in password input
    And I enter <verify_password> in verify_password input
    Then I should see <result>

    Examples:
      | email                     | password      | verify_password | result                    |
      | "reimarrosas"             | "reimarrosas" | "reimarrosas"   | "Email Invalid"           |
      | "pokemarket@example.com" | "reim"        | "reim"          | "Password Invalid"        |
      | "pokemarket@example.com" | "reimarrosas" | "reim"          | "Verify Password Invalid" |
      | "pokemarket@example.com" | "reimarrosas" | "reimarrosas"   | "Login"                   |
