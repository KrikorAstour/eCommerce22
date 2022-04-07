Feature: delete post
In order to organize my posts
As a user
I want to be able to delete posts

Scenario: try deleting a post
Given: I am logged in
And I am on /Profile/my-profile/
And I have uploaded post
I should see "delete"
When I click on "delete"
I should see "deleting the post"
