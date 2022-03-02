function validate()
{
    const names = ["firstname", "lastname"];

    for (let i = 0; i < names.length; i++)
    {
        let name = document.getElementById(names[i]).value;

        if (name.charAt(0) != name.charAt(0).toUpperCase())
        {
            name = name.charAt(0).toUpperCase() + name.substring(1);
            names[i] = name;
        }

        if (name.substring(1) != name.substring(1).toLowerCase())
        {
            names[i] = name.charAt(0) + name.substring(1).toLowerCase();
        }

        if (name.match(/^[A-Za-z]+$/) == null)
        {
            return alert("Names can only contain letters.");
        }
    }
}