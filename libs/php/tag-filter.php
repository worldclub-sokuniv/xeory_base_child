<?php
function tag_filter($tags, $selectedTags){
  $chips = "";
  foreach($tags as $tag){
    $tagName = $tag->name;
    $tagId = $tag->term_id;
    $encodedTag = json_encode($tag);
    $val = in_array($tag->term_id, $selectedTags, true) ? 1 : 0;
    $chipClass = $val == 0 ? "chip unselected" : "chip selected";
    $chips .= <<< EOF
    <div class="{$chipClass}" name="{$tagId}" value={$val}>
      <div class="chip-name">{$tagName}</div>
    </div>
EOF;
  }

  $selectedTags = join(",", $selectedTags);
  $form = <<< EOF
    <form class="filter-by-tags" action="" method="post">
      <button id="send" type="submit" style="display:none;">検索</button>
      <div id="filter-tags" class="chip-wrapper">{$chips}</div>
      <input id=selectedTagIds name=selectedTagIds type="hidden" value={$selectedTags}>
    </form>
EOF;

  echo $form;
}
?>
<?php
// function tag_filter($tags, $selectedTags){
//   $chips = "";
//   foreach($tags as $tag){
//     if (in_array($tag->term_id, $selectedTags, true)) {
//       $tagName = $tag->name;
//       $tagId = $tag->term_id;
//       $encodedTag = json_encode($tag);
//       $chips .= <<< EOF
//       <div class="chip" value="{$tagId}">
//         <div class="chip-name">{$tagName}</div>
//         <div class="closebtn"></div>
//         <input name={$tagId} type="hidden" value={$encodedTag}>
//       </div>
// EOF;
//     }
//   }

//   $encodedTags = json_encode($tags);
//   $form = <<< EOF
//     <form class="filter-by-tags" action="" method="post">
//       <input id="tag-search">
//       <button id="send" type="submit">検索</button>
//       <input id="available-tags" type="hidden" value={$encodedTags}>
//       <div id="filter-tags" class="chip-wrapper">{$chips}</div>
//     </form>
// EOF;

//   echo $form;
// }
?>
