$(() => {
  let selectedTagIds = $("#selectedTagIds").val() ? $("#selectedTagIds").val().split(",") : []
  
  $(document).on("click tap touchstart", ".chip", e => {
    val = parseInt(e.currentTarget.attributes.value.value)
    if ((val + 1) % 2 == 0) selected(e)
    else unselected(e)
  })

  function selected(e) {
    e.currentTarget.attributes.value.value = 0
    classNames = e.currentTarget.classList.value.split(" ")
    classNames.push("unselected")
    e.currentTarget.className = classNames.filter(v => v !== "selected").join(" ")
    selectedTagIds = selectedTagIds.filter(v => v !== e.currentTarget.attributes.name.value)
    updateSelectedTagIds()
  }
  function unselected(e) {
    e.currentTarget.attributes.value.value = 1
    classNames = e.currentTarget.classList.value.split(" ")
    classNames.push("selected")
    e.currentTarget.className = classNames.filter(v => v !== "unselected").join(" ")
    selectedTagIds.push(e.currentTarget.attributes.name.value)
    updateSelectedTagIds()
  }
  function updateSelectedTagIds(){
    $("#selectedTagIds").val(selectedTagIds.join(","))
  }
});

