Feature: user account balance
In order to buy Pokemon cards
As a Buyer
I want to be able to have a balance

Scenario: try checking user account balance
Given I am logged in with a user account
And I am on localhost/MVC/accountSettings
When I click on "Account Balance"
Then I should see the total balance for the current user

Scenario: try adding $50.00 to the user account balance
Given I am logged in with a user account
And I am on localhost/MVC/accountSettings
When I click on "Account Balance"
And I click on "Add funds"
And I enter "50.00" in the "Amount" form box
And I click the "Confirm" button
Then I should see that the total balance for the current user has increase by $50.00

Scenario: try checking user account balance transactions
Given I am logged in with a user account
And I am on localhost/MVC/accountSettings
When I click on "Account Balance"
And I click on "View Transaction History"
Then I should see the full list of transactions for the current user's balance