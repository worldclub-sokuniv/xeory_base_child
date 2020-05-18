$(() => {
  const availableTags = getAvailableTags()
  const availableNameTags = getAvailableNameTags()
  let selectedTags = getSelectedTags()
  let selectedNameTags = getSelectedNameTags()

  $("#tag-search").autocomplete({
    source: (req, res) => unselected(req, res),
    select: (e, ui) => addTagChips(e, ui)
  })
  $(document).on("click", ".closebtn", e => removeChipComponents(e))

  function getAvailableTags(){
    return JSON.parse($("#available-tags").attr("value"))
  }
  function getAvailableNameTags(){
    return availableTags.map(v => v.name)
  }
  function getSelectedTags(){
    const selectedTags = $("#filter-tags > .chip")
    const len = selectedTags.length
    const selectedTagsVals = Object.values(selectedTags).slice(0, len)
    return selectedTagsVals.map(v => {
      const nodes = Array.from(v.children)
      let idx = 0
      nodes.forEach((e, i) => {
        if(e.tagName === "INPUT") idx = i
      })
      return nodes[idx]
    })
  }
  function getSelectedNameTags(){
    return selectedTags.map(jq => {
      const encoded = JSON.parse(jq.attributes.value.value)
      return encoded.name
    })
  }
  async function addTagChips(_, ui) {
    $.when(addChipComponents(ui.item.value))
    .done(addSelectedTags())
    .done(addSelectedNameTags(ui.item.value))
  }
  function unselected(req, res){
    unselect = availableNameTags.filter(v => {
      return !selectedNameTags.includes(v) && v.indexOf(req.term) !== -1
    })
    res(unselect)
  }
  function addSelectedTags(){
    selectedTags = getSelectedTags()
  }
  function addSelectedNameTags(name){
    selectedNameTags.push(name)
  }
  function addChipComponents(name){
    tagInfo = availableTags.filter(v => v.name === name)[0]
    $.when(
      $("#filter-tags").append(`
        <div class="chip" value="${tagInfo.term_id}">
          <div class="chip-name">${name}</div>
          <span class="closebtn">&times;</span>
          <input name=${tagInfo.term_id} type="hidden" value=${JSON.stringify(tagInfo)}>
        </div>
      `)
    )
    .done(setTimeout(100))
  }
  function removeChipComponents(e){
    const tagId = parseInt(e.currentTarget.parentElement.attributes.value.value)
    removeSelectedTags(tagId)
    removeSelectedNameTags(tagId)
    e.currentTarget.parentElement.remove()
  }
  function removeSelectedTags(tagId){
    selectedTags = selectedTags.filter(v => {
      return v.term_id != tagId
    })
  }
  function removeSelectedNameTags(tagId){
    selectedNameTags = selectedNameTags.filter(v => {
      tagInfo = availableTags.filter(v => v.term_id === tagId)[0]
      return v != tagInfo.name
    })
  }
});

