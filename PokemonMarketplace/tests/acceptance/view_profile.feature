Feature: view_profile
  In order to see my posts and personal details
  As a user
  I need to go to my profile page

  Scenario: try viewing profile page while not logged in
    Given I am not logged in
    When I go to localhost/eCommerce22/PokemonMarketplace/profile/1
    Then I should see 'Login'
    And I should not see 'PokeMarket'

  Scenario: try viewing profile page while logged in
    Given I am logged in
    And I am on localhost/eCommerce22/PokemonMarketplace/home
    When I click on profile link
    Then I should see my username
