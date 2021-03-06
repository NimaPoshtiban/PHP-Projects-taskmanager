
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="Task manager" content="Task manager app build with php" />
    <title><?= SITE_TITLE ?></title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <!-- partial:index.partial.html -->
    <div class="page">
      <div class="pageHeader">
        <div class="title">Dashboard</div>
        <div class="userPanel">
          <a href="<?= site_url("?logout=1") ?>">
            <i class="fa fa-sign-out"></i>
          </a>
          <span class="username"><?=$user->name?? 'UnknownUser';?></span
          > <img
            src="<?= $user->image?>"
            alt="profile image"
            width="40"
            height="40"
          />
          
        </div>
      </div>
      <div class="main">
        <div class="nav">
          <div class="searchbox">
            <div>
              <i class="fa fa-search"></i>
              <input type="search" placeholder="Search" />
            </div>
          </div>
          <div class="menu">
            <div class="title">Folders</div>
            <ul class="folders">

            <li class="<?= isset($_GET['folder_id']) && is_numeric($_GET['folder_id'])?'':'active'?>"><a href="<?=site_url()?>"><i class="fa fa-folder"></i>ALL</a></li>
              <?php foreach ($folders as $folder):?>  

            <li class="<?= $folder->id == $_GET['folder_id']? 'active':'' ?>" >
            
              <a href="?folder_id=<?=  $folder->id?>">
              <i class="fa fa-folder"></i><?= $folder->name;?></a>
              <a href="?delete_folder=<?=  $folder->id?>" class="remove" onclick="return confirm('Are you sure you want to delete the item?')">
              x</a>
            </li>
              <?php endforeach;?>
            
            
              
              <div class="folder-parent">
              <input id="addFolderInput" type="text" placeholder="Add New folder" style="width: 65%;margin-left:3%;"/>
              <button id="addFolderButton" class="btn">+</button>
            </div>
            </ul>
          </div>
        </div>
        <div class="view">
          <div class="viewHeader">
            <div class="title">
              <input id="addTaskInput" type="text" placeholder="Add New Task" style="width: 65%;margin-left:3%;">
            </div>
            <div class="functions">
              <div class="button active">Add New Task</div>
              <div class="button">Completed</div>
              
            </div>
          </div>
          <div class="content">
            <div class="list">
              <div class="title">Today</div>
              <ul class="tasks">
                <?php if (sizeof($tasks)>0):?>
                <?php foreach ($tasks as $task):?>
                <li class="<?= $task->is_done? 'checked':'' ?>">
                  <i data-taskId="<?=$task->id ?>" class="isDone  fa <?= $task->is_done? "fa-check-square-o" : "fa-square-o"?>" style="hover:">
                    </i
                  ><span><?=$task->title?></span>
                  
                  <div class="info">
                    <span class="created-at">Created_at At <?=$task->created_at?> </span>
                    <a href="?delete_task=<?php echo $task->id; ?>" class="remove" >x</a>
                  </div>
                </li>
                <?php endforeach; ?>
                <?php else:?>
                  <li>
                    No Task here...
                  </li>
                <?php endif;?>
              </ul>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- partial -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
    (
      $(document).ready(function(){
        $('.isDone').click(function(e){
          const taskId = $(this).attr('data-taskId')
          $.ajax({
            url:'process/ajaxHandler.php',
            method:"POST",
            data:{
              action:"doneSwitch",taskId:taskId
            },
            success:function(response){
              if(response){
                location.reload();
              }else{
               console.error('Ajax failed')
              }
            }
          })
        })

        $('#addTaskInput').on('keypress',function(e) {
          e.stopPropagation();
          if(e.which == 13) {
            const input = $('#addTaskInput')
            $.ajax({
              url:'process/ajaxHandler.php',
              method:'POST',
              data:{
                action:'addTask',folderId:<?=$_GET['folder_id'] ?? 0?>,taskTitle:input.val()
              },
              success: function(response){
                /* use this function for testing your ajax request
                * alert(response)
                */
                if(response){
                location.reload()
                }             
              }
            })
          }
          
        });
        $('#addTaskInput').focus()
      })
    )
    </script>
  </body>
</html>