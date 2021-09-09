# Student Details

Name: Daniel Viglietti

ID: s3844180


<br />

# Activity 2

## Question 1:

The diagram seems to violate typical conventions of sequence diagrams and makes it much harder to understand so it's difficult to determine what's right and what's wrong with it. Based on my limited knowledge of sequence diagrams I inferred the following points that might be errors.

1) The alt section, is missing a divider line across the center that separates the if/else conditions. This needs to be added in. However, I will be making adjustments to that alt section as I believe the method has been incorrectly depicted and needs some components added and removed from it.

2) It seems methods aren't being called correctly. It doesn't make sense for updateAccount() to call updateCatalog() or for updateCatalog() to call printReceipt(). Ideally, methods like printReceipt() should be called by the Loan class after transactions and updateCatalog() should be called by isAvailable() but not through updateAccount().

3) There is no activation bar for "Student" meaning that there's no way for a student to call searchByAuthor. A method should be added to accomodate for this and an activation bar added to the diagram.

4) Certain return methods should have arguments within them. For example, updateCatalog() appears to be updating book data should have the Book ID as an argument, so it should be updateCatalog(int bookID). checkOut() and payFines() should take a Student ID as an argument so that the system knows who is borrowing the book and whose fines to check. Thus, checkOut could become checkOut(int studentID) and payFines could become payFines(int studentID).

5) There's a spelling error in the alt section of the diagram. There is a method called "isAcailable" however that appears to be an error and should be "isAvailable", there shouldn't be two separate methods because of this spelling error.

6) Perhaps there should be a return to the student that tells them if the book is available. And then the student can call the checkOut() method. It doesn't make sense for isAvailable() to call checkOut() and so I will rectify this when I update the diagram. The checkOut process can be put in an alt by depicting whether the user has a fine that they need to pay or not. checkFines() should likely take the argument studentID so it knows which student it is referring to.

7) The return methods updateAccount() and newSearch() do not seem to make any sense as to what they do and their use unclear, whether that's the way they're named, defined, or the class they're assigned to. Either way, I will likely remove these.

These are some points that I believe are errors in the diagram. Unfortunately because the diagram does not seem to follow traditional conventions of sequence diagrams it was hard to determine if there's anything else wrong however I believe these are good points to raise and may even make the process more efficient.


## Question 2:

In my opinion, I don't believe adding an onHold state will affect the diagram or code much. If my assumption and we treat "isAvailable(bookID)" as a boolean then we can just treat is as such that if the book is in stock the boolean is true, if the book is taken out or on hold for someone else the boolean is false. String variables or boolean variables can help by using a conditional to return true or false. The code will need to be modified to address this however other than that there shouldn't be too big of an impact on the code and diagram.

## Question 3:
Please refer src/main/java/activity2 for sequence diagram and code

For this, I demonstrated some logic of the new sequence diagram as well as used dummy returns and empty methods which further helped represent the diagram as well as avoid compiler errors. According to the lecturer, we "can use dummy returns to avoid compiler errors". By that I presume it's similar to Activity 1 with as much logic as possible implemented.


<br />


# Activity 3

## Question 4:

These are the assumptions I made when modelling the class diagram:

1) Loans have a 0..* relationship with student. I made the assumption that a student can have anywhere from 0 to many loans at the library.

2) Student has a 0..1 relationship with loans. I made the assumption that a single loan is only applicable to a single student. The student who makes the loan.

3) I made the assumption that isAvailable(int bookID) is a boolean method. I made this assumption as it would make more sense for a true/false variable to determine whether a book is available or not.

4) In addition to point 3, isAvailable uses multiple boolean variables (inStock, onHold, outOfStock) to determine the returned value of available (true or false).

5) The Student class and Book class do not have a relationship or association with each other. This is because the classes have no direct contact with each other and rather there is a middle man, the Catalog class, which handles the student searching for a book and seeing if it's available.

6) The Book and Loan class do not have an association or relationship with each other. There is no reason that these classes communicate with each other because if a student wants to loan a book, they search through the catalogue to do it.


## Question 5:

Assumption 3 - This method could've been a String method instead and could return the status of the book as either "In Stock", "Out of Stock" or "On Hold". I didn't use this alternative as I believed a boolean value would be a much better way to deal with it and would make the code more efficient.

Assumption 4 - An alternative to using booleans to determine the return value of "isAvailable" would be to create a single string variable called "status" and assign it a value of either "In Stock", "Out of Stock" or "On Hold" and a conditional would be used to determine the boolean (E.G. if status equals in stock then isAvailable = true). Either method would be useful however I prefer to work with booleans especially when the output is a boolean value hence why I chose to go with the method I used.