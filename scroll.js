window.onscroll = function() {myFunction()};

function myFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("scrolldown").className = "showdown";
document.getElementById("scrollup").className = "showup";
    } else {
        document.getElementById("scrolldown").className = "hidedown";
document.getElementById("scrollup").className = "hideup";
    }
}

function scrolldown()
{
	document.body.scrollTop=2000;
}

function scrollup()
{
	document.body.scrollTop=0;
}