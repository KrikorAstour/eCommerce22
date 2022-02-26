Feature: sort by date
In order to search and list Pokemon cards
As a User
I want to be able to sort Pokemon cards by date posted

Scenario: try sorting by most recent posted
Given I am on localhost/MVC/home
And I am on the search bar
And I click on the "Sort" button
When I click on "Date"
And I click on "Highest"
And I click on "Confirm"
Then I should see the first card as the most recent card posted

Scenario: try sorting by cards posted on February 25 2022
Given I am on localhost/MVC/home
And I am on the search bar
And I click on the "Sort" button
When I click on "Date"
And I enter "February 25 2022" on the date picker
And I click "Confirm"
Then I should see cards that are posted on February 25 2022

Scenario: try sorting by cards posted from February 23 2022 to February 25 2022
Given I am on localhost/MVC/home
And I am on the search bar
And I click on the "Sort" button
When I click on "Date"
And I enter "February 23 2022" on the date picker for the "From" form box
And I enter "February 25 2022" on the date picker for the "To" form box
And I click "Confirm"
Then I should see cards that are posted from February 23 2022 to February 25 2022