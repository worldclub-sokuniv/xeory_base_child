$(function(){
	$(".member-container").click(function() {
		const d_id = "d-"+$(this).attr("id")
		const dialog = document.getElementById(d_id)

		dialog.showModal()
		$(`#${d_id} .close`).click(function() {
			dialog.close()
		})
	})
})