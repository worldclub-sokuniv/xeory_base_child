<?php
function tag_filter($tags, $selectedTags){
  $chips = "";
  foreach($tags as $tag){
    if (in_array($tag->term_id, $selectedTags, true)) {
      $tagName = $tag->name;
      $tagId = $tag->term_id;
      $encodedTag = json_encode($tag);
      $chips .= <<< EOF
      <div class="chip" value="{$tagId}">
        <div class="chip-name">{$tagName}</div>
        <span class="closebtn">&times;</span>
        <input name={$tagId} type="hidden" value={$encodedTag}>
      </div>
      EOF;
    }
  }

  $encodedTags = json_encode($tags);
  $form = <<< EOF
    <form class="filter-by-tags" action="" method="post">
      <input id="tag-search">
      <button id="send" type="submit">検索</button>
      <div id="available-tags" style="display:none;">{$encodedTags}</div>
      <div id="filter-tags">{$chips}</div>
    </form>
  EOF;

  echo $form;
}