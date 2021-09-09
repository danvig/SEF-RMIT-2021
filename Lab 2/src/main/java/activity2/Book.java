package activity2;

public class Book {
    // Variables
    public boolean available;
    public boolean inStock;
    public boolean onHold;
    public boolean outOfStock;

    // I assumed the question wanted us to implement logic and such where we could
    // And dummy methods as well to avoid compiler errors
    // Ultimately I assumed this code should reflect the sequence diagram and class diagram and
    // The process they're demonstrating

    // Methods
    public boolean isAvailable(int bookID)
    {
        // If the book is in stock (indicated by the boolean inStock)
        // Was originally inStock == true but it could be simplified to "InStock"
        if (inStock)
        {
            // The book is available
            available = true;
        }
        // If the book is unavailable for any reason (indicated by the booleans onHold and outOfStock)
        // Was originally onHold == true || outOfStock == true but it could be simplified
        else if (onHold || outOfStock)
        {
            // The book is not available
            available = false;
        }

        updateCatalog(bookID);

        // Return the availability status of a book
        return available;
    }

    public String updateCatalog(int bookID)
    {
        // Dummy return
        return "";
    }
}
