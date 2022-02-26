Feature: Rating seller/user
as a user I can rate users that I delt with sold to or bought from.

Scenario: Rate user1
Given I am on localhost/MVC/user1
I should see "Rate"
when I click "Rate"
I should see "Enter Rate between 0 and 5"
and I enter "4.5"
I should see "You have rate user1 4.5 Successfully!"