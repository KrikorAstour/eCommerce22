Feature: sort by likes
In order to search and list Pokemon cards
As a User
I want to be able to sort Pokemon cards by likes

Scenario: try sorting by most likes
Given I am on localhost/MVC/home
And I am on the search bar
And I click on the "Sort" button
When I click on "Likes"
And I click on "Highest"
And I click on "Confirm"
Then I should see the first card as the most liked card

Scenario: try sorting by least likes
Given I am on localhost/MVC/home
And I am on the search bar
And I click on the "Sort" button
When I click on "Likes"
And I click on "Lowest"
And I click on "Confirm"
Then I should see the first card as the least liked card