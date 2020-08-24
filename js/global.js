
var imgURL = './images/logo_black.png';
var moonURL = './images/moon.svg';
var sunURL = './images/sun.svg';
var parent = document.querySelector(".header_logo");

parent.querySelector("a img").src = imgURL;
var mode = localStorage.getItem('mode') || '';


var parent2 = document.querySelector(".justify-content-between");
var modechange = parent2.querySelector(".col-auto:last-child");


document.getElementsByClassName('header')[0].classList.add('fixed-header');
document.getElementsByClassName('main')[0].classList.add('extra-main-padding');


scrolltop = document.createElement("button");
  scrolltop.classList.add("btn");
  scrolltop.classList.add("btn-icon");
  scrolltop.classList.add("hide");
  scrolltop.setAttribute("id","scrollTop");
  scrolltop.setAttribute("onclick","window.scrollTo({ top: 0, behavior: \'smooth\' });");
  scrolltop.innerHTML = '<i class="icon icon--thin_arrow_up"></i>';

  themetop = document.createElement("span");
  themetop.setAttribute("id","themeTop");
  //themetop.classList.add("hide");
  themetop.innerHTML = '<button type="button" id="moon" class="rem btn btn-icon theme"'
              +' onclick="localStorage.setItem(\'mode\', \'dark\');'
              +'document.querySelector(\'.header_logo a img\').setAttribute(\'src\',\'./images/logo_black.png\');'
              +'document.getElementsByTagName(\'html\')[0].classList.add(\'darkmode\');'
              +'document.getElementById(\'moon\').classList.add(\'rem\');'
              +'document.getElementById(\'sun\').classList.remove(\'rem\');'
              +'" id="moon">'
              +'<img src="./images/moon.svg" width="18px" height="18px"' 
              +'style="opacity: 0.8;"/></button>'
        +'<button type="button" id="sun" class="rem btn btn-icon theme"'
              +' onclick="localStorage.setItem(\'mode\', \'light\'); document.getElementsByTagName(\'html\')[0].classList.remove(\'darkmode\');'
              +'document.querySelector(\'.header_logo a img\').setAttribute(\'src\',\'./images/logo_light.png\');'
              +'document.getElementById(\'moon\').classList.remove(\'rem\');'
              +'document.getElementById(\'sun\').classList.add(\'rem\');'
              +'" id="sun">'
              +'<img src="./images/sun.svg" width="18px" height="18px"' 
              +'style="opacity: 0.8;"/></button>'


  document.getElementsByTagName('body')[0].append(scrolltop);
  document.getElementsByTagName('body')[0].append(themetop);

  if (mode == 'light') {
    parent.querySelector("a img").src = './images/logo_light.png';
    document.getElementById('moon').classList.remove('rem');
    document.getElementById('sun').classList.add('rem');

  } else {

    parent.querySelector("a img").src = imgURL;
    document.getElementById('sun').classList.remove('rem');
    document.getElementById('moon').classList.add('rem');
  } 

