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
                          <img src="./images/idena_black.svg" alt="Idena" width="100px" style="">
                            
                      <h3 class="info_block__accent" style="margin-top: 0em;">Idena.Codes</h3>
                            <div class="text_block" id="none">Idena.Codes is a tool for Idena users to improve the trust process. It allows nodes looking to give out their invites a way to prove that 
                              their invitees node is setup and synced.  

                          
                            </div>
                            
                          </div>
            </div>


            <section class="section section_info">

              <div class="card" id="empty_card" style="text-align:center;height:40vh;>
               <div>

               <h1 class="info_block__accent" >
                
                <h3 class="info_block__accent" style="margin-top: 0em;">1. Have a fully synced and properly set up Idena node</h3>
                
                 <h3 class="info_block__accent" style="margin-top: 1em;">2. Log in using the Idena Sign on</h3>                 

                  <h3 class="info_block__accent" style="margin-top: 1em;">3. Use create a token. Share with the person who invited to verify that your node is correctly set up</h3>

                    <h3 class="info_block__accent" style="margin-top: 1em;">4. The inviter can then send you invitation or activate it through the client and you will be part of the Idena network once you pass validation</h3>

                  
                </div>
</div>

<section class="section section_info">

            <div class="card" id="empty_card" style="text-align:center;height:12vh">
                        <div>
                            
                            <h1 class="text_block" id="none">For an invite to the Idena Network, follow the process above and join our <a href="https://t.me/Idenacodes" target="_blank">Telegram</a>                            

                          </div>
            </div>

</section>


 <!-- this is to close main, div opened in the header -->
 </div>
</main>


<?php
include(dirname(__FILE__)."/partials/footer.php");
?>
