package startpoint;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;



public class StudentListener implements ActionListener {
    private Student student;



    public StudentListener(Student s) {
        student = s;
    }


    public StudentListener() {
        student = new Student();
    }



    private void updateName(String firstName, String lastName, String address) {
        student.updateName(firstName, lastName);
        student.setAddress(address);
    }



    @Override
    public void actionPerformed(ActionEvent e) {
        // TODO
    
    }



}