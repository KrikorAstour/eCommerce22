Feature: log_out
  In order to destroy my session
  As a user
  I need to log out my account

  Scenario: try logging out
    Given I am logged in
    When I am on "/login/logout"
    Then I should see "Login"
