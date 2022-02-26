Feature: sort by price
In order to search and list Pokemon cards
As a User
I want to be able to sort Pokemon cards by price

Scenario: try sorting by lowest price
Given I am on localhost/MVC/home
And I am on the search bar
And I click the "Sort" button
When I click on "Price"
And I click on "Lowest"
And I click on "Confirm"
Then I should see the first card as the least priced card

Scenario: try sorting by highest price
Given I am on localhost/MVC/home
And I am on the search bar
And I click the "Sort" button
When I click on "Price"
And I click on "Highest"
And I click on "Confirm"
Then I should see the first card as the highest priced card

Scenario: try sorting by less than $50.00 in descending order
Given I am on localhost/MVC/home
And I am on the search bar
And I click the "Sort" button
When I click on "Price"
And I click on "Highest"
And I enter "50" in the price box
And I click on "Confirm"
Then I should see cards that are less than or equal to $50.00, in descending order

Scenario: try sorting by more than $75.00
Given I am on localhost/MVC/home
And I am on the search bar
And I click the "Sort" button
When I click on "Price"
And I click on "Lowest"
And I enter "75" in the price box
And I click on "Confirm"
Then I should see cards that are more than or equal to $75.00, in no particular order
