<?php
	$url_encode=urlencode(get_permalink());
	$title_encode=urlencode(get_the_title()).'｜'.get_bloginfo('name');
	?>
	<div class="share">
		<div class="new-entry"><span class="share-title">Share!</span></div>
		<ul>
			<!--Facebookボタン-->
			<li class="sns-btn-wrapper">
				<div class="sns-btn facebook up">
					<a href="http://www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>"  
					onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
					<i class="fab fa-facebook-f"></i><?php if(function_exists('scc_get_share_facebook')) echo (scc_get_share_facebook()==0)?'':scc_get_share_facebook(); ?></a>
				</div>
			</li>
			<!--ツイートボタン-->
			<li class="sns-btn-wrapper">
				<div class="sns-btn twitter up">
					<a href="http://twitter.com/intent/tweet?url=<?php echo $url_encode ?>&text=<?php echo $title_encode ?>&tw_p=tweetbutton" 
					onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
					<i class="fab fa-twitter"></i><?php if(function_exists('scc_get_share_twitter')) echo (scc_get_share_twitter()==0)?'':scc_get_share_twitter(); ?></a>
				</div>
			</li>
			<!--はてなボタン-->
			<li class="sns-btn-wrapper">
				<div class="sns-btn hatena up">
					<a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode ?>"  
					onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;">
					<i class="fa-hatena"></i><?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'':scc_get_share_hatebu(); ?></a>
				</div>
			</li>
			<!--LINEボタン-->
			<li class="sns-btn-wrapper">
				<div class="sns-btn line up">
					<a href="http://line.me/R/msg/text/?<?php echo $title_encode . '%0A' . $url_encode;?>">
					<i class="fab fa-line"></i></a>ass="fa-hatena"></i><?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'':scc_get_share_hatebu(); ?></a>
				</div>
			</li>
			<!--ポケットボタン-->
			<li class="sns-btn-wrapper">
				<div class="sns-btn pocket up">
					<a href="http://getpocket.com/edit?url=<?php echo $url_encode;?>&title=<?php echo $title_encode;?>">
					<i class="fab fa-get-pocket"></i><?php if(function_exists('scc_get_share_pocket')) echo (scc_get_share_pocket()==0)?'':scc_get_share_pocket(); ?></a>
				</div>
			</li>
			<!--feedlyボタン-->
			<li class="sns-btn-wrapper">
				<div class="sns-btn feedly up">
					<a href="http://feedly.com/i/subscription/feed/https://worldclub-soka.com//feed" target="blank">
					<i class="fa fa-rss"></i><?php if(function_exists('scc_get_follow_feedly')) echo (scc_get_follow_feedly()==0)?'':scc_get_follow_feedly(); ?></a>
				</div>
			</li>
		</ul>
	</div>