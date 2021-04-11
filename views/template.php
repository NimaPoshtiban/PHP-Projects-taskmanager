
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
          <i class="fa fa-chevron-down"></i
          ><span class="username">John Doe </span
          ><img
            src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/73.jpg"
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
              <?php foreach ($folders as $folder):?>  

            <li>
            
              <a href="?folder_id=<?=  $folder->id?>">
              <i class="fa fa-folder"></i><?= $folder->name;?></a>
              <a href="?delete_folder=<?=  $folder->id?>" class="remove">
              x</a>
            </li>
              <?php endforeach;?>

              <li class="active"><i class="fa fa-folder"></i>Current Folder</li>
              
              <div class="folder-parent">
              <input id="addFolderInput" type="text" placeholder="Add New folder" style="width: 65%;margin-left:3%;"/>
              <button id="addFolderButton" class="btn">+</button>
            </div>
            </ul>
          </div>
        </div>
        <div class="view">
          <div class="viewHeader">
            <div class="title">Manage Tasks</div>
            <div class="functions">
              <div class="button active">Add New Task</div>
              <div class="button">Completed</div>
              <div class="button inverz"><i class="fa fa-trash-o"></i></div>
            </div>
          </div>
          <div class="content">
            <div class="list">
              <div class="title">Today</div>
              <ul>
                <li class="checked">
                  <i class="fa fa-check-square-o"></i
                  ><span>Update team page</span>
                  <div class="info">
                    <div class="button green">In progress</div>
                    <span>Complete by 25/04/2014</span>
                  </div>
                </li>
                <li>
                  <i class="fa fa-square-o"></i><span>Design a new logo</span>
                  <div class="info">
                    <div class="button">Pending</div>
                    <span>Complete by 10/04/2014</span>
                  </div>
                </li>
                <li>
                  <i class="fa fa-square-o"></i
                  ><span>Find a front end developer</span>
                  <div class="info"></div>
                </li>
              </ul>
            </div>
            <div class="list">
              <div class="title">Tomorrow</div>
              <ul>
                <li>
                  <i class="fa fa-square-o"></i
                  ><span>Find front end developer</span>
                  <div class="info"></div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- partial -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
   
  </body>
</html>
