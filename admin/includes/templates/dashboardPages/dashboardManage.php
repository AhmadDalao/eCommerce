   <section class="dashboard__section py-5">
       <div class="container">
           <h1 class="text-center text-capitalize header_color py-5">
               <?php echo lang("dashboard_title"); ?>
           </h1>
           <div class="row">
               <!-- total members  -->
               <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-3">
                   <div class="status shadow-sm rounded-lg status_members">
                       <h4 class="text-center text-capitalize p-3 pt-5 mb-0">
                           <?php echo lang("dashboard_statusMembers"); ?>
                       </h4>
                       <div class="dashboard__dataHolder text-center p-3 pb-5">
                           <a class="dashboard_link d-block" href="members.php" target="_blank" rel="noreferrer">
                               <p class="dashboard__numbers py-3 mb-0 display-4 font-weight-bold">
                                   <?php echo countItemsIN_DB("userID", "users"); ?>
                               </p>
                           </a>
                       </div>
                   </div>
               </div>
               <!-- total pending members  -->
               <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-3">
                   <div class="status shadow-sm rounded-lg status_pending">
                       <h4 class="text-center text-capitalize p-3 pt-5 mb-0">
                           <?php echo lang("dashboard_pendingMembers"); ?>
                       </h4>
                       <div class="dashboard__dataHolder text-center p-3 pb-5">
                           <a class="dashboard_link d-block" href="members.php?action=manage&page=pending"
                               target="_blank" rel="noreferrer">
                               <p class="dashboard__numbers py-3 mb-0 display-4 font-weight-bold">
                                   <?php echo checkItem("register_status", "users", 0); ?>
                               </p>
                           </a>
                       </div>
                   </div>
               </div>
               <!-- total items members  -->
               <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-3">
                   <div class="status shadow-sm rounded-lg status_totalItems">
                       <h4 class="text-center text-capitalize p-3  pt-5 mb-0">
                           <?php echo lang("dashboard_items"); ?>
                       </h4>
                       <div class="dashboard__dataHolder text-center p-3 pb-5">
                           <a class="dashboard_link d-block" href="members.php" target="_blank" rel="noreferrer">
                               <p class="dashboard__numbers py-3 mb-0 display-4 font-weight-bold">
                                   170
                               </p>
                           </a>
                       </div>

                   </div>
               </div>
               <!-- total comments from members  -->
               <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-3">
                   <div class="status shadow-sm rounded-lg status__comments">
                       <h4 class="text-center text-capitalize p-3  pt-5 mb-0">
                           <?php echo lang("dashboard_totalComments"); ?>
                       </h4>
                       <div class="dashboard__dataHolder text-center p-3 pb-5">
                           <a class="dashboard_link d-block" href="members.php" target="_blank" rel="noreferrer">
                               <p class="dashboard__numbers py-3 mb-0 display-4 font-weight-bold">
                                   150
                               </p>
                           </a>
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
               <div class="col-lg-6">
                   <div class="card">
                       <div class="card-header">
                           <span class="text-capitalize"><i class="fas fa-users mr-1">
                               </i>latest <?php echo $latestUsersLimiter; ?> Registered users</span>
                       </div>
                       <div class="card-body">
                           <ul class="list-group list-group-flush">
                               <?php
                                foreach ($latestUsers as $user) {
                                    echo "<li class='list-group-item'>";
                                    echo $user['username'];
                                    include  $dashboardPages . "buttons.php";
                                    echo "</li>";
                                }
                                ?>
                           </ul>
                       </div>
                   </div>
               </div>
               <!-- newly added items -->
               <div class="col-lg-6">
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