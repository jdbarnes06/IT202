function clearForm()
{
    const ids = ["firstname", "lastname", "password", "idnumber",
        "phonenumber", "emailaddress", "emailconfirmation", "transaction"];

    for (let i = 0; i < ids.length; i++)
    {
        document.getElementById(ids[i]).reset();
    } 
}
