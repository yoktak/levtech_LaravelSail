// jQuery導入
import jQuery from 'jquery';
window.$ = jQuery;

$(function () {
    let like = $('.like-toggle'); //like-toggleのついたiタグを取得し代入。
    let likePostId; //変数を宣言
    like.on('click', function () { //onはイベントハンドラー
    
      let $this = $(this); //this=イベントの発火した要素＝iタグを代入
      likePostId = $this.data('post-id'); //iタグに仕込んだdata-post-idの値を取得
      console.log(likePostId);
      //ajax処理スタート
      $.ajax({
        headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },  //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
        url: '/posts/like', //通信先アドレス
        method: 'POST', //HTTPメソッドの種別
        data: { //サーバーに送信するデータ
          'post_id': likePostId //いいねされた投稿のidを送る
        },
      })
      //通信成功した時の処理
      .done(function (data) { // dataはcontroolerからのresponse
        console.log(data);
        console.log('success');
        console.log($this);
        $this.toggleClass('liked'); //likedクラスのON/OFF切り替え。
        console.log($this);
        $this.next('.like-counter').html(data.post_likes_count);
        // if($this.hasClass('liked'))
      })
      //通信失敗した時の処理
      .fail(function () {
        console.log('fail'); 
      });
    });
})