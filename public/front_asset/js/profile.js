function showAppointment() {
    var x = document.getElementById("allAppointment");
    if(x.style.display === 'none') {
        x.style.display = 'block';
    }else {
        x.style.display = 'none';
    }
}
function display_info(evt, info) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("profile-content");
    for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("active", "");
    }
    document.getElementById(info).style.display = "block";
    evt.currentTarget.className += "active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();