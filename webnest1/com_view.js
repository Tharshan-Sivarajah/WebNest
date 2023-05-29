var div=document.getElementById('show_com');
var display = 0;

function com_show()
{
    if(display== 1)
    {
        div.style.display='block';
        display=0;
    }
    else
    {
        div.style.display='nonw';
        display=1;
    }
}