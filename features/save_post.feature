Feature: save Pokemon card posted by another user
In order to keep track of Pokemon cards
As a Buyer
I want to be able to save Pokemon card posts

Scenario: try saving a Pokemon card post
Given that I am logged with a user account
And I am on localhost/MVC/PokemonCard1
When I click on the "Save Post" button
And I click on the "Confirm" button
Then I should see "Post added to Saved Post"