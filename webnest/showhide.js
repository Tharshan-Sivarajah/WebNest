

var a;
function show_hide()
{
    if(a==0)
    {
        document.getElementById("noti").style.display="inline";
        return a=1;
    }
    else
    {
        document.getElementById("noti").style.display="none";
        return a=0; 
    }
}