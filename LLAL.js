function validate()
{
    const names = ["firstname", "lastname"];

    for (let i = 0; i < names.length; i++)
    {
        let name = document.getElementById(names[i]).value;

        if (name.charAt(0) != name.charAt(0).toUpperCase())
        {
            name = name.charAt(0).toUpperCase() + name.substring(1);
        }

        if (name.substring(1) != name.substring(1).toLowerCase())
        {
            name = name.charAt(0) + name.substring(1).toLowerCase();
        }

        if (name.match(/^[A-Za-z]+$/) == null)
        {
            alert("Names can only contain letters.");
            document.getElementById(names[i]).focus();
            document.getElementById(names[i]).select();
            return;
        }

        names[i] = name;
    }

    var password = document.getElementById("password").value;

    if (password.length > 12)
    {
        alert("Password can't have more than 12 characters.");
        document.getElementById("password").focus();
        document.getElementById("password").select();
        return;
    }

    if (password.match(/[A-Z]+/) == null)
    {
        alert("Password must have at least 1 uppercase letter.");
        document.getElementById("password").focus();
        document.getElementById("password").select();
        return;
    }

    if (password.match(/[0-9]+/) == null)
    {
        alert("Password must have at least 1 number.");
        document.getElementById("password").focus();
        document.getElementById("password").select();
        return;
    }

    if (password.match(/[~`!@#\$%\^\&*\(\)_\-+={[}\]|\\:;"'<,>.?/]+/) == null)
    {
        alert("Password must have at least 1 special character.");
        document.getElementById("password").focus();
        document.getElementById("password").select();
        return;
    }

    var idNumber = document.getElementById("idnumber").value;

    if (idNumber.match(/^[0-9]{6}$/) == null)
    {
        alert("ID Number must contain exactly 6 numbers.");
        document.getElementById("idnumber").focus();
        document.getElementById("idnumber").select();
        return;
    }

    var phoneNumber = document.getElementById("phonenumber").value;

    if (phoneNumber.match(/^[0-9]{3}[\s]{1}[0-9]{3}[\s]{1}[0-9]{4}$/) != null)
    {
        phoneNumber = phoneNumber.substring(0, 3) + "-" + phoneNumber.substring(4, 7) + "-" + phoneNumber.substring(8, 12);
    }

    if (phoneNumber.match(/^[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{4}$/) == null)
    {
        alert("Phone Number must contain exactly 10 numbers that are delineated by spaces or dashes between the 3rd and 4th numbers and the 6th and 7th numbers.");
        document.getElementById("phonenumber").focus();
        document.getElementById("phonenumber").select();
        return;
    }

    var emailAddress = document.getElementById("emailaddress").value;
    var emailConfirmation = document.getElementById("emailconfirmation").checked;

    if (emailConfirmation == true)
    {
        if (emailAddress.match(/^[\S]+[@]{1}[\S]+[.]{1}[\S]{2,4}$/) == null) {
            alert("Email Address must contain at least one non-whitespace character, followed by an @, and then at least one other non-whitespace character, followed by a period (.), and then 2-4 non-whitespace characters.")
            document.getElementById("emailaddress").focus();
            document.getElementById("emailaddress").select();
            return;
        }
    }
    else
    {
        if (emailAddress.match(/^[\S]+$/))
        {
            alert("Don't provide an Email Address if you don't want confirmation.")
            document.getElementById("emailaddress").focus();
            document.getElementById("emailaddress").select();
            return;
        }
    }

    verify(names[0], names[1], password, idNumber, phoneNumber, emailAddress);
}

function verify(firstName, lastName, password, idNumber, phoneNumber, emailAddress)
{
    var transaction = document.getElementById("transaction").value;

    const landscapers = [];

    landscapers[0] = { firstName: "Al", lastName: "Adams", password: "A1!", idNumber: "111111", phoneNumber: "111-111-1111", emailAddress: "aladams@gmail.com" }
    landscapers[1] = { firstName: "Bella", lastName: "Brown", password: "B2@", idNumber: "222222", phoneNumber: "222-222-2222", emailAddress: "bellabrown@gmail.com" }
    landscapers[2] = { firstName: "Carlos", lastName: "Cortez", password: "C3#", idNumber: "333333", phoneNumber: "333-333-3333", emailAddress: "carloscortez@gmail.com" }
    landscapers[3] = { firstName: "Deanna", lastName: "Dawkins", password: "D4$", idNumber: "444444", phoneNumber: "444-444-4444", emailAddress: "deannadawkins@gmail.com" }
    landscapers[4] = { firstName: "Edwin", lastName: "Everest", password: "E5%", idNumber: "555555", phoneNumber: "555-555-5555", emailAddress: "edwineverest@gmail.com" }
    landscapers[5] = { firstName: "Freya", lastName: "Ford", password: "F6^", idNumber: "666666", phoneNumber: "666-666-6666", emailAddress: "freyaford@gmail.com" }
    landscapers[6] = { firstName: "Greg", lastName: "Gordon", password: "G7&", idNumber: "777777", phoneNumber: "777-777-7777", emailAddress: "greggordon@gmail.com" }
    landscapers[7] = { firstName: "Hailey", lastName: "Hunter", password: "H8*", idNumber: "888888", phoneNumber: "888-888-8888", emailAddress: "haileyhunter@gmail.com" }

    for (let i = 0; i < landscapers.length; i++)
    {
        for (let j = 0; j < 6; j++)
        {
            if (landscapers[i].firstName == arguments[0] &&
                    landscapers[i].lastName == arguments[1] &&
                    landscapers[i].password == arguments[2] &&
                    landscapers[i].idNumber == arguments[3] &&
                    landscapers[i].phoneNumber == arguments[4] &&
                    landscapers[i].emailAddress == arguments[5])
            {
                alert("Welcome " + firstName + " " + lastName + " to Lushest Lawns and Landscaping. You may now " + transaction + ".")
                return;
            }
        }
    }

    alert("No account has been found.")
}