package activity2;

public class Loan {
    // I assumed the question wanted us to implement logic and such where we could
    // And dummy methods as well to avoid compiler errors
    // Ultimately I assumed this code should reflect the sequence diagram and class diagram and
    // The process they're demonstrating

    // Variables
    public boolean hasFines;

    // Methods
    public double checkFines(int studentID)
    {
        // dummy return
        return 0.0;
    }

    public void payFines(int studentID)
    {
        // dummy return
    }

    public void printReceipt()
    {
        // dummy return

    }

    public void checkOut(int studentID)
    {
        if (this.checkFines(studentID) < 0)
        {
            // They have no fines so return false
            hasFines = false;
        }
        else
        {
            // They have a fine and they must pay!
            hasFines = true;
            payFines(studentID);
        }

        // Once they've paid their fines (or no fines are found) print the receipt
        printReceipt();
    }
}
