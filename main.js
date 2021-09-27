var currentImage = "";
var selectedImage=[];

function populateList()
{
    var criteria = document.getElementById("filterCriteria").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        createComboOptions(JSON.parse(this.responseText));
      }
    };
    xmlhttp.open("POST", "listExtractor.php?", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("criteria=" + criteria);
    
}

function searchImage(criteria, subCriteria)
{
    var favList = document.getElementById("favouriteStorage").innerHTML;
    if(criteria == undefined || criteria=="")
    {
        criteria == "";
    }

    if(subCriteria == undefined || subCriteria=="")
    {
        subCriteria == "";
    }

    var term = document.getElementById("searchBox").value;

    window.open("imagelist.php?searchTerm="+term+"&criteria="+criteria+"&subCriteria="+subCriteria, "&favourites="+favList, "_self");
}

function createComboOptions(obj)
{
    var selectBox = document.getElementById("nameList");

    for(var optionCnt=selectBox.options.length;optionCnt>=0;optionCnt--)
    {
        selectBox.remove(optionCnt);
    }

    for(var cnt=0;cnt<obj.length;cnt++)
    {
        var comboOption = document.createElement("option");
        
        if(obj[cnt]["CountryName"] != undefined)
        {
            comboOption.text = obj[cnt]["CountryName"];
        }
        else
        {
            comboOption.text = obj[cnt]["CityName"];
        }

        selectBox.add(comboOption);
    }

    selectBox.disabled = false;
}

function filterResults()
{
    var criteria= document.getElementById("filterCriteria").value;
    var subCriteria = document.getElementById("nameList").value;

    if(criteria == "")
    {
        alert("Please select a criteria");
    }
    else if(subCriteria == "")
    {
        alert("Please select a " + criteria);
    }
    else
    {
        searchImage(criteria,subCriteria);
    }
}
//****************************************************** */

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1};
  if (n < 1) {slideIndex = slides.length};
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  };
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  };
  slides[slideIndex-1].style.display = "block";
  currentImage = slides[slideIndex-1].id;
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}

function addToFavourites()
{
    var favList = document.getElementById("favouriteStorage").innerHTML;
    favList = favList.trim();
    alert(favList);

    var favourites = favList.split("+");
    console.log(favList);

    if(favourites.indexOf(currentImage) == -1)
    {
        favList = favList + "+"+ currentImage;
        alert("Successfully added to favourites!");
        window.open("imageList.php?favourites="+favList, "_self");
    }
    else
    {
        alert("Image already added to favourites");
    }
}

function viewFavourites()
{
    var favList = document.getElementById("favouriteStorage").innerHTML;
    console.log(favList);
}