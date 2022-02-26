Feature: list cards from my profile
as a user I can list the cards that I want to sale from my profile.

Scenario: try post card "Charizard"
Given I am on localhost/MVC/account
When I click "List Card"
Then I should see "Charizard"
When I click "List"
Then I should see "Charizard Listed Successfuly!"