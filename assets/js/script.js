$(document).ready(() => {
  $('#addFolderButton').click((e) => {
    let input = $('#addFolderInput');
    $.ajax({
      url: 'process/ajaxHandler.php',
      method: 'POST',
      data: { action: 'addFolder', folderName: input.val() },
      success: function (response) {
       if(response){
          $(`<li>
          <a href="#">
          <i class="fa fa-folder"></i>${input.val()}</a>
          <a href="#" class="remove">
          x</a>
        </li>`).appendTo('.folders');
       }
      },
    });
  });
});
