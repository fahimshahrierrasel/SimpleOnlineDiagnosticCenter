<?php
    include("./components/header.php");
    $title = "Stuff Portals"
?>
<script type="text/javascript">
    document.title = "<?=$title;?>"
</script>

<div class="mdui-row" style="margin-top: 100px; margin-bottom: 20px">
    <div class="mdui-col-md-4"></div>
    <div class="mdui-col-md-4">
       <div class="mdui-card" style="margin: 10px">
           <div class="mdui-card-media">
               <img src="images/avatar.png" style="width: 658px; height: 300px"/>
               <div class="mdui-card-media-covered mdui-card-media-covered-gradient">
                   <div class="mdui-card-primary">
                       <div class="mdui-card-primary-title">Admin</div>
                       <div class="mdui-card-primary-subtitle">Short Description of Admin</div>
                   </div>
                   <div class="mdui-card-actions">
                       <div class="mdui-btn mdui-ripple mdui-ripple-white mdui-float-right">Admin Panel</div>
                   </div>
               </div>
           </div>
       </div>

        <div class="mdui-card" style="margin: 10px">
            <div class="mdui-card-media">
                <img src="images/avatar.png" style="width: 658px; height: 300px"/>
                <div class="mdui-card-media-covered mdui-card-media-covered-gradient">
                    <div class="mdui-card-primary">
                        <div class="mdui-card-primary-title">Doctor</div>
                        <div class="mdui-card-primary-subtitle">Short Description of Doctor</div>
                    </div>
                    <div class="mdui-card-actions">
                        <div class="mdui-btn mdui-ripple mdui-ripple-white mdui-float-right">Doctor Portal</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mdui-card" style="margin: 10px">
            <div class="mdui-card-media">
                <img src="images/avatar.png" style="width: 658px; height: 300px"/>
                <div class="mdui-card-media-covered mdui-card-media-covered-gradient">
                    <div class="mdui-card-primary">
                        <div class="mdui-card-primary-title">Pathologist</div>
                        <div class="mdui-card-primary-subtitle">Short Description of Pathologist</div>
                    </div>
                    <div class="mdui-card-actions">
                        <div class="mdui-btn mdui-ripple mdui-ripple-white mdui-float-right">Pathologist</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mdui-col-md-4"></div>
</div>



<?php include("./components/footer.php"); ?>
