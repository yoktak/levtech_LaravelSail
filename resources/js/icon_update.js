// jQuery導入
import jQuery from 'jquery';
// import 'jquery-cropper';
window.$ = jQuery;

$(function () {
  console.log('jquery icon_update run');
  let icon = $('#icon'); //iconのついたiタグを取得し代入。

  icon.on('change', function (e) { //onはイベントハンドラー
    readURL(e.target.files[0]);
    
    function readURL(input) {
      if (input) {
        var reader = new FileReader(); // FileReaderオブジェクトはuserのデバイスに保存されている内容を非同期に読み取る

        reader.readAsDataURL(input); // 選択ファイルが読み込まれる(onloadのトリガー)

        reader.onload = function(e) {
          $("#icon_image").attr('src', e.target.result); // attrメソッドによるhtmlの属性の編集

          let img = $('#icon_image');

          $(img).Jcrop({
            aspectRatio: 1,
            onSelect: updateCoords,		/*コールバック*/
            setSelect: [0, 0, 200, 200],		/*初期設定のトリミング枠*/
            minSize: [200, 200],			/*トリミング枠の最小サイズ*/
            allowResize: true,
            allowSelect: false,
            boxWidth: 500,
            bgColor: 'white',
          })

          function updateCoords(c)
          {
            $('#user_img_x').val(c.x);
            $('#user_img_y').val(c.y);
            $('#user_img_w').val(c.w);
            $('#user_img_h').val(c.h);
          }
        }
        
      }

    }

  });
})
