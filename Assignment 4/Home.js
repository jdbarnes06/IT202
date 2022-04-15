function validate()
{
    const names = ["landscaperfirst", "landscaperlast"];

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

    var landscaperID = document.getElementById("landscaperid").value;

    if (landscaperID.match(/^[0-9]{6}$/) == null)
    {
        alert("ID Number must contain exactly 6 numbers.");
        document.getElementById("landscaperid").focus();
        document.getElementById("landscaperid").select();
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
        if (emailAddress.match(/^[\S]+[@]{1}[\S]+[.]{1}[\S]{2,4}$/) == null)
        {
            alert("Email Address must contain at least one non-whitespace character, followed by an @, and then at least one other non-whitespace character, followed by a period (.), and then 2-4 non-whitespace characters.");
            document.getElementById("emailaddress").focus();
            document.getElementById("emailaddress").select();
            return;
        }
    }

    document.forms["homeform"].submit();
}

function placeMessage()
{
    if (confirm("Before placing an order, you must have booked an appointment. Click OK if you have one or Cancel if not.") == false)
    {
        location.href = "Book.php";
        return;
    }
    else
    {
        document.forms["orderform"].submit();
    }
}

function updateMessage()
{
    if (confirm("You are about to update this order. Continue?") == true)
    {
        document.getElementById("confirm").value = "true";
        document.forms["updateform"].submit();
    }
}

function cancelAppMessage()
{
    if (confirm("You are about to cancel this appointment. Continue?") == true) {
        document.getElementById("confirm").value = "true";
        document.forms["cancelappform"].submit();
    }
    else
    {
        location.href = "CancelApp.php";
    }
}

function cancelOrderMessage()
{
    if (confirm("You are about to cancel this order. Continue?") == true)
    {
        document.getElementById("confirm").value = "true";
        document.forms["cancelorderform"].submit();
    }
}