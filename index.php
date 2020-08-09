<?php
session_start();
if(!empty($_GET['logged'])){
  include(dirname(__FILE__)."/common/_protected.php");
}
$pagetitle = 'Idena.Codes - Home';
include(dirname(__FILE__)."/partials/header.php");
?>

<section class="section section_info">

  <div class="card" id="empty_card" style="text-align:center;height:40vh">
    <div>
      <img src="./images/idena_black.svg" alt="Idena" width="100px" class="mb-1">

      <h3 class="info_block__accent mb-1" style="margin-top: 0em;">Idena.Codes</h3>
      <div class="text_block" id="none">Idena.Codes is a tool for Idena users to improve the trust process. It allows
        nodes looking to give out their invites a way to prove that
        their invitees node is setup and synced.


      </div>

    </div>
  </div>
</section>

  <section class="section section_info">

    <div class="card" id="empty_card" style="text-align:center;height:40vh;>
               <div>

               <h1 class=" info_block__accent">

      <h4 class="info_block__accent" style="margin-top: 0em;">1. Have a fully synced and properly set up Idena node<br>
2. Log in using the Idena Sign on<br>
3. Use create a token. Share with the person who invited<br>
to verify that your node is correctly set up<br>
4. The inviter can then send you invitation or activate it<br>
through the client and you will be part of the Idena network once you pass validation</h4>


    </div>
    
    </section>
    <section class="section section_info">

      <div class="card" id="empty_card" style="text-align:center;">
        <div>

          <h1 class="text_block m-auto" id="none">For an invite to the Idena Network, follow the process above and join our <a
              href="https://t.me/Idenacodes" target="_blank">Telegram</a>

        </div>
      </div>

    </section>


    <!-- this is to close main, div opened in the header -->
    </div>
    </div>
    </main>


    <?php
include(dirname(__FILE__)."/partials/footer.php");
?>