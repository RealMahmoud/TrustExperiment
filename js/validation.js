var currentFlipId;
var answers = [];
var FlipsArray = [];

function chooseRight() {
    answers[currentFlipId] = 'Right';
    
    document.getElementById('leftButton').disabled = false;
    document.getElementById('rightButton').disabled = true;
}

function chooseLeft() {
    answers[currentFlipId] = 'Left';
    document.getElementById('rightButton').disabled = false;
    document.getElementById('leftButton').disabled = true;

}

function noLeftnoRight() {
    document.getElementById('rightButton').disabled = false;
    document.getElementById('leftButton').disabled = false;
}

function nextFlip() {
    if (currentFlipId >= getFlips().length - 1) {
        return console.log(currentFlipId + ' ? ' + getFlips().length - 1);
    } else {

        loadFlip(currentFlipId + 1);
    }

}

function prevFlip() {

    if (currentFlipId <= 0) {
        return console.log(currentFlipId);
    } else {

        loadFlip(currentFlipId - 1);
    }
}

function checkButtons() {
    if (currentFlipId == getFlips().length - 1) {
        document.getElementById('prevButton').classList.remove('disabled');
        document.getElementById('prevButton').classList.add('notDisabled');
        document.getElementById('nextButton').classList.add('disabled');
        document.getElementById('submitButton').classList.remove('hidden');
    } else if (currentFlipId == 0) {
        document.getElementById('nextButton').classList.remove('disabled');
        document.getElementById('nextButton').classList.add('notDisabled');
        document.getElementById('prevButton').classList.add('disabled');
        document.getElementById('submitButton').classList.add('hidden');
    } else {
        document.getElementById('nextButton').classList.remove('disabled');
        document.getElementById('prevButton').classList.remove('disabled');
        document.getElementById('nextButton').classList.add('notDisabled');
        document.getElementById('prevButton').classList.add('notDisabled');
        document.getElementById('submitButton').classList.add('hidden');
    }
}

function loadFlip(id) {
    currentFlipId = id;
    document.getElementById('currentFliph1').innerHTML = `${currentFlipId+1}/${(getFlips().length)}`;
    loadAnswer(id);

    changeImage(getFlips()[id])
    checkButtons();

}

function loadAnswer(id) {
    if (answers[id] == 'Right') {
        chooseRight();
    } else if (answers[id] == 'Left') {
        chooseLeft();
    } else {
        noLeftnoRight();
    }

}

function changeImage(image) {
    document.getElementById('flipImage').src = image;
}

function getFlips() {
    return FlipsArray

}

function loadFlipsFromDB() {
    
    for (var i = 1; i <= 20; i++) {
        FlipsArray.push('./flips/flip'+i+'.PNG')
    }
    
    for (var i = 0; i <= FlipsArray.length - 1; i++) {
        answers.push('')
    }

}



var totalSeconds = 0;



var TimeCounter;

function setTime() {
    ++totalSeconds;
    if (document.getElementById("validationTime") == null) {

        stopTimer();
    } else {
        document.getElementById("validationTime").innerHTML = pad(parseInt(totalSeconds / 60)) + ':' + pad(totalSeconds % 60);

    }
}

function pad(val) {
    var valString = val + "";
    if (valString.length < 2) {
        return "0" + valString;
    } else {
        return valString;
    }
}




function startValidation() {

    document.getElementById("startScreen").classList.add('hidden');
    document.getElementById("FlipsScreen").classList.remove('hidden');
    loadFlipsFromDB();
    loadFlip(0);
    TimeCounter = setInterval(setTime, 1000);
}

function stopTimer() {
    clearInterval(TimeCounter);
    TimeCounter = null;
    TimeCounter = setInterval('', 0);
}

function endValidation() {


    var urlofwebsite = window.location.origin + window.location.pathname;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

          try {
              var data = JSON.parse(xmlhttp.responseText);
          } catch(err) {
              
              return;
          }
          if (data['results'] == true) {
            document.getElementById("finishScreen").classList.remove('hidden');
            document.getElementById("FlipsScreen").classList.add('hidden');
        } else {
         alert(data['results']);
        }
      }
  };

  xmlhttp.open("POST", urlofwebsite+'services/submitAnswers.php', true);
  xmlhttp.send(JSON.stringify(answers));

}