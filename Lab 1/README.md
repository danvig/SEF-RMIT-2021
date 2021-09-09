# SOFTWARE ENGINEERING FUNDAMENTALS Lab #1: Week 1-3.

This assessment is part of the _individual assessments_ of the course. 



<br />

## Introduction
This assessment evaluates the following CLOs:

- CLO 1: Explain and apply the main aspects of software engineering.
- CLO 5: communicate effectively with others, especially regarding the progress of the system development and the content of the design by means of reports and presentations.

The following topics are assessed:

- Basic Git Use.
- Releases
- Refactoring


<br /><br />


## Initial Setup [MANDATORY]
Open your git console, and perform the following commands to complete the set up for the lab.


#### Mac Users
You can complete this using regular console, or _Git Bash_. In any case, do the following before doing anything else.

1. Open a console and type the following:
```
history -c
exit
```

2. Open a _new_ console and perform the following. **You must use your RMIT University email account ONLY.**

```
git config --global user.name “[firstname lastname studentID]”
git config –global user.email “student.email@student.rmit.edu.au”
git config –global color.ui auto
```


#### Windows Users
You must use _Git Bash_ **only** to complete this assigment.

1. Create a new folder that you are going to use for the assigment.
3. Open _Git Bash_ on that location, by doing `Right Click -> Git Bash Here`
2. Perform the following commands. **You must use your RMIT University email account ONLY.**

```
history -c
git config --global user.name “[firstname lastname studentID]”
git config –global user.email “student.email@student.rmit.edu.au”
git config –global color.ui auto
```




<br /><br />



## Assignment Activities [MANDATORY]

**Everything needs to be solved using command console _only_ (which console you use depends on your operative system). Evidence will be submitted in the last part. If you don't use console, you won't pass the assignment. If you do not submit the console log, you will get no marks.**.


1. Clone the assigment repo to your computer. Make sure all branches are downloaded. Double check that it has been imported as a _Maven project_ in your IDE.

2. This project should have two branches: `master` and `develop`. Complete the following steps using git commands. Your console log file will be checked for consistency. _A valid answer with no commands will grant you 0 marks for this question._
 
    **2.a.** Check that the `develop` branch is there. If it isn't there, use another git command to _pull it from the origin_.
    
    **2.b.** Move yourself to the `master` branch, if you are not there.
    
    **2.c.** _Bring_ or _merge_ the changes from `develop` to the `master` branch. This needs to be a correct merge, without using external tools, and having a correct Java syntax at the end.
    
    **2.d.** Commit your changes to the master branch.
    
    
3. Move to the `master` branch, if you are not there already. There is a file called `Answers.md`. You need to _edit_ this file with your answers.

    **3.a. Read the classes `Student` and `StudentListener`. Do they need any type of refactoring? Explain your reasoning on what you would do.** Do not use more than 150 words to explain this. Every choice should be EXPLAINED VERY CLEARLY, and the reasoning should be sound and justified properly. Do not paste definitions here, explain it according to the code. _(NOTE: You do not need to modify the classes or make any of this changes NOW, You will do so in point 4; you only need to explain them.)_

    **3.b. How many commits were made by the tutor to set up the assignment?** You need to answer this questions by using the appropriate git commands. Your console log file will be checked for consistency. _A valid answer with no commands will grant you 0 marks for this question._


4. Create a new branch called `refactoring`. The new branch `refactoring` should be branching off the `master` branch. 

     **4.a.** Move to the new branch `refactoring`.
     
     **4.b** Complete the refactorings that you explained on 3.a. They need to match exactly what you said, and the Java code should be workable. Commit this changes and send them to the remote.
     





<br /><br />


## Console Log Evidence [MANDATORY]
You need to submit the evidence that you used the Git console to solve this. Submitting this is mandatory.

Make sure you are on the `master` branch. Perform the following commands:

```
history > commands.txt
git add commands.txt
git checkout master
git commit -m "Adding command history"
git push origin master
```

<br /><br />


## Rubric

Please check the rubric detailed in Canvas.
