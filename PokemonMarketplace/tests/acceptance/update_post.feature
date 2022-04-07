Feature: update post
In order to organize my post
As a user
I want to be able to modify posts

Scenario: try updating a post
Given: I am logged in
And I am on /Profile/my-profile/
And I have uploaded post
I should see "edit"
When I click on "edit"
I should see "title, price"
And I enter new information
When I click "confirm"
I should see "updating post"
