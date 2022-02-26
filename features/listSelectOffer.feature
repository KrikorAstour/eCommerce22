Feature: List offers that I recieved from other users
as a user I should be able to see the offers that other users have sent to buy my card.

Scenario: see the list of offers
Given I am on localhost/MVC/account/offers
when I click on see offers
then I should see all the offers from other users


Feature: Select the offer that I like the most and accept it
as a user I can select which offer I want to accept, I can not accept more than one offer for the same post.

Scenario: Select the offer that I like
Given I am on localhost/MVC/account/offers
when I click "Accept Offer"
Then I should see "Offer Accepted!"