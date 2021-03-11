   <section class="dashboard__section py-5">
       <div class="container">
           <h1 class="text-center text-capitalize py-5">
               <?php echo lang("dashboard_title"); ?>
           </h1>
           <div class="row">
               <!-- total members  -->
               <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-3">
                   <div class="status shadow-sm">
                       <h4 class="text-center text-capitalize p-3 pt-5 mb-0">
                           <?php echo lang("dashboard_statusMembers"); ?>
                       </h4>
                       <div class="dashboard__dataHolder text-center p-3 pb-5">
                           <p class="dashboard__numbers py-3 mb-0 display-4 font-weight-bold">
                               <?php echo countItemsIN_DB("userID", "users"); ?></p>
                       </div>
                   </div>
               </div>
               <!-- total pending members  -->
               <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-3">
                   <div class="status shadow-sm">
                       <h4 class="text-center text-capitalize p-3 pt-5 mb-0">
                           <?php echo lang("dashboard_pendingMembers"); ?>
                       </h4>
                       <div class="dashboard__dataHolder text-center p-3 pb-5">
                           <p class="dashboard__numbers py-3 mb-0 display-4 font-weight-bold">250</p>
                       </div>
                   </div>
               </div>
               <!-- total items members  -->
               <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-3">
                   <div class="status shadow-sm">
                       <h4 class="text-center text-capitalize p-3  pt-5 mb-0">
                           <?php echo lang("dashboard_items"); ?>
                       </h4>
                       <div class="dashboard__dataHolder text-center p-3 pb-5">
                           <p class="dashboard__numbers py-3 mb-0 display-4 font-weight-bold">170</p>
                       </div>
                   </div>
               </div>
               <!-- total comments from members  -->
               <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-3">
                   <div class="status shadow-sm">
                       <h4 class="text-center text-capitalize p-3  pt-5 mb-0">
                           <?php echo lang("dashboard_totalComments"); ?>
                       </h4>
                       <div class="dashboard__dataHolder text-center p-3 pb-5">
                           <p class="dashboard__numbers py-3 mb-0 display-4 font-weight-bold">150</p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>


   <section class="latest__panel py-5">
       <div class="container">
           <div class="row">
               <!-- newly registered users -->
               <div class="col-sm-6">
                   <div class="card">
                       <div class="card-header">
                           <span class="text-capitalize"><i class="fas fa-users mr-1"></i>newly Registered users</span>
                       </div>
                       <div class="card-body">
                           card body test
                       </div>
                   </div>
               </div>
               <!-- newly added items -->
               <div class="col-sm-6">
                   <div class="card">
                       <div class="card-header">
                           <span class="text-capitalize"><i class="fas fa-tag mr-1"></i>newly added items</span>
                       </div>
                       <div class="card-body">
                           card body test
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>

   <!-- 
   <select name="choice">
       <option value="">--Please choose an option--</option>
       <?php
        // $stmt = $db_connect->prepare("SELECT username FROM users WHERE  username = ?");
        // $username = "432";
        // $stmt->execute(array($username));
        // $row =   $stmt->fetch();
        // if ($row['username'] == "Ahmad") {
        ?>
       <option value="second">i'm male</option>
       <option value="first" selected>i'm female</option>
       <?php
        // } elseif ($row['username' == "AhmadTest"]) {
        ?>
       <option value="first" selected>i'm male</option>
       <option value="first">i'm female</option>
       <?php
        // } else {
        ?>
       <option value="first">i'm male</option>
       <option value="first">i'm female</option>
       <?php // } 
        ?>
   </select> -->