function sendmsg()
{
    const xmlhttp1 = new XMLHttpRequest();
    var username1 = document.getElementById("username1").value;
    var password = document.getElementById("password").value;
    var msgsent = document.getElementById("msgsent").value;

    xmlhttp1.onreadystatechange = function ()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("errormsg").innerHTML = this.responseText;
        }
    }

    xmlhttp1.open("GET", "Send.php?uname1=" + username1 + "&pwd=" + password + "&msg=" + msgsent, true);
    xmlhttp1.send();
}

function receivemsg()
{
    const xmlhttp2 = new XMLHttpRequest();
    var username2 = document.getElementById("username2").value;
    
    xmlhttp2.onreadystatechange = function ()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("msgrcvd").innerHTML = this.responseText;
        }
    }

    xmlhttp2.open("GET", "Receive.php?uname2=" + username2, true);
    xmlhttp2.send();
}
