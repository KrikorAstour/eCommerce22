Feature: log_out
  In order to destroy my session
  As a user
  I need to log out my account

  Scenario: try logging out
    Given I am logged in
    And I am on localhost/eCommerce22/PokemonMarketplace/home
    When I clicked on log out link
    Then I should see 'Login'
