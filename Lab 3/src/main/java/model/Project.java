package model;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

/**
 * Project inside the company.
 *
 * @author Sebastian Rodriguez, 2020. email: sebastian.rodriguez@rmit.edu.au
 * @author Daniel Viglietti, 2021. email: s3844180@student.rmit.edu.au (additional code).
 */
public class Project {
    /**
     * Name the this project
     */
    public Employee Employee;
    private String name;
    public Boolean validTeamMember;

    /**
     * Project start
     */
    private Date startDate;

    /**
     * Project maximum end date
     */
    private Date dueDate;

    /**
     * Estimated duration of the project in DAYS (WEEKENDS INCLUDED)
     */
    private int estimatedDuration;

    /**
     * Team allocated to this project
     */
    private List<Employee> team = new ArrayList<Employee>();

    public String getName()
    {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public Date getStartDate() {
        return startDate;
    }

    public void setStartDate(Date startDate) {
        this.startDate = startDate;
    }

    public Date getDueDate() {
        return dueDate;
    }

    public void setDueDate(Date dueDate) {
        this.dueDate = dueDate;
    }

    public int getEstimatedDuration() {
        return estimatedDuration;
    }

    public void setEstimatedDuration(int estimatedDuration) {
        this.estimatedDuration = estimatedDuration;
    }

    public List<Employee> getTeam() {
        return team;
    }


    /**
     * Adds a new member to the team
     * @param employee the employee to add as member
     * @return true if the Employee was successfully added to the team, false otherwise
     */

    public boolean addTeamMember(Employee employee)
    {
        /*
            This was not a requirement of the lab task to implement this method, however I figured that the only proper
            way to test removing team members would be to add a team member as well.

            All unit tests, located in ProjectTeamRemoveTeamMemberTest.java, run in sequential order that the program
            would normally be used so this method gets demonstrated and tested as well.

            If this were a full assignment, it would be my assumption that canAddTeamMember(employee) validates the
            client can be added and then calls this method which actually adds them, however we were not required
            to implement canAddTeamMember(employee) for this lab so it would've been out of scope.
        */

        // team.add(Employee) adds the employee to the team list
        if (team.add(Employee))
        {
            int numProjects = employee.getNumberOfProjects();
            employee.setNumberOfProjects(numProjects + 1);
            return true;
        }
        else
        {
            return false;
        }
    }

    public boolean removeTeamMember(Employee employee)
    throws IllegalTeamMemberException
    {
        /*
            It was confusing trying to understand this code and determining what actually constitutes
            a team member being removed. As we are allowed to make assumptions, I made the assumptions that:

            This method checks the numberOfProjects for an employee:

            If the number of projects is 1 or more, they are a valid team member and the method returns true
            and they can be removed from a project

            Otherwise if the number of projects is 0, they are not a valid team member and the method returns false
            and they cannot be removed from a project

            There are other ways to do this but for this project and the specs we were given, it was out of scope for
            this assignment.

         */
        // Get number of projects, employee name, and project name, and save them as variables
        int numProjects = employee.getNumberOfProjects();
        String empName = employee.getName();
        String prjName = getName();

        if (numProjects < 1)
        {
            validTeamMember = false; // Returns false
            // Throws exception because they're not a valid team member
            throw new IllegalTeamMemberException("Employee: " + empName + " is not a member of Project: " + prjName);
        }
        else if (numProjects >= 1)
        {
            employee.setNumberOfProjects(numProjects - 1);
            team.remove(employee);
            validTeamMember = true;
        }

        return validTeamMember;
    }




    /**
     * Verifies the Project has valid dates.
     * @return true if dates are valid, false otherwise.
     */
    public boolean isValidDates(){
       return false;
    }

    /**
     * Verifies that an employee can be added as team member
     * @return true if the Employee can be added to the team, false otherwise.
     */
    public boolean canAddTeamMember(Employee employee){
        // Wasn't sure how to implement this but it wasn't a requirement
        // However I did implement the addTeamMember method
        return false;
    }
}
