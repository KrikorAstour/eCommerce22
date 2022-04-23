Feature: Offers

    In order to acquire new cards,
    As a user,
    I need to be able to offer on a post

    Scenario: try viewing offers in home after clicking offers tab
        Given I am logged in
        When I click on "#offer-tab1"
        Then I should see "rosasreimar@example.com offers $6.88"

    Scenario: try viewing offers in home without clicking offers tab
        Given I am logged in
        Then I should not see "rosasreimar@example.com offers $6.88"

    Scenario: try viewing offers in profile after clicking offers tab
        Given I am logged in
        When I go to my profile 
        And I click on "#offer-tab1"
        Then I should see "rosasreimar@example.com offers $6.88"

    Scenario: try viewing offers in profile without clicking offers tab
        Given I am logged in
        When I go to my profile
        Then I should not see "rosasreimar@example.com offers $6.88"