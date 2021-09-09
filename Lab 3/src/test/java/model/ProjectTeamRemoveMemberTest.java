package model;


import model.Project;
import org.junit.jupiter.api.*;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertTrue;
import static org.junit.jupiter.api.Assertions.assertFalse;
import static org.junit.jupiter.api.Assertions.assertThrows;
import static org.junit.jupiter.api.Assertions.assertDoesNotThrow;
import java.util.Date;

import org.junit.jupiter.api.MethodOrderer.OrderAnnotation;
import org.junit.jupiter.api.Order;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.api.TestMethodOrder;

/**
 *  Implement and test {@link Project#removeTeamMember(Employee)} (Employee)} } that respects the following:
 *
 *  <ul>
 *
 *      <li>{@link Employee#getNumberOfProjects()} must return the correct number after the operation </li>
 *      <li>Throws an {@link IllegalTeamMemberException} if an Employee is not part of the team. MUST identify the Employee name and project name in the message</li>
 *      <li></li>
 *  </ul>
 *
 * NOTE: The {@link Project#canAddTeamMember(Employee)} verifies that the constraints to add a new member. You DO NOT HAVE to implement this method.
 *
 * Each test criteria must be in an independent test method and named as specified in the README.
 *
 * Initialize the test object with setUp method.
 */
@TestInstance(TestInstance.Lifecycle.PER_CLASS)
@TestMethodOrder(OrderAnnotation.class)
public class ProjectTeamRemoveMemberTest {
    // Sets up Test Employee and Test Project before the tests are run

    public Date testDate;
    public Employee employee;
    public Project project;
    public String name;
    public Date startDate;
    public int numProjects;

    @BeforeAll
    void setUp() {
        // Blank Date variable for Employee object construction
        testDate = new Date();

        // Setup Test Variables
        employee = new Employee("Daniel", testDate);
        project = new Project();

        name = employee.getName();
        project.setName("IMDB Project");
        startDate = employee.getStartDate();

        // For testing sake, we can assume the new employee has no projects
        numProjects = 0;
        employee.setNumberOfProjects(numProjects);

    }

    /*
        Note, I did use @Order for my tests. As far as I could tell there was no restriction on this.
        Because I implemented addToTeam, despite not required to, I used order to ensure the tests worked
        correctly and would run in the sequential order that the application would typically run in if it was
        fully functional.

        As of May 26th, I have run and re-run the tests numerous times in both IntelliJ and Maven
        and they are working and passing successfully for me on every attempt.
    */

    /*
        REQUIRED TESTS AS PER SPECS:
        - Employee.getNumberOfProjects() must return the correct number after the operation"
            - removeTeamMember_ProjectNumberEquals0_AfterTeamMemberIsRemoved
            - addTeamMember_ProjectCountIncrements1_WhenNewTeamMemberAdded1
        - Throws an IllegalTeamMemberException if an Employee is not part of the team
            - removeTeamMember_ExceptionThrown_WhenTeamMemberIsInvalid
            - removeTeamMember_ExceptionNotThrown_WhenTeamMemberIsValid (not needed, but tests the opposite of above
                method)

        // As per the Lab specifications, the tests above were the tests that were explicitly asked for. The tests
        // below are tests that I wrote and implemented as I implemented the addTeamMember method, and so all the
        // tests run in order as the program could be used to demonstrate adding and removing employees, as well as
        // showing how getNumberOfProjects returns the correct number and that exceptions are thrown if the employee
        // is invalid or exceptions are not thrown if the employee is valid.

        OTHER TESTS I CHOSE TO WRITE:
        - addTeamMember_BooleanReturnsTrue_WhenTeamMemberIsAdded
            - We know that addTeamMember_ProjectCountIncrements1_WhenNewTeamMemberAdded1 already confirms that
                the method works, but I thought it'd be safer to cover all ground when testing
                and having an assertsTrue test
        - removeTeamMember_ReturnsTrue_WhenTeamMemberIsRemoved
            - For similar reasons to above, even though the ExceptionNotThrown proves that the method returns
                true, because the exception wasn't thrown, I included this as a safe guard to ensure
                I've covered all the bases for testing.
    */

    @Test
    @Order(1)
    void addTeamMember_ProjectCountIncrements1_WhenNewTeamMemberAdded() {
        // This first test adds a team member and ensures that the project count has incremented
        // I.E. "Employee.getNumberOfProjects() must return the correct number after the operation."

        project.addTeamMember(employee); // Calls the method and ensures a team member has been added to a project
        assertEquals(employee.getNumberOfProjects(),1); // Now checks if the team member was successfully added
        // by asserting that their project number is equivalent to 1.
    }

    @Test
    @Order(2)
    void removeTeamMember_ExceptionNotThrown_WhenTeamMemberIsValid() {
        // This is a POSITIVE TEST CASE
        // Checks that an exception is NOT THROWN when they're a valid team member (I.E. they are assigned to at
        // least 1 project)

        assertDoesNotThrow(
                () -> project.removeTeamMember(employee));
    }

    @Test
    @Order(3)
    void removeTeamMember_ProjectNumberEquals0_AfterTeamMemberIsRemoved() {
        // Continues from previous test but we can't have multiple asserts in a test
        // This isn't intended to test the getter method but rather confirm the following point:
        // I.E. "Employee.getNumberOfProjects() must return the correct number after the operation."
        assertEquals(employee.getNumberOfProjects(),0);
    }

    @Test
    @Order(4)
    void removeTeamMember_ExceptionThrown_WhenTeamMemberIsInvalid() {
        // This is a NEGATIVE TEST CASE
        // It is almost similar to the exception not thrown test but this time it throws the IllegalTeamMemberException

        // I.E. "Throws an IllegalTeamMemberException if an Employee is not part of the team. MUST identify the
        // Employee name and project name in the message."

        // TESTS - Either will work, refer below for why I included both
        //assertThrows(IllegalTeamMemberException.class, () -> project.removeTeamMember(employee));
        System.out.println(assertThrows(IllegalTeamMemberException.class, () -> project.removeTeamMember(employee)));

        // Note both of the above lines do the same thing however the System.out.println one actually prints the
        // exception message so you can see it. I've left them both in just in case.
    }

    @Test
    @Order(5)
    void addTeamMember_BooleanReturnsTrue_WhenTeamMemberIsAdded() {
        // This test ensures that the addTeamMember method works when given the correct data
        // I.E. will return true
        assertTrue(project.addTeamMember(employee));
    }

    @Test
    @Order(6)
    void removeTeamMember_ReturnsTrue_WhenTeamMemberIsRemoved() {
        // Although this is similar to removeTeamMember_ExceptionNotThrown_WhenTeamMemberIsValid, and that you don't
        // normally have two asserts in a test.
        // I was concerned that I wasn't using assertTrue for testing removeTeamMember
        // So I implemented this to return true when a team member is removed and ensure all bases were covered.

        // Test
        assertTrue(assertDoesNotThrow(() -> project.removeTeamMember(employee)));
    }


    // REFERERENCES
    // https://alvinalexander.com/java/java-custom-exception-create-throw-exception/
    // https://billykorando.com/2019/03/04/handling-and-verifying-exceptions-in-junit-5/
}