//for preview the post image

var input= document.querySelector("#img");

input.addEventListener("change", preview);

function preview()
{
    var fileobject = this.files[0];
    var filereader = new FileReader();

    filereader.readAsDataURL(fileobject);


    filereader.onload= function()
    {
        var image_src= filereader.result;
        var image= document.querySelector("#pic");
        image.setAttribute('src',image_src);
        image.setAttribute('style','display:');
        image.setAttribute('style','border-radius:100px;margin-left:20%');
        
    }
}