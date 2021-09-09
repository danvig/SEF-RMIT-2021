package model;

/**
 * Signals the employee can not be added to a Team.
 * @author Sebastian Rodriguez, 2020. email: sebastian.rodriguez@rmit.edu.au
 */
public class IllegalTeamMemberException extends Exception {
    //public Employee Employee;
    //public Project Project;
    public IllegalTeamMemberException(String Message)
    {
        super(Message);
        // If an Employee is not part of a team
        // MUST identify the Employee name (Employee.getName()) and project name (Project.getName()) in the message
        //String empName = Employee.getName();
        //String prjName = Project.getName();

        //Message = empName + prjName;
        //System.out.print(Message);
    }
}
