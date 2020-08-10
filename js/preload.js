var imgURL = './images/idena-logo-dark.svg';
var moonURL = './images/moon.svg';
var sunURL = './images/sun.svg';
var mode = localStorage.getItem('mode') || '';


if (mode == 'light') {
  document.getElementsByTagName('html')[0].classList.remove('darkmode');
  document.querySelector('.header_logo a img').setAttribute('src', './images/idena-logo.svg');
  document.getElementById('moon').classList.remove('rem');
  document.getElementById('sun').classList.add('rem');
} else {
  document.getElementsByTagName('html')[0].classList.add('darkmode');
  document.querySelector('.header_logo a img').setAttribute('src', './images/idena-logo-dark.svg');
  document.getElementById('moon').classList.add('rem');
  document.getElementById('sun').classList.remove('rem');
}