<script type = 'text/javascript' >	
$(document).ready(function()
{
	$('#search_box').autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : 'http://localhost/ygoyal/CraftsVatika/include/search_suggestion.php',
				dataType: 'json',
				data: {
				   name_startsWith: request.term,
				   type: 'search'
				},
				 success: function( data ) {
					 response(data);
				}
			});
		},
		autoFocus: true,
		minLength: 1      	
	});
});
</script>

<div class="headerWrapper">
	<div class="headerTopWrapper">
		<div class="floatLeft logo_wrapper">
			CraftsVatika
		</div>
		<div class="floatRight">
			<ul class="menu_ulist">
				<li><a href="crafts.php">Crafts</a></li>
				<li><a href="services.php">Services</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="#">Login/SignUp</a></li>
			</ul>
			<div class="searchWrapper">
				<form action='search.php' method='POST' name='search' id='search'>
					<input id='search_box' name='search_box' class='search_box'></input>
					<input id='submit' name='submit' value='Submit' type='submit'/>
				</form>
			</div>
		</div>
	</div>
	
</div>