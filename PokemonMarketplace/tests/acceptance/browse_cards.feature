Feature: browse Pokemon cards
In order to look at available Pokemon cards
As a Buyer
I want to be able to browse through the marketplace

Scenario: try browsing Pokemon cards
Given I am logged in
And "/home"
Then I should see a list of available posts