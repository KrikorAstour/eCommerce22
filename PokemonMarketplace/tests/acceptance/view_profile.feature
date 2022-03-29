Feature: view_profile
  In order to see my posts and personal details
  As a user
  I need to go to my profile page

  Scenario: try viewing profile page while not logged in
    Given I am not logged in
    When I am on "/profile/1"
    Then I should see "Login"
    But I should not see "PokeMarket"

  Scenario: try viewing profile page while logged in
    Given I am logged in
    And I am on "/home"
    When I go to my profile
    Then I should see my username
