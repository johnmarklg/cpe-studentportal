<html>

<head>
		<!-- Material Design Lite -->
		<script src="assets/js/list.min.js"></script>
		<script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
		<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
		<!-- Material Design icon font -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
		<div class="mdl-card mdl-shadow--2dp mdl-color--green-300">
				<div class="mdl-card__title">
						<h2 class="mdl-card__title-text">MDL-Table</h2>
				</div>
				<div class="mdl-card__supporting-text">
						Search and Sort using <a href="http://www.listjs.com/overview" class="mdl-color-text--deep-purple-700">List.js</a>
				</div>
				<div class="mdl-card__actions mdl-card--border">
						<div id="mdl-table">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable is-upgraded is-focused">
										<label class="mdl-button mdl-js-button mdl-button--icon" for="sample6">
												<i class="material-icons">search</i>
										</label>
										<div class="mdl-textfield__expandable-holder">
												<input class="mdl-textfield__input search" type="text" id="sample6">
												<label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
										</div>
								</div>

								<table id='mdl-table' class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
										<thead>
												<tr>
														<th class="mdl-data-table__cell--non-numeric sort" data-sort="material">Material</th>
														<th class="sort" data-sort="quantity">Quantity</th>
														<th class="sort" data-sort="price">Unit price</th>
												</tr>
										</thead>
										<tbody class="list">
												<tr>
														<td class="mdl-data-table__cell--non-numeric material">Acrylic (Transparent)</td>
														<td class="quantity">25</td>
														<td class="price">$2.90</td>
												</tr>
												<tr>
														<td class="mdl-data-table__cell--non-numeric material">Plywood (Birch)</td>
														<td class="quantity">35</td>
														<td class="price">$1.25</td>
												</tr>
												<tr>
														<td class="mdl-data-table__cell--non-numeric material">Laminate (Gold on Blue)</td>
														<td class="quantity">10</td>
														<td class="price">$2.35</td>
												</tr>
												<tr>
														<td class="mdl-data-table__cell--non-numeric material">Bamboo (Gold on Blue)</td>
														<td class="quantity">1</td>
														<td class="price">$13.15</td>
												</tr>
												<tr>
														<td class="mdl-data-table__cell--non-numeric material">Tile (Gold on Blue)</td>
														<td class="quantity">12</td>
														<td class="price">$5.35</td>
												</tr>
										</tbody>
								</table>
						</div>
				</div>
		</div>
		<script>
		var options = {
				valueNames: ['material', 'quantity', 'price']
		}
	, documentTable = new List('mdl-table', options)
	;


$($('th.sort')[0]).trigger('click', function () {
	console.log('clicked');
});

$('input.search').on('keyup', function (e) {
	if (e.keyCode === 27) {
		$(e.currentTarget).val('');
		documentTable.search('');
	}
});
		</script>
</body>

</html>