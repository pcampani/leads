$(document).ready(function(){
	$(".links").on("click", "a", function(e){
		e.preventDefault();
		var id = e.target.href.split("/").pop();
		$.get(`/leads/next/${id}`, function(data){
			$("tbody").html(data);
		})
	})

	$("#search").keyup($.debounce(250, function(e) {
		var searchTerm = $("#search").val();
		if(searchTerm) {
			$.post("/leads/search", {search:searchTerm}, function(data){
				$(".search-results").html(data);
			});
		}
	}));

	$("#to_date").on("input",function(){
		var from = $("#from_date").val();
		var to = $("#to_date").val();
		$.post("leads/process_date",{from,to},function(data){
			$(".search-results").html(data);
		})
	})

	
		
})