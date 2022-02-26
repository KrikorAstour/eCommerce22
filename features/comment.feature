Feature: Comments

    In order to interact with users
    As a user
    I should be able to comment on posts

    Scenario: try add comment on post
    Given I am on localhost/MVC
    When I enter "sample comment" in the first comment box
    And press enter
    Then I should see "sample comment"