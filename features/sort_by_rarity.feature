Feature: sort by card rarity
In order to search and list Pokemon cards
As a User
I want to be able to sort Pokemon cards by rarity

Scenario: try sorting by Common
Given I am on localhost/MVC/home
And I am on the search bar
And I click on the "Sort" button
When I click on "Rarity"
And I click on "Common"
And I click on "Confirm"
Then I should see the first card with the rarity as Common

Scenario: try sorting by Rare
Given I am on localhost/MVC/home
And I am on the search bar
And I click on the "Sort" button
When I click on "Rarity"
And I click on "Rare"
And I click on "Confirm"
Then I should see the first card with the rarity as Rare

Scenario: try sorting by Super Rare
Given I am on localhost/MVC/home
And I am on the search bar
And I click on the "Sort" button
When I click on "Rarity"
And I click on "Super Rare"
And I click on "Confirm"
Then I should see the first card with the rarity as Super Rare

Scenario: try sorting by Legendary
Given I am on localhost/MVC/home
And I am on the search bar
And I click on the "Sort" button
When I click on "Rarity"
And I click on "Legendary"
And I click on "Confirm"
Then I should see the first card with the rarity as Legendary