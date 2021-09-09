package startpoint;




public class Student {
    private String firstName;
    private String lastName;
    private String course;
    private String address;





    public String getFirstName() {
        return firstName;
    }

    public void setFirstName(String fn) {
        firstName = fn;
    }

    public String getLastName() {
        return lastName;
    }

    public String getCourse() {
        return course;
    }


    public String getAddress() {
        return address;
    }


    public void setAddress(String a) {
        address = a;
    }


    public void updateName(String fn, String ln) {
        firstName = fn;
        lastName = ln;
    }
}