Feature: adding and removing cards from my cart
as a user I am able to modify my cart by adding or removing cards.

Scenario: add "Pikachu" to my cart
Given I am on "localhost/MVC"
When I click "Add To Cart"
Then I should see "Pikachu Successfully Added To Cart!"


Scenario: Remove card from my cart
Given I am on localhost/MVC/mycart
When I click "Remove From Cart"
Then I should see "Pikachu Successfully has been removed from you cart!"