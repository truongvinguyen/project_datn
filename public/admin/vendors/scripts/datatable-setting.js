
const firstSpaceDetect = new RegExp(/^\s+/),
multiSpaceDetect = new RegExp(/\s{2,}/, 'g')

$('document').ready(function(){
$('.data-table').DataTable({
	scrollCollapse: true,
	autoWidth: false,
	responsive: true,
	columnDefs: [{
		targets: "datatable-nosort",
		orderable: false,
	}],
	"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	"language": {
		"info": "_START_-_END_ of _TOTAL_ entries",
		searchPlaceholder: "Tìm kiếm",
		paginate: {
			next: '<i class="ion-chevron-right"></i>',
			previous: '<i class="ion-chevron-left"></i>'  
		}
	},
});

$('.data-table-export').DataTable({
	scrollCollapse: true,
	autoWidth: false,
	responsive: true,
	columnDefs: [{
		targets: "datatable-nosort",
		orderable: false,
	}],
	"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	"language": {
		"info": "_START_-_END_ of _TOTAL_ entries",
		searchPlaceholder: "Tìm kiếm",
		paginate: {
			next: '<i class="ion-chevron-right"></i>',
			previous: '<i class="ion-chevron-left"></i>'  
		}
	},
	dom: 'Bfrtp',
	buttons: [
	'copy', 'csv', 'pdf', 'print'
	]
});

// $(window).on('scroll', () => {
	// console.log($(window).scrollTop() + $('#global-header').height(), $('#data-list-table').offset().top)
	// let scrollPosition = $(window).scrollTop() + $('#global-header').height(),
		// tableOffSet = $('#data-list-table').offset().top
	// if (scrollPosition > tableOffSet) {
		// $('#fixed-toolbar').addClass('sticky-top').css({
			// 'top': $('#global-header').height(),
			// 'background-color': '#fff',
		// })
	// }
	// else {
		// $('#fixed-toolbar').removeClass('sticky-top').removeAttr('style')
	// }
// })
let thisDataTable2 = $('#data-table-export-2').DataTable({
	searchHighlight: true,
	fixedHeader: {
		header: true
	},
	// scrollY: `${$(window).height() - $('#data-list-table').offset().top - $('#fixed-toolbar').height()}px`,
	scrollY: '54vh',
	scrollCollapse: true,
	responsive: true,
	autoWidth: true,
	colReorder: true,
	columnDefs: [{
		targets: "datatable-nosort",
		orderable: false,
	}],
	//	"aaSorting": [],
	"lengthMenu": [[10, 25, 50, 75, 100, 150, 200], [10, 25, 50, 75, 100, 150, 200]],
	"language": {
		"info": "_START_-_END_ của _TOTAL_ mục",
		search: '',
		searchPlaceholder: 'Tìm kiếm',
		"lengthMenu": "Hiển thị&ensp;_MENU_&ensp;mục",
		"zeroRecords": "Không có dữ liệu",
		paginate: {
			next: '<i class="ion-chevron-right"></i>',
			previous: '<i class="ion-chevron-left"></i>'
		}
	},
	dom:
		`<"#fixed-toolbar.row"
			<"#custom-tools.col-md-6 col-sm-12 d-flex justify-content-start pb-20"f>
			<"col-md-6 col-sm-12 d-flex justify-content-end pb-20"<"mr-20"B><"#btn-add-2">>
		>
		<rt>
		<"row pt-20"
			<"col-6 d-flex justify-content-start px-0"<l>>
			<"col-6 d-flex justify-content-end px-0"<p>>
		>`,
	buttons: [
		'copy', 'csv', 'pdf', 'print'
	],
	"initComplete": (settings, json) => {
		$('#myTable_filter, .dt-buttons, #myTable_paginate').addClass('px-0')
		$('.dataTables_scroll').addClass('w-100')
		$('.dataTables_scrollBody').addClass('overlayScrollBar')
		$('.dataTables_scrollHead').addClass('overlayHeaderScrollBar')
		$('#custom-tools').html(`
			<div class="mr-20">
				<input type="text" id="search-input-2" class="form-control form-control-sm" placeholder="Tìm kiếm" aria-controls="myTable">
			</div>
			<div>
				<button type="button" id="btn-reset-2" class="btn btn-dark"><span class="dw dw-refresh1"></span></button>
			</div>
		`)
		$('#search-input-2').on('input', (e) => {
			e.target.value = e.target.value.replace(firstSpaceDetect, '').replace(multiSpaceDetect, ' ')
			
			let body = $(thisDataTable2.table().body()),
				nullValDetect = new RegExp(/^\.{1,3}$/)
			thisDataTable2.search(e.target.value.match(nullValDetect)
				? thisDataTable2.search(null).draw()
				: e.target.value
			).draw()
			
			body.unhighlight()
			body.highlight(thisDataTable2.page.info().pages && e.target.value)
		})
		$('#btn-reset-2').on('click', (e) => {
			$('#search-input-2').val('')
			thisDataTable2.search('').draw()
			thisDataTable2.page.len(10).draw()
			thisDataTable2.columns().order([]).draw()
		})
		//	console.log(routesJS)
		$('#btn-add-2').html(`
			<a href="${$('#data-table-export-2').data('create-route') || '#'}" class="btn btn-xl btn-primary">
				<i class="fa fa-plus-circle"></i>&ensp;Thêm mới
			</a>
		`)
	}
})

var table = $('.select-row').DataTable();
$('.select-row tbody').on('click', 'tr', function () {
	if ($(this).hasClass('selected')) {
		$(this).removeClass('selected');
	}
	else {
		table.$('tr.selected').removeClass('selected');
		$(this).addClass('selected');
	}
});

var multipletable = $('.multiple-select-row').DataTable();
$('.multiple-select-row tbody').on('click', 'tr', function () {
	$(this).toggleClass('selected');
});
var table = $('.checkbox-datatable').DataTable({
	'scrollCollapse': true,
	'autoWidth': false,
	'responsive': true,
	"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	"language": {
		"info": "_START_-_END_ of _TOTAL_ entries",
		searchPlaceholder: "Tìm kiếm",
		paginate: {
			next: '<i class="ion-chevron-right"></i>',
			previous: '<i class="ion-chevron-left"></i>'  
		}
	},
	'columnDefs': [{
		'targets': 0,
		'searchable': false,
		'orderable': false,
		'className': 'dt-body-center',
		'render': function (data, type, full, meta){
			return '<div class="dt-checkbox"><input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '"><span class="dt-checkbox-label"></span></div>';
		}
	}],
	'order': [[1, 'asc']]
});

$('#example-select-all').on('click', function(){
	var rows = table.rows({ 'search': 'applied' }).nodes();
	$('input[type="checkbox"]', rows).prop('checked', this.checked);
});

$('.checkbox-datatable tbody').on('change', 'input[type="checkbox"]', function(){
	if(!this.checked){
		var el = $('#example-select-all').get(0);
		if(el && el.checked && ('indeterminate' in el)){
			el.indeterminate = true;
		}
	}
});
});