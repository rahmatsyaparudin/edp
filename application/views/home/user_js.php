<script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>bower_components/jquery-ui/jquery-ui.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){		
		$.fn.DataTable.ext.pager.numbers_length = 7;
        var oTable = $('#userList').DataTable({
        	bInfo			: true,
		    bJQueryUI		: true,
		    bSearching		: true,
	        bLengthChange	: true,
	        bAutoWidth		: true,
	        aLengthMenu		: [[5,10,25,50], [5,10,25,50]],
	        iDisplayLength	: 5,
	        bPaginate		: true,
	        sPaginationType	: 'simple_numbers',
	     	stateSave		: true,
	     	bFilter 		: false,
            bProcessing		: false,
			bServerSide		: false,
			bDestroy		: true,
			bRetrieve		: true,
			sAjaxSource		: "<?=base_url()?>home/jsonUser",
			fnInitComplete: function()
				{this.parent().applyTemplateSetup();},
			fnServerData 	: function(sSource, aoData, fnCallback, oSettings){
		    	oSettings.jqXHR = $.ajax({
		    		dataType 	: 'JSON',
		    		type 		: "POST",
		    		url 		: sSource,
		    		data 		: aoData,
		    		success		: fnCallback
		    	})
		    }
		});
	
        setInterval( function () {
		    oTable.ajax.reload(null, false);
		}, 10000);

		$('#userList tbody').on( 'click', 'tr', function () {
	        if ($(this).hasClass('selected')) {
	            $(this).removeClass('selected');
	        }
	        else {
	            oTable.$('tr.selected').removeClass('selected');
	            $(this).addClass('selected');
	        }
	    });
	});

	
	$(document).ready(function(){
		$('#modalUser').on('show.bs.modal', function (event) 
		{
			var button = $(event.relatedTarget);
	  		var modalData = button.data('whatever');
	  		var modal = $(this);
	  		if (modalData != ''){ 
	  			$('#modalUser').removeClass('modal-primary');
  				$('#modalUser').addClass('modal-warning');
	        	$.get('<?=base_url()?>home/jsonUserEdit/'+modalData, function(data){
	        		var json = JSON.parse(data);
	        		modal.find('.modal-title').text('Edit User Data - ' + json.name);
	        		modal.find('#username').val(json.username);
	        		modal.find('#password').val(json.password);
	        		modal.find('#name').val(json.name);
	        		modal.find('#email').val(json.email);
	        		if (json.status == 1)
	        		{
	        			modal.find('#statusEnable').attr("checked", "checked");
	        			modal.find('#enableLbl').removeClass("not-active");
	        			modal.find('#disableLbl').addClass("not-active");
	        		}
	        		else if (json.status == 0)
	        		{
	        			modal.find('#statusDisable').attr("checked", "checked");
	        			modal.find('#disableLbl').removeClass("not-active");
	        			modal.find('#enableLbl').addClass("not-active");
	        		}
	        		

	        		//modal.find('form')[0].reset();
	        	});
	  		}else{
	  			$('#modalUser').removeClass('modal-warning');
  				$('#modalUser').addClass('modal-primary');
	  			modal.find('.modal-body input').val('');
	  			modal.find('.modal-body textarea').val('');
	  			modal.find('.modal-body select').val('');
	  			modal.find('#statusDisable').removeAttr("checked");
	  			modal.find('#statusEnable').removeAttr("checked");
	        	modal.find('#disableLbl').removeClass("not-active");
	        	modal.find('#disableLbl').addClass("not-active");
	        	modal.find('#enableLbl').removeClass("not-active");
	        	modal.find('#enableLbl').addClass("not-active");
	  			modal.find('.modal-title').text('Add User Data');
	  		}
		});
	});
</script>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">