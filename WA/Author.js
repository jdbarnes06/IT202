function findAuthor(author)
{
    const xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
    }

    xmlhttp.open("GET", "Author.php?a=" + author, true);
    xmlhttp.send();
}