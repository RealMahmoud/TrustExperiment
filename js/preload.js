var imgURL = './images/logo_black.png';
var moonURL = './images/moon.svg';
var sunURL = './images/sun.svg';
var mode = localStorage.getItem('mode') || '';


if (mode == 'light') {
  document.getElementsByTagName('html')[0].classList.remove('darkmode');
  document.querySelector('.header_logo a img').setAttribute('src', './images/logo_light.png');
  document.getElementById('moon').classList.remove('rem');
  document.getElementById('sun').classList.add('rem');
} else {
  document.getElementsByTagName('html')[0].classList.add('darkmode');
  document.querySelector('.header_logo a img').setAttribute('src', './images/logo_black.png');
  document.getElementById('moon').classList.add('rem');
  document.getElementById('sun').classList.remove('rem');
}