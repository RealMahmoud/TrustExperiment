<?php
session_start();
$pagetitle = 'TrustExperiment - Check Token';
include(dirname(__FILE__)."/partials/header.php");
?>

<section class="section section_info">


              <div class="card" id="empty_card" style="text-align:center;">

                <h5 class="info_block__accent">Enter Token</h5>

                <form METHOD="POST" style="margin-left:10vh;margin-right:10vh;margin-bottom:10vh;" onsubmit="check(); return false;">

                    <div class="input-group">
                      <input id="token" class="formVal form-control" value="<?php if(isset($_SESSION['token'])){echo $_SESSION['token'];};?>"></input><br>
                    </div>
                    <a class="btn btn-secondary btn-small" href='#' onclick="paste(); return false;">
                        <i class="icon icon--thin_arrow_right"></i>
                        <span>Paste</span>
                        <i class="icon icon--thin_arrow_left"></i>
                    </a>
                      <a class="btn btn-secondary btn-small" href='#' onclick="Clear(); return false;">
                          <i class="icon icon--thin_arrow_left"></i>
                          <span>Clear</span>
                          <i class="icon icon--thin_arrow_right"></i>
                      </a>


                    <a class="btn btn-secondary btn-small" href='#' onclick="check(); return false;">

                        <span id="text_submit">Check</span>

                    </a>


                </form>
                <div id='container'>

                  <p class="viplbl"id="result-id">ID : </p>
                  <p class="voteslbl"id="result-token">Token : </p>
                  <p class="viplbl" id="result-nonce">Nonce : </p>
                  <p class="catlbl"id="result-sig"style="word-break: break-all;">Sig :</p>
                  <p  class="voteslbl"id="result-addr">Address :</p>
                  <p  class="catlbl"id="result-age">Age :</p>
                  <p  class="violbl"id="result-status">Status :</p>
                  <p class="timelbl"id="result-doubleCheck">Double Check : </p>
                  <p class="viplbl"id="result-authenticated">Authenticated : </p>
                  <p class="timelbl"id="result-time">Time :</p>

  </div>

</div>

  </section>


 <!-- this is to close main, div opened in the header -->
 </div>
</main>
<script type="text/javascript">
async function paste() {
  const text = await navigator.clipboard.readText();
  document.getElementById("token").value = text;
}
function Clear(){
  document.getElementById("token").value = '';
}

function doubleCheck(nonce,sig,address){
  var formData = new FormData();
  formData.append('nonce', nonce);
  formData.append('sig', sig);
  formData.append('addr', address);
  ajax_post('./services/doubleCheck.php', formData, function(data) {
  document.getElementById("result-doubleCheck").innerHTML = 'Double Check : '+ data['result'];
  });
}
function apiPull(address){
  ajax_get('https://api.idena.org/api/identity/'+address+'/age', function(data) {
  document.getElementById("result-age").innerHTML = 'Age : '+ data['result'];
  });
  ajax_get('https://api.idena.org/api/identity/'+address, function(data) {
  document.getElementById("result-status").innerHTML = 'Status : '+ data['result']['state'];
  });


}
function check(){
  var formData = new FormData();
  formData.append('token', document.getElementById("token").value);
  ajax_post('./services/checkToken.php', formData, function(data) {
document.getElementById("result-id").innerHTML = 'ID : '+data['id'];
document.getElementById("result-token").innerHTML = 'Token : '+data['token'];
document.getElementById("result-nonce").innerHTML = 'Nonce : '+data['nonce'];
document.getElementById("result-sig").innerHTML = 'Sig : '+data['sig'];
document.getElementById("result-addr").innerHTML = 'Address : '+data['addr'];

doubleCheck(data['nonce'],data['sig'],data['addr']);
if(data['authenticated'] == 1){
  data['authenticated'] = 'True';
}else{
  data['authenticated'] = 'False';
}

document.getElementById("result-authenticated").innerHTML = 'Authenticated : '+data['authenticated'];
document.getElementById("result-time").innerHTML = 'Time : '+moment.utc(data['time']).local().format('YYYY-MM-DD HH:mm A');
apiPull(data['addr']);
  });
}
</script>

<?php
include(dirname(__FILE__)."/partials/footer.php");
?>
