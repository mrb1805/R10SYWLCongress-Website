var frmvalidator = new Validator("phase1Reg");
frmvalidator.addValidation("firstName","req","Please enter your First Name");
frmvalidator.addValidation("firstName","maxlen=20","First Name is too long");

frmvalidator.addValidation("lastName","req","Please enter your Last Name");
frmvalidator.addValidation("lastName","maxlen=20","Last Name is too long");

frmvalidator.addValidation("email","req","Plese enter your Email ID");
frmvalidator.addValidation("email","maxlen=50","Email ID is too long");
frmvalidator.addValidation("email","email","Please enter a valid Emial ID");

frmvalidator.addValidation("organisation","req","Please enter your Organisation");
frmvalidator.addValidation("organisation","maxlen=20","Organisation Name is too long");

frmvalidator.addValidation("affiliation","req","Please enter affiliation");
frmvalidator.addValidation("affiliation","maxlen=30","Please enter a valid affiliation");

frmvalidator.addValidation("membershipNumber","req","Plese enter your IEEE Membership Number");
frmvalidator.addValidation("membershipNumber","maxlen=10","Enter a valid IEEE Membership Number");
frmvalidator.addValidation("membershipNumber","num","Enter a valid IEEE Membership Number");

frmvalidator.addValidation("membershipAge","req","Plese enter your years in IEEE");
frmvalidator.addValidation("membershipAge","maxlen=2","Enter a valid number");
frmvalidator.addValidation("membershipAge","num","Enter a valid number");

frmvalidator.addValidation("Q2","req","Please share your volunteer roles in IEEE");
frmvalidator.addValidation("Q2","minlen=5","Please write more about your volunteer roles in IEEE");

frmvalidator.addValidation("Q3","req","Please share your expectations from this event");
frmvalidator.addValidation("Q3","minlen=5","Please write more your your expectations from this event");
