//ボタンを押したタイミングで発火する
$("#bt").click(function () {
  $.ajax({
    type: "get", //HTTP通信の種類
    url: "/menus",
    dataType: "json",
  })
    //通信が成功したとき
    .done((res) => { // resの部分にコントローラーから返ってきた値 $users が入る
      $.each(res, function (index, value) {
        html = `
                      <tr class="user-list">
                          <td class="col-xs-2">nana-seven：${value.name}</td>
                      </tr>
         `;
      $(".menu-table").append(html); //できあがったテンプレートを user-tableクラスの中に追加
      });
    })
    //通信が失敗したとき
    .fail((error) => {
      console.log(error.statusText);
    });
});






$("#bt2").click(function () {
  $.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});
  $.ajax({
    //POST通信
    type: "post",
    //ここでデータの送信先URLを指定します。
    url: "/menu",
    dataType: "json",
    data: {
      uid: 100,
      subject: "テストタイトル",
      from: "テストfrom",
      body: "テストbody",
    },

  })
    //通信が成功したとき
    .then((res) => {
      console.log(res);
    })
    //通信が失敗したとき
    .fail((error) => {
      console.log(error.statusText);
    });
});