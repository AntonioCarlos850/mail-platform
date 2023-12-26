Feature: Mail

    Scenario: Receive a valid mail
    Given a request of type POST with key called "mail" with text "<h1>simple mail</h1>"
    When try save on queue
    Then insert that in queue
    And response 201 HTTP code

    Scenario: Receive a empty request
    Given a request with anything in body
    When try to insert in queue
    Then throw a error with message "Body can't be empty"
    And response "422" HTTP code
