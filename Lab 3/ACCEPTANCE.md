# Activity 2 #

## Question 3: In the V-Model, the unit test is performed in which phase? ##

Unit Testing is performed in the validation phase, which involves "dynamic analysis method". The testing is completed by writing and executing code to test the product, such as writing code to test methods (as seen in Unit Testing) and ensuring that the software meets the expectations of the client. (Ref: https://www.javatpoint.com/software-engineering-v-model)

## Question 4: Are verification and validation the same concept? ##

Verification and Validation are not the same concept. Verification analyses the software without writing any code but by interacting with the application (such as Acceptance Testing), whereas Validation involves writing code and executing it to the test the code and ensuring that it works as expected (such as Unit Testing).

## Question 5: As a Platform Administrator, I want to be able to list any dataset added as Public, so that I can see what I have available ##

These GWT assumes that the platform admin knows that some of the list variables in the code are public variables and that he is familiar with the code. Some examples of these variables are public List Employee and public List Project.

| As a Platform Administrator, I want to be able to list any dataset added as Public, so that I can see what I have available |
| :--- |
| Given that I have administrator rights |
| When I try to get the name of employees assigned to a project |
| Then I will be able to see the names of employees assigned to the project |

| As a Platform Administrator, I want to be able to list any dataset added as Public, so that I can see what I have available |
| :--- |
| Given that I have administrator rights and can access a list |
| When I try to access the list of currently active projects |
| Then I will be able to access the public list of project names to find the current projects |

## Question 6: As a Data Publishing User, I want to see my CSV file online, so that I can preview how it will be seen ##

The code doesn't allude to or mention data publishing users or CSV files, so I am making assumptions that code like this would be implemented in the future. My assumption is that there are methods that export CSV files to the internet but allowing the user to do so.

This is the process I've assumed the Data Publishing User will follow

- Generate the data in the program
- Save the data in a CSV file to a local machine
- Upload the CSV file to an internet server
- Preview through the internet by accessing the file on the server
- Make public when approved so anyone can view

| As a Data Publishing User, I want to see my CSV file online, so that I can preview how it will be seen |
| :--- |
| Given that I want to preview my data |
| When I export it as a CSV |
| Then it will be available to for preview and sharing. |

| As a Data Publishing User, I want to see my CSV file online, so that I can preview how it will be seen |
| :--- |
| Given that I want to preview my CSV file online and I have data publishing rights |
| When I try upload the CSV file to the server |
| Then it will be accessible through the internet. |

| As a Data Publishing User, I want to see my CSV file online, so that I can preview how it will be seen |
| :--- |
| Given that I have uploaded the CSV file to the server |
| When I access it through the internet |
| Then I can preview how it will look online. |

| As a Data Publishing User, I want to see my CSV file online, so that I can preview how it will be seen |
| :--- |
| Given that I have previewed and approved the CSV file |
| When I assign it public access rights |
| Then it will be available to anyone through the internet. |
