{*

/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/




*}
{php}
	global $current_user;
	$user_id = $current_user->id;
	$this->assign("user_id", $user_id);
	

	{/php}

<style>
{literal}

@mixin ellipsis(){
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    word-wrap: normal;
    width: 100%;
}

@mixin icon-styles(){
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: 400;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

@mixin transform($transform){
  -webkit-transform: $transform;
  -moz-transform: $transform;
  -ms-transform: $transform;
  -o-transform: $transform;
  transform: $transform;
}

@media screen and (max-width: 479px) {
  .nav-tabs-responsive {
    > li {
      display: none;
      width: 23%;
      > a {
        @include ellipsis();
        width: 100%;
        text-align: center;
        vertical-align: top;
      }
      &.active {
        width: 54%;
        &:first-child {
          margin-left: 23%;
        }
      }
      &.active,
      &.prev,
      &.next {
        display: block;
      }
      &.prev,
      &.next {
        -webkit-transform: scale(0.9);
        transform: scale(0.9);
      }
      &.next > a,
      &.prev > a {
        -webkit-transition: none;
        transition: none;
        .text {
          display: none;
        }
        &:after,
        &:after {
          @include icon-styles();
        }
      }
      &.prev > a:after {
        content: "\e079";
      }
      &.next > a:after {
        content: "\e080";
      }
      &.dropdown {
        > a > .caret {
          display: none;
        }
        > a:after {
          content: "\e114";
        }
        &.active > a {
          &:after {
            display: none;
          }
          > .caret {
            display: inline-block;
          }
        }

        .dropdown-menu {
          &.pull-xs-left {
            left: 0;
            right: auto;
          }
          &.pull-xs-center {
            right: auto;
            left: 50%;
            @include transform(translateX(-50%));
          }
          &.pull-xs-right {
            left: auto;
            right: 0;
          }
        }
      }
    }
  }
}






.bs-example-tabs .nav-tabs {
  margin-bottom: 15px;
}

@media (max-width: 479px) {
  #narrow-browser-alert {
    display: none;
  }
}



  #sortable1, #sortable2 {
    border: 1px solid #eee;
    width: 100%;
    list-style-type: none;
    margin: 0;
    padding: 5px 5px 5px 5px;
	min-height:300px;
    margin-right: 10px;
  }
  #sortable1 li, #sortable2 li {
    margin: 5px 5px 5px 5px;
    padding: 5px;
    font-size: 1.2em;
    width: 95%;
  }
  .back_filter_header
  {
  padding:5px;
  }
  .back_footer
  {
  padding:10px;
  }
{/literal}
</style>

<script>
{literal}
(function($) {

  'use strict';

  $(document).on('show.bs.tab', '.nav-tabs-responsive [data-toggle="tab"]', function(e) {
    var $target = $(e.target);
    var $tabs = $target.closest('.nav-tabs-responsive');
    var $current = $target.closest('li');
    var $parent = $current.closest('li.dropdown');
		$current = $parent.length > 0 ? $parent : $current;
    var $next = $current.next();
    var $prev = $current.prev();
    var updateDropdownMenu = function($el, position){
      $el
      	.find('.dropdown-menu')
        .removeClass('pull-xs-left pull-xs-center pull-xs-right')
      	.addClass( 'pull-xs-' + position );
    };

    $tabs.find('>li').removeClass('next prev');
    $prev.addClass('prev');
    $next.addClass('next');
    
    updateDropdownMenu( $prev, 'left' );
    updateDropdownMenu( $current, 'center' );
    updateDropdownMenu( $next, 'right' );
  });

})(jQuery);


  $( function() {
  var id='{/literal}{$id}{literal}';
  var user_id='{/literal}{$user_id}{literal}';

  

    $( "#sortable1, #sortable2" ).sortable({
      connectWith: ".connectedSortable",
      stop: function (event, ui) {
      var data = $('#sortable1').sortable('toArray');
      var data1 = $('#sortable2').sortable('toArray');
  
      $.ajax({data: {	
            dis:data,
						hid:data1,
						dashlet_id:id,
						user_id:user_id,
           
						},
						type: 'POST',
						url: 'sortable-flip-side.php'
					
						});
      }
    }).disableSelection();
  } );
{/literal}

</script>

<div class="modal fade edit-dashlet-modal" id="edit-dashlet-modal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">

<div>







  <div class="container-fluid">

      
    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
      <ul id="myTabconfigure" class="nav nav-tabs nav-tabs-responsive edit-configure-tab" role="tablist">
        <li role="presentation" class="active">
          <a href="#front" id="home-tab" role="tab" data-toggle="tab" aria-controls="front" aria-expanded="true">
            <span class="text">Front Side</span>
          </a>
        </li>
        <li role="presentation" class="next">
          <a href="#back" role="tab" id="profile-tab" data-toggle="tab" aria-controls="back">
            <span class="text">Back Side</span>
          </a>
        </li>
      </ul>

      <div id="myTabContent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="front" aria-labelledby="home-tab">
        <form action='index.php' id='configure_{$id}' method='post' onSubmit='SUGAR.mySugar.setChooser(); return SUGAR.dashlets.postForm("configure_{$id}", SUGAR.mySugar.uncoverPage);'>
<input type='hidden' name='id' value='{$id}'>
<input type='hidden' name='module' value='Home'>
<input type='hidden' name='action' value='ConfigureDashlet'>
<input type='hidden' name='configure' value='true'>
<input type='hidden' name='to_pdf' value='true'>
<input type='hidden' id='displayColumnsDef' name='displayColumnsDef' value=''>
<input type='hidden' id='hideTabsDef' name='hideTabsDef' value=''>
<input type='hidden' id='dashletType' name='dashletType' value='' />

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="edit view">
	<tr>
        <td scope='row'colspan='4' align='left'>
        	<h2>{$strings.general}</h2>
        </td>
    </tr>
    <tr>
	    <td scope='row'>
		    {$strings.title}
        </td>
        <td colspan='3'>
            <input type='text' name='dashletTitle' value='{$dashletTitle}'>
        </td>
	</tr>
    <tr>
	    <td scope='row'>
		    {$strings.displayRows}
        </td>
        <td{if !$isRefreshable} colspan='3'{/if}>
            <select name='displayRows'>
				{html_options values=$displayRowOptions output=$displayRowOptions selected=$displayRowSelect}
           	</select>
        </td>
        {if $isRefreshable}
        <td scope='row'>
		    {$strings.autoRefresh}
        </td>
        <td>
            <select name='autoRefresh'>
				{html_options options=$autoRefreshOptions selected=$autoRefreshSelect}
           	</select>
        </td>
        {/if}
    </tr>
    <tr>
        <td colspan='4' align='center'>
        <strong>Front Side</strong>
        	<table border='0' cellpadding='0' cellspacing='0'>
        	<tr><td>
			    {$columnChooser}
		    </td>
		    </tr></table>
	    </td>
	</tr>
	
	
	
	{if $showMyItemsOnly || !empty($searchFields)}
	<tr>
        <td scope='row'colspan='4' align='left'>
	        <br>
        	<h2>{$strings.filters}</h2>
        </td>
    </tr>
    {if $showMyItemsOnly}
    <tr>
	    <td scope='row'>
            {$strings.myItems}
        </td>
        <td>
            <input type='checkbox' {if $myItemsOnly == 'true'}checked{/if} name='myItemsOnly' value='true'>
        </td>
    </tr>
    {/if}
    <tr>
    {foreach name=searchIteration from=$searchFields key=name item=params}
        <td scope='row' valign='top'>
            {$params.label}
        </td>
        <td valign='top' style='padding-bottom: 5px'>
            {$params.input}
        </td>
        {if ($smarty.foreach.searchIteration.iteration is even) and $smarty.foreach.searchIteration.iteration != $smarty.foreach.searchIteration.last}
        </tr><tr>
        {/if}
    {/foreach}
    </tr>
    {/if}
    <tr>
	    <td colspan='4' align='right'>
	        <input type='submit' class='button dashlet-edit-button'  value='{$strings.save}'>
	        {if $showClearButton}
	        <input type='submit' class='button' value='{$strings.clear}' onclick='SUGAR.searchForm.clear_form(this.form,["dashletTitle","displayRows","autoRefresh"]);return false;'>
	        {/if}
	    </td>
	</tr>
</table>
</form>
</div>
		<div role="tabpanel" class="tab-pane fade" id="back" aria-labelledby="profile-tab">
    <button class="btn btn-sm pull-right" style="margin-top:-60px;" data-dismiss="modal"  >Save</button>
		<div class="col-sm-6 text-center">
		<span class="back_filter_header">
		<strong >Display Columns</strong></span>
		<ul id="sortable1" class="connectedSortable">
		{if empty($hide_show_fields)}
		{foreach from=$all_columns key=fkey item=field}
		<li id="{$fkey}" class="ui-state-highlight">
		{$field}
		</li>      
		{/foreach}
		{else}
		{foreach from=$hide_show_fields.dis item=display_field}
		<li id="{$display_field}" class="ui-state-highlight">
		{$all_columns.$display_field}
		</li>      
		{/foreach}
		{/if}
		</ul>
		</div>
		<div class="col-sm-6 text-center">
		<span class="back_filter_header"><strong >Hide Columns</strong></span>

		<ul id="sortable2" class="connectedSortable">
	{if !empty($hide_show_fields)}
		{foreach from=$hide_show_fields.hid item=display_field}
		<li id="{$display_field}" class="ui-state-highlight">
		{$all_columns.$display_field}
		</li>      
		{/foreach}
		{/if}

    {if !empty($hd_sh_col)}
    {foreach from=$hd_sh_col key=key   item=display_field}
    <li id="{$key}" class="ui-state-highlight">
    {$display_field}
    </li>      
    {/foreach}
    {/if}

   
		</ul>
		</div>
		</div>
</div>
</div>
</div>









</div>



  </div>
      
      </div>
    </div>
  </div>
