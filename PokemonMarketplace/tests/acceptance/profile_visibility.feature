Feature: profile_visibility
  In order to authorize profile editing properly
  As a user
  I need to be able to only edit my own posts

  Scenario: try seeing post operations on my profile
    Given I am logged in
    When I go to my profile
    Then I should see 'Edit'
    And I should see 'Delete'

  Scenario: try not seeing post operations on another user's profile
    Given I am on logged in
    When I go to another profile
    Then I should see 'View More'
    But I should not see 'Edit'
    And I should not see 'Delete'