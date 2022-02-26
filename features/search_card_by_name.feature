Feature: Search Card by Name

    In order to find cards
    As a user
    I should be able to search for posts by name

    Scenario: try search for card "pikachu"
    Given I am on localhost/MVC
    When I enter "pikachu" on the search box
    And I press enter
    Then I should see "pikachu"
    But I should not see "bulbasaur"