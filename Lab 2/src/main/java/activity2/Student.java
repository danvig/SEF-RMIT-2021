package activity2;

public class Student {
    // I assumed the question wanted us to implement logic and such where we could
    // And dummy methods as well to avoid compiler errors

    // Ultimately I assumed this code should reflect the sequence diagram and class diagram and
    // The process they're demonstrating

    // Call to other classes
    private Loan loan;
    private Catalog catalog;

    // Variables
    private int studentID;

    // Methods
    // Student uses this to search
    public void search()
    {
        catalog.searchByAuthor();
    }

    // Student can initiate this if/when they checkout
    public void checkOut(int studentID)
    {
        studentID = this.studentID;
        // Call the checkOut from Loan
        // No need to call payFines as this will be handled in Loan class
        loan.checkOut(studentID);
    }
}
