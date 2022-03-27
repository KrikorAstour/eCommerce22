Feature: sign_up
  In order to create an account
  As a user
  I need to sign up using my credentials

  Scenario: try signing up while logged in
    Given I am logged in
    When I go to localhost/eCommerce22/PokemonMarketplace/login/signup
    Then I should see 'PokeMarket'

  Scenario Outline: try signing up while not logged in
    Given I am on localhost/eCommerce22/PokemonMarketplace/login/signup
    When I enter <email> in email input
    And I enter <password> in password input
    And I enter <verify_password> in verify_password input
    Then I should see <result>

    Examples:
      | email                 | password      | verify_password | result                    |
      | 'reimarrosas'         | 'reimarrosas' | 'reimarrosas'   | 'Email Invalid'           |
      | 'reimarrosas@example' | 'reim'        | 'reim'          | 'Password Invalid'        |
      | 'reimarrosas@example' | 'reimarrosas' | 'reim'          | 'Verify Password Invalid' |
      | 'reimarrosas@example' | 'reimarrosas' | 'reimarrosas'   | 'Login'                   |
