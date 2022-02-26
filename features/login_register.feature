Feature: Login and Registration

  In order to use the web application
  As a user
  I should be able to register and login

  Scenario: try user registration
    Given I am on localhost/MVC/register
    When I enter "webuser22" in the username box
    And I enter "123456" in the password box
    And I enter "123456" in the reenter_password box
    And click Register
    Then I should see "User created successfully!"
  
  Scenario: try user login
    Given I am on localhost/MVC/login
    When I enter "webuser22" in the username box
    And I enter "123456" in the password box
    And click Login
    Then I see "Home"
    And I should see "Profile"
  
  Scenario: try user logout
    Given I am on localhost/MVC/
    When I click logout
    Then I should see "Login"