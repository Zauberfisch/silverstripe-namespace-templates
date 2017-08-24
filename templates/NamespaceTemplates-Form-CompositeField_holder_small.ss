<$Tag class="$extraClass" $AttributesHTML>
	<% if $Tag == 'fieldset' && $Legend %>
		<legend>$Legend</legend>
	<% end_if %>
	<% loop $FieldList %>
		<% if $ColumnCount %>
			<div class="column-{$ColumnCount} $FirstLast">
				$SmallFieldHolder
			</div>
		<% else %>
			$SmallFieldHolder
		<% end_if %>
	<% end_loop %>
	<% if $Description %><span class="description">$Description</span><% end_if %>
</$Tag>
