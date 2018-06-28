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
					<li v-for="student in studentsInChatroom">
						<div class="chat-online-profile"><img :src="'/images/user-avatar.png'" width="30px"></div>
						<div class="chat-online-name">{{student.firstname}} {{student.lastname}}</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="chat-main-container">
			<div class="chat-name">
				<ul>
					<li><img :src="'/images/user-avatar.png'" width="60px"></li>
					<li><h5>Department Of Computer Studies</h5>Online Students: {{studentsInChatroom.length}}</li>
				</ul>
			</div>
			
			<div class="chat-log-container">
				<div class="chat-log-content">
					<ul id="sender" class="other-sender" v-for="message in chats">
						<li>
							<div class="sender-name">{{message.user.firstname}} {{message.user.lastname}} 10:12 AM, Today</div>
							<div class="sender-message wordwrap">{{message.chat}}</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="chat-composer">
				<input name="chat" v-model="messageText" id="chat" placeholder="Type your message" @keydown.enter="sendChat()">
				<button class="send-message" @click="sendChat()"><i class="material-icons">send</i></button>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
    export default {
     	data() {
     		return {
     			messageText: '',
	 			messageSender: '',

     			chats: [],
     			studentsInChatroom: []
     		}
     	},

     	methods: {
     		getChatMessages() {
     			axios.get('/get-chats').then((response) => {
     				this.chats = response.data;
     			});
     		},
     		sendChat() {
     			let chatSend = {
     				chat: this.messageText,
     				user: {
     					firstname: $('#student-panel .avatar h4').text()
     				}
     			};
				this.chats.push(chatSend);
				this.messageText = '';

				axios.post('/store-chat', chatSend).then((response) => {

				});				
     		},
     		listen() {
     			Echo.join('groupchat')
 				.here((users) => {
 					this.studentsInChatroom = users;
 				})
 				.joining((user) => {
 					this.studentsInChatroom.push(user);
 				})
 				.leaving((user) => {
 					this.studentsInChatroom = this.studentsInChatroom.filter(u => u != user)
 				})
 				.listen('ChatPosted', (e) => {
 					this.chats.push({
 						chat: e.chat.chat,
 						user: e.user
 					});
 				});
     		}
     	},
     	mounted() {
     		this.getChatMessages();
     		this.listen();
     		// $(".other-sender").stop().animate({ scrollTop: $(".other-sender")[0].scrollHeight}, 1000);
     	}
    }
    
</script>
