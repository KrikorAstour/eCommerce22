Feature: create new post
In order to display my cards
As a user
I want to be able to create new post

Scenario: try creating a post
Given: I am logged in
And I am on /Profile/my-profile/
I should see "create post"
When I click on "create post"
I should see "price, title"
And I enter the required information
When I click "Upload"
I should see "uploading post"
