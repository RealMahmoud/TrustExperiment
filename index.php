<?php
session_start();
if(!empty($_GET['logged'])){
  include(dirname(__FILE__)."/common/_protected.php");
}
$pagetitle = 'SA -Home';
include(dirname(__FILE__)."/partials/header.php");
?>

<section class="section section_info">

            <div class="card" id="empty_card" style="text-align:center;height:60vh">
                        <div>
                          <img src="./images/idena_black.svg" alt="Idena" width="100px" style="">
                            <h3 class="info_block__accent" style="margin-top: 3em;">Welcome to Simple Auth</h3>
                            <div class="text_block" id="none">Idena is a novel way to formalize people on the blockchain using proof-of-person consensus: Every node is linked to a cryptoidentity, one single person with equal voting power.
Here you can login using your cryptoidentity to create and vote on polls, proposals and register for events posted by the Idena community.</div>
                         </div>
            </div>



</section>


 <!-- this is to close main, div opened in the header -->
 </div>
</main>


<?php
include(dirname(__FILE__)."/partials/footer.php");
?>
