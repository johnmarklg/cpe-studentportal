		$( document ).ready(function() {
				$('li', '#tabs').filter(function() {
					return !! $(this).find('a[href="/org/index.php"]').length;
				  })
				  .addClass('active');
		});
	
	
		$('#tabAll').click(function(){
			$('#tabAll').addClass('active');  
			$('.tab-pane').each(function(i,t){
				$('#myTabs li').removeClass('active'); 
				$(this).addClass('active');  
			});
		});
		
		$('.invoice-remove').click(function () {
		if(confirm('Do you want to remove this entry from the database?')) {
			var $row = $(this).closest("tr");    // Find the row
			var $id = $row.find(".id").text(); // Find the text
			var $colname = $row.find(".name").text(); // Find the text
			var $invoiceinfo = '[{"id":"' + $id + '","colname":"' + $colname + '"}]';
			//alert($invoiceinfo);
			$.ajax({
				type: "POST",
					url: "/php/removePayment.php",
					data: {infodata: $invoiceinfo},
					cache: false,
					success: function(result){
						//alert("Successfully removed student entry!");
						location.reload(); 			
					}
				});
			//$(this).parents('tr').detach();			
		} else {}
		});
		
		$('#buttonSave').click(function() {
			var $name = $('#name').val();
			var $amount = $('#amount').val();
			$colname = $name.replace(/\s/g,'');
			$colname = $colname.toLowerCase();
			//var $amount = $('#amount').val();
			var $payinfo = '[{"Name":"' + $name + '","columnName":"' + $colname + '","Amount":"' + $amount + '"}]';
			//alert($payinfo);
			$.ajax({
				type: "POST",
					url: "/php/addPayment.php",
					data: {infodata: $payinfo},
					cache: false,
					success: function(result){
						//alert("Successfully updated personal details! Please relogin.");
						location.reload();
						//window.location.replace('logout.php');
					}
				});
				return false;
		});