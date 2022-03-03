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
            return alert("Names can only contain letters.");
        }

        names[i] = name;
    }

    var password = document.getElementById("password").value;

    if (password.length > 12)
    {
        return alert("Password can't have more than 12 characters.");
    }

    if (password.match(/[A-Z]+/) == null)
    {
        return alert("Password must have at least 1 uppercase letter.");
    }

    if (password.match(/[0-9]+/) == null)
    {
        return alert("Password must have at least 1 number.");
    }

    if (password.match(/[~`!@#\$%\^\&*\(\)_\-+={[}\]|\\:;"'<,>.?/]+/) == null)
    {
        return alert("Password must have at least 1 special character.");
    }

    var idNumber = document.getElementById("idnumber").value;

    if (idNumber.match(/^[0-9]{6}$/) == null)
    {
        return alert("ID Number must only contain 6 numbers.");
    }

    var phoneNumber = document.getElementById("phonenumber").value;

    if (phoneNumber.match(/^$/) == null)
    {
        return alert("Phone Number must only contain 10 numbers that are delineated by spaces or dashes between the 3rd and 4th numbers and the 6th and 7th numbers.");
    }

    alert("All information is valid.")
}