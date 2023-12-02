// 環境設定------------------------
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: import.meta.env.VITE_PUSHER_APP_KEY,
  cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
  forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
  encrypted: true,
});
// --------------------------------

// jQuery導入
import jQuery from 'jquery';
window.$ = jQuery;

// ページの読み込みが完了したら実行
$(function() {
   
   let chatroom_id = $('#chatroom').val();
   console.log(chatroom_id);
   // WebSocketを使用してリアルタイム通信を設定
   let channel = window.Echo.channel(`chatroom.${chatroom_id}`);
   channel.listen('MessageSent', function(data) {
     console.log('received a message');
     console.log(data);
     console.log(data.message);
     let newMessage = data.message[0].message;
     let name = data.message[1].name;
     let messageArea = $('#message_area');
     messageArea.append(name + " " + newMessage + " " + data.message[0].created_at + "<br>");
   });
 
   // 一度だけ実行される処理（リロード時に実行）
   $.ajax({
      headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
         'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },  //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
      url: '/allmessage',
      type: 'GET',
      data: {
         chatroom_id: chatroom_id
      },
      success: function(response) {
         console.log(response);
         let messageArea = $('#message_area');
         response.forEach(function(item) {
            messageArea.append(item.user.name + " " + item.message + " " + item.created_at + "<br>");
         });
      },
      error: function() {
         console.log('fail');
      }
   });
 
   // 送信ボタンをクリックした時
   $('#submit').on('click' ,function () {
      let message = $('#message').val();
      console.log(message);
      console.log(chatroom_id);
 
      $.ajax({
         headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
         },  //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
         url: '/newmessage',
         type: 'POST',
         data: {
            message: message,
            chatroom_id: chatroom_id
         },
         success: function(response) {
            console.log(response);
            $('#message').val('');
         },
         error: function() {
            console.log('fail');
         }
      });
   })
 });