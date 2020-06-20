<?php
session_start();
include(dirname(__FILE__)."/common/_protected.php");
$pagetitle = 'TrustExperiment - Display Token';
include(dirname(__FILE__)."/partials/header.php");
?>
<section class="section section_info">

            <div class="card" id="empty_card" style="text-align:center;height:60vh">

              <h4 class="info_block__accent">Your Token</h4>

              <form METHOD="POST" style="margin:10vh;">
                  <div class="input-group">
                    <input id="token" class="formVal form-control" value="<?php echo $_SESSION['SAtoken'];?>"></input><br>
                  </div>
                  <div class="input-group">
                  <a class="btn btn-secondary btn-small" href="#"onclick="copy(); return false;">
                      <span id="text_submit">Copy</span>
                      <i class="icon icon--thin_arrow_right"></i>
                  </a>
                  </div>

              </form>
</div>



</section>



 </div>
</main>
<script>
function copy(){
var copyText = document.getElementById("token");
copyText.select();
copyText.setSelectionRange(0, 99999);
document.execCommand("copy");
}
</script>

<?php
include(dirname(__FILE__)."/partials/footer.php");
?>
