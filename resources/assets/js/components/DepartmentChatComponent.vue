<template>
	<div id="group-chat-container">
		<div class="chat-online">
			<div class="chat-search">
				<div class="uk-inline search-people">
					<span class="uk-form-icon uk-form-icon-flip" :uk-icon="'icon: search'"></span>
					<input class="uk-input" type="text" placeholder="Search online people">
				</div>
			</div>
			
			<div class="online-member">
				<ul class="online-member-list">
					<li>
						<div class="chat-online-profile"><img :src="'/images/user-avatar.png'" width="30px"></div>
						<div class="chat-online-name">Alkein Villajos</div>
					</li>
					
					<li>
						<div class="chat-online-profile"><img :src="'/images/user-avatar.png'" width="30px"></div>
						<div class="chat-online-name">Angelou Alforque</div>
					</li>
					
					<li>
						<div class="chat-online-profile"><img :src="'/images/user-avatar.png'" width="30px"></div>
						<div class="chat-online-name">Mark Jae Verzosa</div>
					</li>
					
					<li>
						<div class="chat-online-profile"><img :src="'/images/user-avatar.png'" width="30px"></div>
						<div class="chat-online-name">Jade Mark Abapo</div>
					</li>
					
					<li>
						<div class="chat-online-profile"><img :src="'/images/user-avatar.png'" width="30px"></div>
						<div class="chat-online-name">Chergin Nacion</div>
					</li>
					
					<li>
						<div class="chat-online-profile"><img :src="'/images/user-avatar.png'" width="30px"></div>
						<div class="chat-online-name">Jenna Mae Bechayda</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="chat-main-container">
			<div class="chat-name">
				<ul>
					<li><img :src="'/images/user-avatar.png'" width="60px"></li>
					<li><h5>Department Of Computer Studies</h5></li>
				</ul>
			</div>
			
			<div class="chat-log-container">
				<div class="chat-log-content">
					<ul class="other-sender">
						<li>
							<div class="sender-name">Angelou Alforque 10:12 AM, Today</div>
							<div class="sender-message">Hi Alkein, how are you? How is the project coming along?</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="chat-composer">
				<textarea name="message-to-send" id="message-to-send" placeholder="Type your message" rows="3"></textarea>
				<button class="send-message"><i class="material-icons">send</i></button>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
    export default {
     
    }
    
</script>
