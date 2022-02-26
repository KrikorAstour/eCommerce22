Feature: set rarity
In order to post a card to the marketplace
As a User
I want to be able to set the rarity of a Pokemon Card

Scenario: try setting card rarity to Common
Given I am signed in to my user account
And I am on localhost/MVC/card
When I select "Set Rarity"
And I click "Common"
Then I see "Card Rarity: Common"

Scenario: try setting card rarity to Rare
Given I am signed in to my user account
And I am on localhost/MVC/card
When I select "Set Rarity"
And I click "Rare"
Then I see "Card Rarity: Rare"

Scenario: try setting card rarity to Super Rare
Given I am signed in to my user account
And I am on localhost/MVC/card
When I select "Set Rarity"
And I click "Super Rare"
Then I see "Card Rarity: Super Rare"

Scenario: try setting card rarity to Legendary
Given I am signed in to my user account
And I am on localhost/MVC/card
When I select "Set Rarity"
And I click "Legendary"
Then I see "Card Rarity: Legendary"