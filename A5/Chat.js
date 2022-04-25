function CreateXMLHTTPObj()
{
    const xmlhttp = new XMLHttpRequest();
    var username = document.getElementById("username1").value;
    var password = document.getElementById("password").value;
    var message = document.getElementById("msgsent").value;

    xmlhttp.onreadystatechange = function ()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("errormsg").innerHTML = this.responseText;
        }
    }

    xmlhttp.open("GET", "Sent.php?uname=" + username + "&pwd=" + password + "&msg=" + message, true);
    xmlhttp.send();
}
