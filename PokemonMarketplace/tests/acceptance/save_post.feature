Feature: save Pokemon card posted by another user
In order to keep track of posts
As a Buyer
I want to be able to save posts

Scenario: try saving a post
Given that I am logged in
And I am on "/profile/1"
When I click on the ".save" link
Then I should see ".saved" link

Scenario: try delete post from saves
Given that I am logged in
And I am on "/profile/1"
When I click on the ".saved" link
Then I should see ".save" link