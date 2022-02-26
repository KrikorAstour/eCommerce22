Feature: Add, Delete, Modify Card Posts

    In order to show, change, or remove cards
    As a user
    I should be able to add, modify, or delete cards

    Scenario: Adding Card Post
    Given I am on localhost/MVC
    When I enter "Sample Post" in post title box
    And I enter "Sample Post Description" in post description box
    And I enter "Pikachu" in card name box
    And I select "Rare" in card rarity selection box
    And I enter "https://m.media-amazon.com/images/I/51K7bUFQukL._AC_.jpg" in the card image box
    And I press enter
    Then I should see "Sample Post"
    And I should see "Sample Post Description"
    And I should see "Pikachu"

    Scenario: Deleting Card Post
    Given I am on localhost/MVC/account/1
    When I click on the first post setting
    And I click on delete post button
    Then I should not see "Sample Post"
    And I should not see "Sample Post Description"

    Scenario: Modifying Card Post
    Given I am on localhost/MVC/account/1
    When I click on the first post setting
    And I click on modify post button
    And I enter "Modified Sample Post" on the post title box
    And I press enter
    Then I should see "Modified Sample Post"