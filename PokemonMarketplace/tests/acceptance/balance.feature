Feature: user account balance
In order to buy Pokemon cards
As a Buyer
I want to be able to manage a balance

Scenario: try checking user account balance
Given I am logged in
And I am on "/deposit"
Then I should see the "you currently hold a balance of $0.00"

Scenario: try adding $50.00 to the balance
Given I am logged in
And I am on "/deposit/"
When I click on the "Add balance" link
And I enter "50.00" in the "#amount" input
And I click the "#Add" link
Then I should see "$50.00 has been successfully deposited!"
