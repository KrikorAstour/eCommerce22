Feature: Login and Registration
  Scenario: try user registration
    Given I am on localhost/MVC/register
    When I enter "webuser22" in the username box
    And I enter "123456" in the password box
    And I enter "123456" in the reenter_password box
    And click Register
    Then I see "User created successfully!"
  
  Scenario: try user login
    Given I am on localhost/MVC/login
    When I enter "webuser22" in the username box
    And I enter "123456" in the password box
    And click Login
    Then I see "Home"
    And I see "Profile"
  
  Scenario: try user logout
    Given I am on localhost/MVC/
    When I click logout
    Then I see "Login"