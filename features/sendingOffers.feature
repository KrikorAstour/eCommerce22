Feature: sending offers to users
as a user I can send offers to the card I like that are posted by other users.

Scenario: Sending Offer for "Pikachu"
Given I am on localhost/MVC
When I click "Send Offer"
Then I should see "Enter Price"
When I enter "20"
Then I should see "You Successfuly Offered 20 for Pikachu!"
