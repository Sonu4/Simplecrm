<?php /* Smarty version 2.6.29, created on 2018-06-23 11:37:56
         compiled from themes/SuiteR/tpls/footer.tpl */ ?>
</div>
</div>
<!-- END of container-fluid, pageContainer divs -->
<!-- Start Footer Section -->
<?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
<!-- Start generic footer -->
<footer class="row" style="padding-top:12px;padding-bottom:10px;margin-bottom:1px">
        <div class="serverstats" style="margin-left:28px;">
            <span class="glyphicon glyphicon-globe"></span> <?php echo $this->_tpl_vars['STATISTICS']; ?>

        </div>
       

        <div id="copyright_data"  align="right" style="margin-right:28px;">
            <div id="copyrightbuttons" align="right" style="margin-left:64%;"> 

                <img height="35" src="custom/include/images/simplecrm.png" style="margin-bottom:-15px;">	           
	<a id="powered_by" style="font-size:11px;padding-right:18px">&copy; <?php echo $this->_tpl_vars['MOD']['LBL_SUITE_POWERED_BY']; ?>
</a>
                <br>
  	<a id="supercharged_by" style="font-size:11px;">&copy; Supercharged By SuiteCRM</a>

            </div>
            </div>

    </footer>
<!-- END Generic Footer -->
<?php endif; ?>
<!-- END Footer Section -->
<?php echo '
<script>

//qe_init function sets listeners to click event on elements of \'quickEdit\' class
 if(typeof(DCMenu) !=\'undefined\'){
    DCMenu.qe_refresh = false;
    DCMenu.qe_handle;
 }
function qe_init(){

    //do not process if YUI is undefined
    if(typeof(YUI)==\'undefined\' || typeof(DCMenu) == \'undefined\'){
        return;
    }


    //remove all existing listeners.  This will prevent adding multiple listeners per element and firing multiple events per click
    if(typeof(DCMenu.qe_handle) !=\'undefined\'){
        DCMenu.qe_handle.detach();
    }

    //set listeners on click event, and define function to call
    YUI().use(\'node\', function(Y) {
        var qe = Y.all(\'.quickEdit\');
        var refreshDashletID;
        var refreshListID;

        //store event listener handle for future use, and define function to call on click event
        DCMenu.qe_handle = qe.on(\'click\', function(e) {
            //function will flash message, and retrieve data from element to pass on to DC.miniEditView function
            ajaxStatus.flashStatus(SUGAR.language.get(\'app_strings\', \'LBL_LOADING\'),800);
            e.preventDefault();
            if(typeof(e.currentTarget.getAttribute(\'data-dashlet-id\'))!=\'undefined\'){
                refreshDashletID = e.currentTarget.getAttribute(\'data-dashlet-id\');
            }
            if(typeof(e.currentTarget.getAttribute(\'data-list\'))!=\'undefined\'){
                refreshListID = e.currentTarget.getAttribute(\'data-list\');
            }
            DCMenu.miniEditView(e.currentTarget.getAttribute(\'data-module\'), e.currentTarget.getAttribute(\'data-record\'),refreshListID,refreshDashletID);
        });

    });
}


    qe_init();

	SUGAR_callsInProgress++;
	SUGAR._ajax_hist_loaded = true;
    if(SUGAR.ajaxUI)
    	YAHOO.util.Event.onContentReady(\'ajaxUI-history-field\', SUGAR.ajaxUI.firstLoad);
</script>
'; ?>

</div>
</body>
</html>