function openDropdown(evt, tabName) {
    var i, dropdowncontent, dropdownlinks;

    dropdowncontent = document.getElementsByClassName("dropdown-content");
    for (i = 0; i < dropdowncontent.length; i++) {
        dropdowncontent[i].style.display = "none";
    }

    dropdownlinks = document.getElementsByClassName("dropdown-links");
    for (i = 0; i < dropdownlinks.length; i++) {
        dropdownlinks[i].className = dropdownlinks[i].className.replace(" active", "");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function openTab(evt, tabName)
{
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");

    for (i = 0; i < tabcontent.length; i++)
    {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");

    for (i = 0; i < tablinks.length; i++)
    {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

/*function openDropDown(evt, dropDownName) {
    var i, content, dropdownlinks;

    content = document.getElementsByClassName("dropdown");
    for (i = 0; i < content.length; i++) {

    }
}*/

function openPages(evt, pageName) {
    var i, pagecontent, pagelinks;

    pagecontent = document.getElementsByClassName("pages");
    for (i = 0; i < pagecontent.length; i++) {
        pagecontent[i].style.display = "none";
    }

    pagelinks = document.getElementsByClassName("page-links");
    for (i = 0; i < pagelinks.length; i++) {
        pagelinks[i].className = pagelinks.className.replace(" active", "");
    }

    document.getElementById(pageName).style.display = "content";
    evt.currentTarget.className += " active";
}
