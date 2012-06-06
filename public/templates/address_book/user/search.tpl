
		<div class="address_book"><a href="@link@">Address Book</a></div>
		<!--<div class="address_book">Address Book</div>-->		
		<form method="get" action="index.php" id="submit_form">		
			<table class="address_book">
				<tr>
					<td class="address_book_search">Search</td>
				</tr>
				<tr>
					<td class="keywords_country_city">
						<input type="hidden" name="page" value="@page@" />
						<input type="hidden" name="limit" value="@limit@" />
						<input type="hidden" name="field" value="@field@" />
						<input type="hidden" name="order" value="@order@" />
						
						Keywords: 
						<input type="text" maxlength="16" name="poisk" value="@poisk@" class="search" />
						
						Country: 
						<select onchange="reloadSearchForm();" name="country" class="search">
							<option @selected@ value="">::ALL::</option>
