Feature: Mail

    Scenario: Receive a valid mail
    When try create mail
    Then insert that mail
    And response "201" HTTP code

    Scenario: Receive a empty request
    When try to insert in queue with invalid data
    Then throw a error with message "The title field is required. (and 3 more errors)"
    And response "422" HTTP code
